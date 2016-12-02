#!/bin/sh

echo ""
echo "####################################################"
echo "#          Welcome to the DNSSEC Labs              #"
echo "#  It will take a few minutes to start everything  #"
echo "####################################################"
echo ""

sleep 5

ROOT=`pwd`

portsnap fetch extract

WITHOUT_X11=yes

PACKAGES=${ROOT}/packages/dns

for i in ports-mgmt/pkg dns/bind911 dns/ldns editors/nano editors/vim-lite security/sudo;
do
	cd /usr/ports/${i} && make package-recursive WITHOUT="X11" BATCH=yes PACKAGES=${ROOT}/packages/dns
done

cd ${ROOT}

for i in auth1 auth2 resolver users; do

	cp ${PACKAGES}/All/* confs/${i}/pkg/

done;

PACKAGES=${ROOT}/packages/signer

for i in ports-mgmt/pkg www/nginx lang/php56 lang/php56-extensions dns/bind911 editors/vim-lite;
do
	cd /usr/ports/${i} && make package-recursive WITHOUT="X11" BATCH=yes PACKAGES=${ROOT}/packages/signer
done;

cd ${ROOT}

cp ${PACKAGES}/All/* confs/signer/pkg/

echo ""
echo "#######################"
echo "#  Installing tmux  #"
echo "#######################"
echo ""

/usr/sbin/pkg install -y tmux

#### Install EZJail

echo ""
echo "#######################"
echo "#  Installing EZjail  #"
echo "#######################"
echo ""

/usr/sbin/pkg install -y ezjail

echo 'ezjail_enable="YES"' >> /etc/rc.conf

ezjail-admin install

echo ""
echo "################################"
echo "#  Finished installing EZjail  #"
echo "################################"
echo ""

sleep 3

#### Setup PF for forwarding

echo ""
echo "####################"
echo "#  Configuring PF  #"
echo "####################"
echo ""

cp etc/pf.conf /etc/pf.conf

echo 'pf_enable="YES"' >> /etc/rc.conf

/etc/rc.d/pf start

echo ""
echo "#############################"
echo "#  Finished configuring PF  #"
echo "#############################"
echo ""

sleep 3

#### Copy the flavours where they belong

echo ""
echo "######################"
echo "#  Copying flavours  #"
echo "######################"
echo ""

cp -r ./confs/* /usr/jails/flavours/

#### Create and start auth1

echo ""
echo "####################"
echo "#  Creating auth1  #"
echo "####################"
echo ""

/usr/local/bin/ezjail-admin create -f auth1 auth1 "lo0|10.0.1.53,lo0|10.0.3.53,lo0|10.0.5.53,lo0|2001:db8::1:53,lo0|2001:db8::3:53,lo0|2001:db8::5:53"

echo ""
echo "####################"
echo "#  Starting Auth1  #"
echo "####################"
echo ""

/usr/local/bin/ezjail-admin start auth1

KEY=`grep -l "key-signing" /usr/jails/auth1/usr/local/etc/namedb/domains/root/K*`

echo ""
echo "###############################"
echo "#  Copying keys in user dirs  #"
echo "###############################"
echo ""

echo "managed-keys { " > bind.keys && \
	tail -n+5 ${KEY} | \
	sed "s/20 IN DNSKEY/initial-key/" | \
	sed "s/3 8/3 8 \"/" >> bind.keys && \
	echo "\";};" >> bind.keys

for i in users resolver auth2; do
	cp bind.keys /usr/jails/flavours/${i}/usr/
	cp etc/named.root /usr/jails/flavours/${i}/usr/
done

echo ""
echo "########################################"
echo "#  Creating and starting the resolver  #"
echo "########################################"
echo ""

/usr/local/bin/ezjail-admin create -f resolver resolver "lo0|10.0.0.201,lo0|2001:db8::201:53"

/usr/local/bin/ezjail-admin start resolver

echo ""
echo "#################################"
echo "#  Creating and starting Auth2  #"
echo "#################################"
echo ""

/usr/local/bin/ezjail-admin create -f auth2 auth2 "lo0|10.0.2.53,lo0|10.0.4.53,lo0|10.0.6.53,lo0|2001:db8::2:53,lo0|2001:db8::4:53,lo0|2001:db8::6:53"

/usr/local/bin/ezjail-admin start auth2

echo ""
echo "######################################"
echo "#  Creating and starting the signer  #"
echo "######################################"
echo ""

#### Create and start the signer

/usr/local/bin/ezjail-admin create -f signer signer "lo0|10.0.0.101,lo0|2001:db8::101:53"

/usr/local/bin/ezjail-admin start signer

echo ""
echo "#################################################"
echo "#  Lab has finished starting, now opening TMUX  #"
echo "#################################################"
echo ""

/usr/local/bin/tmux new-window -t :1 -n "auth1" 'ezjail-admin console auth1'
/usr/local/bin/tmux new-window -t :2 -n "auth2" 'ezjail-admin console auth2'
/usr/local/bin/tmux new-window -t :3 -n "resolver" 'ezjail-admin console resolver'
/usr/local/bin/tmux new-window -t :4 -n "signer" 'ezjail-admin console signer'

