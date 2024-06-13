<?
$mem_running = trim(htmlspecialchars(shell_exec( "if pgrep -x memtester >/dev/null 2>&1; then echo YES; else echo NO; fi" ) ?? "-"));
echo("RUNNING:".$mem_running);
?>
