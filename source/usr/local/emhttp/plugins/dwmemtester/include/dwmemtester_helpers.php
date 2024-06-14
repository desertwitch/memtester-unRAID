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
function getMemoryLimitBytes()
{
    try {
        $limit = ini_get('memory_limit');
        if ($limit == -1) return 0;

        $units = [1 => 'K', 'M', 'G'];
        $unit = strtoupper(substr($limit, -1));
        if ($exp = array_search($unit, $units)) {
            return (int)substr($limit, 0, -1) * pow(1024, $exp);
        }
        else return (int)$limit;
    } catch (Throwable $e) { // For PHP 7
        return false;
    } catch (Exception $e) { // For PHP 5
        return false;
    }
}
?>
