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

$memorySize = getMemoryLimitBytes() ?? false;
$fileSizeRegular = filesize("/var/lib/memtester/log") ?? false;
$fileSizeErrors = filesize("/var/lib/memtester/errlog") ?? false;

if(!empty($_GET["type"]) && $_GET["type"] === "regular" ) {
    if(file_exists("/var/lib/memtester/log")) {
        if($memorySize && $fileSizeRegular) {
            $memorySize = (90 / 100) * $memorySize;
            if($fileSizeRegular < $memorySize) {
                $mem_log = file_get_contents("/var/lib/memtester/log");
                if(!empty($mem_log)) {
                    echo("<pre class='memlog'>".htmlspecialchars($mem_log)."</pre>");
                } else {
                    echo("<pre class='memlog'></pre>");
                }
            } else {
                echo("<pre class='memlog'>The file size exceeds the PHP memory limit of ".ini_get('memory_limit')." (too many errors?)</pre>");
            }
        } else {
            $mem_log = file_get_contents("/var/lib/memtester/log");
            if(!empty($mem_log)) {
                echo("<pre class='memlog'>".htmlspecialchars($mem_log)."</pre>");
            } else {
                echo("<pre class='memlog'></pre>");
            }
        }
    } else {
        echo("<pre class='memlog'></pre>");
    }
}
if(!empty($_GET["type"]) && $_GET["type"] === "errors" ) {
    if(file_exists("/var/lib/memtester/errlog")) {
        if($memorySize && $fileSizeErrors) { 
            $memorySize = (90 / 100) * $memorySize;
            if($fileSizeErrors < $memorySize) {
                $mem_err_log = file_get_contents("/var/lib/memtester/errlog");
                if(!empty($mem_err_log)) {
                    echo("<pre class='memerrlog'>".htmlspecialchars($mem_err_log)."</pre>");
                } else {
                    echo("<pre class='memerrlog'></pre>");
                }
            } else {
                echo("<pre class='memerrlog'>The file size exceeds the PHP memory limit of ".ini_get('memory_limit')." (too many errors?)</pre>");
            }
        } else {
            $mem_err_log = file_get_contents("/var/lib/memtester/errlog");
            if(!empty($mem_err_log)) {
                echo("<pre class='memerrlog'>".htmlspecialchars($mem_err_log)."</pre>");
            } else {
                echo("<pre class='memerrlog'></pre>");
            }
        }
    } else {
        echo("<pre class='memerrlog'></pre>");
    }
}
?>
