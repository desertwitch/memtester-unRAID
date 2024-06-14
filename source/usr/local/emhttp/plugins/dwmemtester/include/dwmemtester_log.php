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
