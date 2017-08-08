#! /bin/sh

for i in `seq 1 $1`; do
	ezjail-admin create -f dnssec user${i} "lo0|172.16.30.${i}";
	ezjail-admin start user${i};
	#sleep 3;
done
