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
$dwmem_logger_retarr = [];

try {
    if(isset($_GET["type"]) && $_GET["type"] === "regular" ) {
        if(file_exists("/var/lib/memtester/log")) {
            $mem_log = file_get_contents("/var/lib/memtester/log");
            if(!empty($mem_log)) {
                $dwmem_logger_retarr["success"]["response"] = "<pre class='memlog'>".htmlspecialchars($mem_log)."</pre>";
            } else {
                $dwmem_logger_retarr["success"]["response"] = "<pre class='memlog'></pre>";
            }
        } else {
            $dwmem_logger_retarr["success"]["response"] = "<pre class='memlog'></pre>";
        }
    }
    elseif(isset($_GET["type"]) && $_GET["type"] === "errors" ) {
        if(file_exists("/var/lib/memtester/errlog")) {
            $mem_err_log = file_get_contents("/var/lib/memtester/errlog");
            if(!empty($mem_err_log)) {
                $dwmem_logger_retarr["success"]["response"] = "<pre class='memerrlog'>".htmlspecialchars($mem_err_log)."</pre>";
            } else {
                $dwmem_logger_retarr["success"]["response"] = "<pre class='memerrlog'></pre>";
            }
        } else {
            $dwmem_logger_retarr["success"]["response"] = "<pre class='memerrlog'></pre>";
        }
    }
    else {
        $dwmem_logger_retarr["error"]["response"] = "Missing GET variables!";
    }
}
catch (\Throwable $t) {
    error_log($t);
    $dwmem_logger_retarr = [];
    $dwmem_logger_retarr["error"]["response"] = $t->getMessage();
}
catch (\Exception $e) {
    error_log($e);
    $dwmem_logger_retarr = [];
    $dwmem_logger_retarr["error"]["response"] = $e->getMessage();
}

echo(json_encode($dwmem_logger_retarr));
?>
