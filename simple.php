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

/*
Sample 1
*/
use ImageBase\Converter\SimpleConverter;

$image = 'http://i.imgur.com/sPU9A.png';
$converter = new SimpleConverter($image);
$rawOutput = $converter->getOutput();
echo $rawOutput;
//$converter->debug();
