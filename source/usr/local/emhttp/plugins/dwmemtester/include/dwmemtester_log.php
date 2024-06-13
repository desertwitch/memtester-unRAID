<?
if(!empty($_GET["type"]) && $_GET["type"] === "regular" ) {
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
}
if(!empty($_GET["type"]) && $_GET["type"] === "errors" ) {
    if(file_exists("/var/lib/memtester/errlog")) {
        $mem_err_log = file_get_contents("/var/lib/memtester/errlog");
        if(!empty($mem_err_log)) {
            echo("<pre class='memerrlog'>".htmlspecialchars($mem_err_log)."</pre>");
        } else {
            echo("<pre class='memerrlog'></pre>");
        }
    } else {
        echo("<pre class='memerrlog'></pre>");
    }
}
?>
