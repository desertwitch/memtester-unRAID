<?
require_once '/usr/local/emhttp/plugins/dwmemtester/include/dwmemtester_helpers.php';

$mem_running = "";
$mem_log_size = "";
$mem_errlog_size = "";
$mem_disk_util = "";
$mem_highram = "";

if(!empty($_GET["getfs"]) && $_GET["getfs"] === "yes" ) {
    $mem_log_size = trim(file_exists("/var/lib/memtester/log") ? htmlspecialchars(humanFileSize(filesize("/var/lib/memtester/log"))) : "");
    $mem_errlog_size = trim(file_exists("/var/lib/memtester/errlog") ? htmlspecialchars(humanFileSize(filesize("/var/lib/memtester/errlog"))) : "");
}

$mem_disk_util = trim(htmlspecialchars(shell_exec("df --output=pcent /var/lib/memtester 2>/dev/null | tr -dc '0-9' 2>/dev/null") ?? ""));
if(!empty($mem_disk_util)) { $mem_highram = ($mem_disk_util < 90) ? "NO" : "YES"; }

$mem_running = trim(htmlspecialchars(shell_exec( "if pgrep -x memtester >/dev/null 2>&1; then echo YES; else echo NO; fi" ) ?? "-"));
echo("RUNNING:".$mem_running.",".$mem_highram.",".$mem_log_size.",".$mem_errlog_size);
?>
