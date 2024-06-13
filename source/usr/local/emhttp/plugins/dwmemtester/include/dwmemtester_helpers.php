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
?>
