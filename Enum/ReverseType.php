<?php
/** 
 * User: Tuna
 * Date: 3.5.2015
 * Time: 00:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Enum;


class ReverseType {
		const DECODE = 1;
		const ENCODE = 2;

		public static function getList()
		{
				return [
					self::DECODE => 'Base642Image'
					, self::ENCODE => 'Image2Base64'
				];
		}
}