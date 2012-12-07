<?php
/********************
Author: Tuna Aras
Create: 06.12.2012 01:54
Class type
*********************/
class imagebase64 {
	function file_control($file_name=false){
		if(isset($file_name)) {
            $file_name = trim($file_name);
            return $file_name;
        } else {
            return false;
        }
	}
	function get_mime_type($file=false){
		if(!$file) return false;
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$mime_type = $finfo->buffer($file);
		return $mime_type;
	}
	function get_base64($file_name=false){
		if($this->file_control($file_name)){
			$file = file_get_contents($file_name);
			if($file) {
				$base64_encode = base64_encode($file);
				$mime_type = $this->get_mime_type($file);
				return 'data:'.$mime_type.';base64,'.$base64_encode;
			} else {
				return false;
			} 
		} else {
			return false;
		}
	}
	function base64_image_html($file_name=false){
		if($this->get_base64($file_name)){
			$image_src = '<img alt="Base64 Image" src="'.$this->get_base64($file_name).'" />';
			return $image_src;
		}
	}
	function base64_image_css($file_name=false){
		if($this->get_base64($file_name)){
			$image_src = '.base64_image_code {background:url('.$this->get_base64($file_name).') no-repeat top left;}';
			return $image_src;
		}
	}
}
$image_url = 'http://i.imgur.com/sPU9A.png';
$base64 = new imagebase64();
// Generate Base64 Code
echo $base64->get_base64($image_url);
// Image html inside
echo $base64->base64_image_html($image_url);
// CSS code inside
echo $base64->base64_image_css($image_url);

/********************
Simple code type
********************/
$url = 'http://i.imgur.com/sPU9A.png';
$get_image = file_get_contents($url);
$img_base64 = base64_encode($get_image);
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type_image = $finfo->buffer($get_image);
echo '<img src="data:'.$mime_type_image.';base64,'.$img_base64.'" />';

?>