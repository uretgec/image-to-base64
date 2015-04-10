Image to Base64 - I2Base64
=============

Simple Image to Base64 function for your web project and website. There is no configration file.

* Generate base64 code of image use file_get_contents function
* Find image mime type use finfo class.
* Output: image base64 code - img html code -  image base64 background css code

Using:

	$image_url = 'http://i.imgur.com/sPU9A.png';
	$base64 = new imagebase64();
	// Generate Base64 Code
	echo $base64->get_base64($image_url);
	// Image html inside
	echo $base64->base64_image_html($image_url);
	// CSS code inside
	echo $base64->base64_image_css($image_url);

NOTE: Php 5.3.0+ requirement and activate extension=php_fileinfo.dll in php.ini file

TODO (2015-03-26)
-----
- Re write class
- json response (ajax request return)
- img: size, width-height, url or local file, generate new short url, base64 url with code and style print
- Toggle base64 index.html
- js base base64Image try
- php and js base64 image exif data read try

URETGEC
-----
Image to Base64 was made by [Uretgec](http://www.uretgec.com). 

MIT Open Source License
-----
Image to Base64 is released under the MIT public license.
