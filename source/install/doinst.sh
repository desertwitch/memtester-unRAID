#!/bin/bash
#
# Copyright Derek Macias (parts of code from NUT package)
# Copyright macester (parts of code from NUT package)
# Copyright gfjardim (parts of code from NUT package)
# Copyright SimonF (parts of code from NUT package)
# Copyright Lime Technology (any and all other parts of Unraid)
#
# Copyright desertwitch (as author and maintainer of this file)
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License 2
# as published by the Free Software Foundation.
#
# The above copyright notice and this permission notice shall be
# included in all copies or substantial portions of the Software.
#
BOOT="/boot/config/plugins/dwmemtester"
DOCROOT="/usr/local/emhttp/plugins/dwmemtester"

chmod 755 /usr/local/emhttp/plugins/dwmemtester/scripts/*
chmod 755 /usr/bin/memtester
chmod 755 /usr/bin/memtester-runner

cp -n $DOCROOT/default.cfg $BOOT/dwmemtester.cfg >/dev/null 2>&1

if ! mountpoint -q /var/lib/memtester; then 
    rm -rf /var/lib/memtester
    mkdir -p /var/lib/memtester
    if ! mount -t tmpfs -o size=30% tmpfs /var/lib/memtester; then
        echo "[ERROR] Failed to create a RAM disk, falling back to a regular folder." | logger -t "memtester-install"
    fi
fi

chown root:root /var/lib/memtester
chmod 755 /var/lib/memtester
