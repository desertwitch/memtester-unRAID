<?
$mem_running = trim(htmlspecialchars(shell_exec( "if pgrep -x memtester >/dev/null 2>&1; then echo YES; else echo NO; fi" ) ?? "-"));
$memlog_size = trim(file_exists("/var/lib/memtester/log") ? htmlspecialchars(humanFileSize(filesize("/var/lib/memtester/log"))) : "");
$errlog_size = trim(file_exists("/var/lib/memtester/errlog") ? htmlspecialchars(humanFileSize(filesize("/var/lib/memtester/errlog"))) : "");
echo("RUNNING:".$mem_running.",".$memlog_size.",".$errlog_size);
?>
