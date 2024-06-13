<?
if(file_exists("/var/log/memtester/log")) {
    $mem_log = file_get_contents("/var/log/memtester/log");
    if(!empty($mem_log)) {
        echo("<pre class='memlog'>".$mem_log."</pre>");
    } else {
        echo("<pre class='memlog'></pre>");
    }
} else {
    echo("<pre class='memlog'></pre>");
}
?>
