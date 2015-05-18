<?php
/** 
 * User: Tuna
 * Date: 3.5.2015
 * Time: 00:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Enum;


class OutputType {
		const RAW 	= 1;
		const HTML 	= 2;
		const CSS 	= 3;
		const INLINE= 4;

		public static function getList()
		{
				return [
					self::RAW 		=> 'Raw Format'
					, self::HTML 	=> 'HTML Format (IMG Tag)'
					, self::CSS 	=> 'CSS Format (Class)'
					, self::INLINE=> 'HTML Inline Format'
				];
		}
}