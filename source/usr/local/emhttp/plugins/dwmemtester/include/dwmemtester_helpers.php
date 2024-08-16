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
function mem_humanFileSize($sizeObj,$decs=2,$unit="") {
    try {
        $size = intval($sizeObj);
        if($size) {
            if( (!$unit && $size >= 1000000000000) || $unit == "TB")
                return number_format(($size/1000000000000),$decs) . " TB";
            if( (!$unit && $size >= 1000000000) || $unit == "GB")
                return number_format(($size/1000000000),$decs) . " GB";
            if( (!$unit && $size >= 1000000) || $unit == "MB")
                return number_format(($size/1000000),$decs) . " MB";
            if( (!$unit && $size >= 1000) || $unit == "KB")
                return number_format(($size/1000),$decs) . " KB";
            return number_format($size) . " B";
        } else {
            return false;
        }
    } catch (Throwable $e) { // For PHP 7
        return false;
    } catch (Exception $e) { // For PHP 5
        return false;
    }
}
?>
