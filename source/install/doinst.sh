#!/bin/bash
DOCROOT="/usr/local/emhttp/plugins/dwmemtester"
chmod 755 $DOCROOT/scripts/*
chmod 755 /usr/bin/memtester
chmod 755 /usr/bin/memtester-runner
mkdir -p /var/log/memtester
