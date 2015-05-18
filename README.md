Image to Base64 - I2Base64
=============

Simple Image to Base64 function for your web project and website. There is no configration file.

* Generate base64 code of image use file_get_contents, fopen (Not ready) and curl (Not ready)
* Find image mime type use finfo class and more properties find ( getimagesize - exif ) functions (Models are ready but not ready to use)
* Output: image base64 code - img html code -  image base64 background css code

* Simple, Advanced and Functional Converters extends BaseConverter class
* There are 5 Enum types
* There are 2 Model for get the Exif and Image Properties

Using Old Relase (init first_release.php):

	$image_url = 'http://i.imgur.com/sPU9A.png';
	$base64 = new imagebase64();
	// Generate Base64 Code
	echo $base64->get_base64($image_url);
	// Image html inside
	echo $base64->base64_image_html($image_url);
	// CSS code inside
	echo $base64->base64_image_css($image_url);
	
Using New Relase (simple.php):

	$image = 'http://i.imgur.com/sPU9A.png';
	// Select Converter
	$converter = new SimpleConverter($image);
	$rawOutput = $converter->getOutput();
	echo $rawOutput;
	// Debug This
	$converter->debug();
	
NOTE: Php 5.3.0+ requirement and activate extension=php_fileinfo.dll in php.ini file

TODO (2015-05-18)
-----
- Re write class (OK)
- Exception Add (Waiting - Maybe Next Release)
- json response (ajax request return) (Not Yet)
- img: size, width-height, url or local file, generate new short url, base64 url with code and style print (Less of them finished - More of them is waiting)
- Toggle base64 index.html (i dont understand why am i writing this sentence.)
- js base base64Image try (ASAP)
- php and js base64 image exif data read try (Model base finished but not ready to use. Next release will it be ready to use)

URETGEC
-----
Image to Base64 was made by [Uretgec](http://www.uretgec.com). 

MIT Open Source License
-----
Image to Base64 is released under the MIT public license.
