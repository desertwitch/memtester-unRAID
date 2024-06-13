<?
if(file_exists("/var/lib/memtester/log")) {
    $mem_log = file_get_contents("/var/lib/memtester/log");
    if(!empty($mem_log)) {
        echo("<pre class='memlog'>".htmlspecialchars($mem_log)."</pre>");
    } else {
        echo("<pre class='memlog'></pre>");
    }
} else {
    echo("<pre class='memlog'></pre>");
}
?>
