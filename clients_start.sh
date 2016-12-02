#! /bin/sh

for i in `seq 1 30`; do
	ezjail-admin create -f dnssec user${i}.local.dnssec-course.net "lo0|172.16.30.${i}";
	ezjail-admin start user${i}.local.dnssec-course.net;
	#sleep 3;
done
