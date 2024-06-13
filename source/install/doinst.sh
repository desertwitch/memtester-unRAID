#!/bin/bash
DOCROOT="/usr/local/emhttp/plugins/dwmemtester"
chmod 755 $DOCROOT/scripts/*
chmod 755 /usr/bin/memtester
chmod 755 /usr/bin/memtester-runner

if ! mountpoint -q /var/lib/memtester; then 
    rm -rf /var/lib/memtester
    mkdir -p /var/lib/memtester
    if ! mount -t tmpfs -o size=30% tmpfs /var/lib/memtester; then
        echo "[error] Failed to create a RAM disk for memtester, falling back to regular folder." | logger -t "memtester-installer"
    fi
fi

chown root:root /var/lib/memtester
chmod 755 /var/lib/memtester
