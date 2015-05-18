<?php
/** 
 * User: Tuna
 * Date: 2.5.2015
 * Time: 18:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */
namespace ImageBase;

/*
Basic
*/
$file = 'http://i.imgur.com/sPU9A.png';
$data = file_get_contents($file);
$image = base64_encode($data);
$fInfo = new \finfo(FILEINFO_MIME_TYPE);
$imageMimeType = $fInfo->buffer($image);
echo '<img src="data:'.$imageMimeType.';base64,'.$image.'" />';