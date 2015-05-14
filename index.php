<?php
/** 
 * User: Tuna
 * Date: 2.5.2015
 * Time: 18:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase;

/********************
Simple code type
 ********************/
$url = 'http://www.ozhiker.com/electronics/pjmt/library/test.jpg';
//$url = 'samples/sample_1.jpg';
$get_image = file_get_contents($url);
$img_base64 = base64_encode($get_image);
$finfo = new \finfo(FILEINFO_MIME_TYPE);
$mime_type_image = $finfo->buffer($get_image);
echo '<br>1----<br>';
var_dump($mime_type_image);

$size = getimagesize($url, $info);
$size2 = exif_read_data($url);
echo '<br>2----<br>';
var_dump($size);
echo '<br>3----<br>';
var_dump($info);
echo '<br>4----<br>';
var_dump($size2);
//if (isset($info["APP0"])) {
	echo '<br>5----<br>';
	$iptc = iptcparse($info);
	var_dump($iptc);
//}