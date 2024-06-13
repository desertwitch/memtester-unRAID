<?
function humanFileSize($sizeObj,$unit="") {
    try {
        $size = intval($sizeObj);
        if($size) {
            if( (!$unit && $size >= 1<<40) || $unit == "TB")
                return number_format($size/(1<<40),2)." TB";
            if( (!$unit && $size >= 1<<30) || $unit == "GB")
                return number_format($size/(1<<30),2)." GB";
            if( (!$unit && $size >= 1<<20) || $unit == "MB")
                return number_format($size/(1<<20),2)." MB";
            if( (!$unit && $size >= 1<<10) || $unit == "KB")
                return number_format($size/(1<<10),2)." KB";
            return number_format($size)." B";
        } else {
            return "-";
        }
    } catch (Throwable $e) { // For PHP 7
        return "-";
    } catch (Exception $e) { // For PHP 5
        return "-";
    }
}

$getfs = false;
$mem_running = "";
$memlog_size = "";
$errlog_size = "";

if(!empty($_GET["getfs"])) {
    $getfs = true;
}

$mem_running = trim(htmlspecialchars(shell_exec( "if pgrep -x memtester >/dev/null 2>&1; then echo YES; else echo NO; fi" ) ?? "-"));

if($getfs === true) {
    $memlog_size = trim(file_exists("/var/lib/memtester/log") ? htmlspecialchars(humanFileSize(filesize("/var/lib/memtester/log"))) : "");
    $errlog_size = trim(file_exists("/var/lib/memtester/errlog") ? htmlspecialchars(humanFileSize(filesize("/var/lib/memtester/errlog"))) : "");
}

echo("RUNNING:".$mem_running.",".$memlog_size.",".$errlog_size);
?>
