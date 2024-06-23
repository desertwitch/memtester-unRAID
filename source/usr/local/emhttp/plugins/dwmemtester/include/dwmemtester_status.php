<?
/* Copyright Derek Macias (parts of code from NUT package)
 * Copyright macester (parts of code from NUT package)
 * Copyright gfjardim (parts of code from NUT package)
 * Copyright SimonF (parts of code from NUT package)
 * Copyright Dan Landon (parts of code from Web GUI)
 * Copyright Bergware International (parts of code from Web GUI)
 * Copyright Lime Technology (any and all other parts of Unraid)
 *
 * Copyright desertwitch (as author and maintainer of this file)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 */
require_once '/usr/local/emhttp/plugins/dwmemtester/include/dwmemtester_helpers.php';

$mem_running = "";
$mem_log_size = "";
$mem_errlog_size = "";
$mem_disk_util = "";
$mem_highram = "";

if(!empty($_GET["getfs"]) && $_GET["getfs"] === "yes" ) {
    $mem_log_size = trim(file_exists("/var/lib/memtester/log") ? htmlspecialchars(mem_humanFileSize(filesize("/var/lib/memtester/log"))) : "");
    $mem_errlog_size = trim(file_exists("/var/lib/memtester/errlog") ? htmlspecialchars(mem_humanFileSize(filesize("/var/lib/memtester/errlog"))) : "");
}

$mem_disk_util = htmlspecialchars(trim(shell_exec("df --output=pcent /var/lib/memtester 2>/dev/null | tr -dc '0-9' 2>/dev/null") ?? ""));
if(!empty($mem_disk_util)) { $mem_highram = ($mem_disk_util < 90) ? "NO" : "YES"; }

$mem_running = htmlspecialchars(trim(shell_exec( "if pgrep -x memtester >/dev/null 2>&1; then echo YES; else echo NO; fi" ) ?? "-"));
echo("RUNNING:".$mem_running.",".$mem_highram.",".$mem_log_size.",".$mem_errlog_size);
?>
