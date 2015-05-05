<?php
/** 
 * User: Tuna
 * Date: 3.5.2015
 * Time: 00:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Enum;


class MapType {
		const DIRECT = 1;

		public static function getList()
		{
				return [
					self::DIRECT => 'Direct'
				];
		}
}