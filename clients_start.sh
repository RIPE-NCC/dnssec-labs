#! /bin/sh

for i in `seq 10 40`; do
	ezjail-admin create -f users user${i} "lo0|172.16.30.${i}";
	ezjail-admin start user${i};
	#sleep 3;
done
