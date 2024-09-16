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
$dwmem_status_retarr = [];

try {
    if(isset($_GET["getfs"])) {
        $mem_running = "";
        $mem_log_size = "";
        $mem_errlog_size = "";
        $mem_total = "";
        $mem_free = "";
        $mem_disk_util = "";
        $mem_highram = "";

        if($_GET["getfs"] === "yes" ) {
            $mem_log_size = trim(file_exists("/var/lib/memtester/log") ? htmlspecialchars(mem_humanFileSize(filesize("/var/lib/memtester/log"))) : "");
            $mem_errlog_size = trim(file_exists("/var/lib/memtester/errlog") ? htmlspecialchars(mem_humanFileSize(filesize("/var/lib/memtester/errlog"))) : "");
            $mem_total = trim(htmlspecialchars(mem_humanFileSize(shell_exec("awk '/MemTotal/ { print $2*1000 }' /proc/meminfo 2>/dev/null") ?? "", 0)));
            $mem_free = trim(htmlspecialchars(mem_humanFileSize(shell_exec("awk '/MemFree/ { print $2*1000 }' /proc/meminfo 2>/dev/null") ?? "")));
        }

        $mem_disk_util = htmlspecialchars(trim(shell_exec("df --output=pcent /var/lib/memtester 2>/dev/null | tr -dc '0-9' 2>/dev/null") ?? ""));
        if(!empty($mem_disk_util)) { $mem_highram = ($mem_disk_util < 90) ? "NO" : "YES"; }

        $mem_running = htmlspecialchars(trim(shell_exec( "if pgrep -x memtester >/dev/null 2>&1; then echo YES; else echo NO; fi" ) ?? "-"));

        $dwmem_status_retarr["success"]["response"] = "RUNNING:".$mem_running.";".$mem_highram.";".$mem_log_size.";".$mem_errlog_size.";".$mem_total.";".$mem_free;
    }
    else {
        $dwmem_status_retarr["error"]["response"] = "Missing GET variables!";
    }
}
catch (\Throwable $t) {
    error_log($t);
    $dwmem_status_retarr = [];
    $dwmem_status_retarr["error"]["response"] = $t->getMessage();
}
catch (\Exception $e) {
    error_log($e);
    $dwmem_status_retarr = [];
    $dwmem_status_retarr["error"]["response"] = $e->getMessage();
}

echo(json_encode($dwmem_status_retarr));
?>
