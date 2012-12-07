Image to Base64 - I2Base64
=============

Simpel Image to Base64 function for your web project and website.

	$base64 = new imagebase64();
	// Generate Base64 Code
	echo $base64->get_base64('http://i.imgur.com/sPU9A.png');
	// Image html
	echo $base64->base64_image_html('http://i.imgur.com/sPU9A.png');
	// CSS code
	echo $base64->base64_image_css('http://i.imgur.com/sPU9A.png');

NOTE: Php 5.3.0+ requirement and activate extension=php_fileinfo.dll in php.ini file

URETGEC
-----
Image to Base64 was made by [Uretgec](http://www.uretgec.com). 

MIT Open Source License
-----
Image to Base64 is released under the MIT public license.
