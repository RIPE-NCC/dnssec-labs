#! /bin/sh

for i in `seq 10 40`; do
	ezjail-admin delete -f -w user${i};
done
