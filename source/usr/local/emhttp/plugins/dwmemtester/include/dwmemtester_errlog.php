<?
if(file_exists("/var/lib/memtester/errlog")) {
    $err_log = file_get_contents("/var/lib/memtester/errlog");
    if(!empty($err_log)) {
        echo("<pre class='errlog'>".htmlspecialchars($err_log)."</pre>");
    } else {
        echo("<pre class='errlog'></pre>");
    }
} else {
    echo("<pre class='errlog'></pre>");
}
?>
