
# DNSSEC Labs

## Introduction

This repository holds the scripts that generate the labs used in the DNSSEC Training course from the [RIPE NCC Training Services department](https://www.ripe.net/training/).

There are exercises based on this lab.  You can find them at this [link](https://www.ripe.net/support/training/material/dnssec-training-course/dnssec-training-exercises), and the solutions [here](https://www.ripe.net/support/training/material/dnssec-training-course/dnssec-training-exercises-solutions).

The reason to provide these scripts is to help in DNSSEC deployment.  They can be used to replicate the exercises from the training course, or to run a test lab for DNSSEC deployment.  The initial reason to develop them was, in fact, solely to support the DNSSEC training course with exercises for all the participants.  Later on it was decided to make the platform freely available to everybody in an attempt to increase DNSSEC adoption by means of a wider knowledge on the subject.


## Setup

The labs are meant to be setup using FreeBSD, and are based on [EZJail](http://erdgeist.org/arts/software/ezjail/) and [tmux](https://tmux.github.io/).

The first step is to have a FreeBSD system without any package installed - also called a vanilla installation - which can be on real hardware, ran in virtualbox or any other virtualisation environment that supports FreeBSD as a guest, or a VPS running on some provider's infrastructure.  Any other provider can do.

Once you log in to the FreeBSD system as root, fetch the latest master version of the labs.  On many base installs, this requires the installation of a port to enable certificate validation first, and should be performed this way:

```shell

pkg install -y ca_root_nss
fetch https://github.com/RIPE-NCC/dnssec-labs/archive/master.zip

```

then you need to install unzip to unpack it

```shell

pkg install -y unzip
unzip master.zip

```

then, just run the main script in a tmux terminal, after installing it

```shell

pkg install -y tmux
tmux
cd dnssec-labs-master
sh lab_start.sh

```

The script will:

- Compile all the relevant software packages from the FreeBSD Ports system
- Install EZJail
- Setup EZJail, and create the flavours for all the systems
- setup PF, the packet filter, to redirect some of the traffic to the lab (for the web interface and SSH connections to the specific servers)
- create all the jails and start them

When the jails are started, all the required keys for all the domains are created, starting from "." (dot, root), and including all the subdomains.

At the end of the process, the script starts a tmux session with a window for each one of the servers.  You can then check that everything is running.  You can refer to the tmux documentation on how to switch between windows.


## Description of the environment

The labs use a jail for every single server, with IPv4 and IPv6 addresses assigned to the loopback (_lo0_) interface.  This is to make the system self-contained and not accessible from the outside, unless ports are forwarded using PF.


### Domains

There are 8 domains and subdomains in the environment, with the following scheme:

- .
  - workshop.
    - broken-dnssec.workshop.
    - mail.workshop.
    - nic.workshop.
    - root-servers.workshop.
    - secondary-dns.workshop.
    - sync.workshop.

The workshop zone is dynamic, because it needs to receive updates from the signer server to allow modification of the DS records.  The updates happen using TSIG for authentication.  The TSIG key is distributed with the labs, and it's not supposed to be changed.

Every domain has DNSSEC enabled, and an RC script running at startup on Auth1 ensures that every key is generated, and the DS records are created accordingly for all of them.  This means that every time you run the script to create the labs, the keys will be different.

Additionally, there are 30 subdomains for the participants in the training course, called _domain$x.workshop._  These domains are configured with two nameservers: the client machine for the user and ns1.secondary-dns.workshop.


### Servers

There are four servers running: Auth1, Auth2, resolver and signer


#### Auth1

This is the main server.  It runs bind 9.11 at the moment, and is authoritative for all the domains listed above.

You can find the Bind configuration files at _/usr/local/etc/namedb/_ and all the domain configuration files (including the keys) in the _domains_ subdirectory.

The Bind configuration is split into views (more info [here](https://kb.isc.org/article/AA-00851/0/Understanding-views-in-BIND-9-by-example.html), in order to emulate the different levels of servers:

- View "root", answering on *10.0.5.53* and *2001:db8::5:53*;
	- This view serves the "." (dot, root) zone;
- View "tld", answering on *10.0.3.53* and *2001:db8::3:53*;
	- This view serves the workshop. zone;
- View "domains", answering on *10.0.1.53* and *2001:db8::1:5*;
	- This view serves all the subdomains of the workshop zone;


#### Auth2

This is the secondary server for all the zones in the labs, acting as slave for Auth1.  This means that Auth2 does not hold any key by itself, and depends totally on Auth1 for its data, with the only exception of the sync.workshop zone, which is supposed to differ between the two servers for one of the questions in the labs exercises.

Auth2 runs Bind 9.11 at the moment.

The Bind configuration is split into views, in order to emulate the different levels of servers:

- View "root", answering on *10.0.6.53* and *2001:db8::6:53*;
	- This view serves the . (dot, root) zone;
- View "tld", answering on *10.0.4.53* and *2001:db8::4:53*;
	- This view serves the workshop. zone;
- View "domains", answering on *10.0.2.53* and *2001:db8::2:5*;
	- This view serves all the subdomains of the workshop zone;


#### resolver

This is the server that acts as resolver for all the rest of the labs.  It only runs Bind 9.11 with DNSSEC enabled, answering all queries on 10.0.0.201 and 2001:db8:201::53.

All the clients/participant jails use this as resolver in order to ensure there is always a system working.  Using the Bind server running on the own jail as resolver might lead to issues in case any course participant misses one of the exercises (or does not finish it).

#### signer

This server runs the very simple web interface that makes it possible to update DS records for the client domains.  It runs a webserver, and the packets to port 80 on the main host are forwarded to it.

The web interface lets you create/update DS records for your own domain when you are a participant in the course, and it's done via dynamic updates protected by TSIG using a shared key.  The shared key is always the same and does not change between installations of the labs.

#### Clients

You can start the clients running the dedicated script:

```

FreeBSD# sh clients_start.sh

```

This will create all the machines for the participants in the course. 

## Contacts

This work comes from the Training Services Department at the [RIPE NCC](https://www.ripe.net)
For any questions or issues, feel free to write to mstucchi@ripe.net, or contact the Twitter handle [@TrainingRIPENCC](https://www.twitter.com/TrainingRIPENCC).

## TODO

This is a list of action points for future development of the labs:

- Add more record types to the different zones:
	- TLSA
	- TXT
	- SSHFP
- Distribute servers over different types (NSD, Knot)
- Install DNSViz


