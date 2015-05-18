<?php
/** 
 * User: Tuna
 * Date: 2.5.2015
 * Time: 18:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */
namespace ImageBase;

spl_autoload_register(function ($className) {
	$baseClass = explode('ImageBase\\',$className);

	$filename = __DIR__."/" . implode('/',$baseClass) . ".php";
	//var_dump($filename);
	if (file_exists($filename)) {
			include($filename);
			if (class_exists($className))
					return true;

	}
	return false;
});


use ImageBase\Converter\SimpleConverter;
use ImageBase\Enum\OutputType;
use ImageBase\Enum\PathType;

echo "\n".'================='."\n";
/*
Sample 1
Output Base64
*/
$image = 'http://i.imgur.com/sPU9A.png';
$converter = new SimpleConverter($image);
$rawOutput = $converter->getOutput();
echo $rawOutput;
$converter->debug();

echo "\n".'================='."\n";
/*
Sample 2
use defined $image
Output CSS
*/
$converter2 = new SimpleConverter($image, PathType::URL, OutputType::CSS);
$cssOutput = $converter2->getOutput();
echo $cssOutput;

echo "\n".'================='."\n";
/*
Sample 3
use defined $image
change PathType and OutputType set methods
Output HTML
*/
$converter3 = new SimpleConverter($image);
$converter3->setPathType(PathType::URL);
$converter3->setOutputType(OutputType::HTML);
$htmlOutput = $converter3->getOutput();
echo $htmlOutput;

echo "\n".'================='."\n";
/*
Sample 4
PathType Local File
Output Base64
*/
$image2 = 'samples/sample1.png';
$converter4 = new SimpleConverter($image2, PathType::LOCAL);
$base64Output = $converter4->getOutput();
echo $base64Output;