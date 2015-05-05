<?php
/** 
 * User: Tuna
 * Date: 3.5.2015
 * Time: 00:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Enum;


class DownloadType {
		const FOPEN 	= 1;
		const FGET 		= 2;
		const CURL	 	= 3;

		public static function getList()
		{
				return [
					self::FOPEN 		=> 'FOpen'
					, self::FGET	  => 'File Get Content'
					, self::CURL	  => 'Curl'
				];
		}
}