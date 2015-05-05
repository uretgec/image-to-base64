<?php
/** 
 * User: Tuna
 * Date: 3.5.2015
 * Time: 00:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Enum;


class PathType {
		const URL 	= 1;
		const LOCAL = 2;

		public static function getList()
		{
				return [
					self::URL 		=> 'URL'
					, self::LOCAL => 'Local'
				];
		}
}