#! /bin/sh

for i in `seq 1 30`; do
	ezjail-admin delete -f -w user${i};
done
