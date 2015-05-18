<?php
/** 
 * User: Tuna
 * Date: 2.5.2015
 * Time: 19:24
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Model;

use ImageBase\Enum\MapType;

class Image
{
		/*
		 * General Info
		 * */
		public $_fileName;
		public $_fileSize;
		public $_fileType;
		public $_mime_type;

		/*
		 * Image Dimension
		 * */
		public $_imageWidth;
		public $_imageHeight;
		public $_imageBitDepth;
		public $_imageColorType;
		public $_imageFilter;
		public $_imageInterlace;

		/*
		 * Additional Info
		 * */
		public $_software;
		public $_compression;
		public $_fileModifyDate;

		public static function getMapData( array $data, $mapType)
		{
				try
				{
						switch($mapType)
						{
								case MapType::DIRECT:

										break;
								default:
										throw new \Exception('Image Map Error: '.$mapType);
						}
				}
				catch( \Exception $e )
				{
						throw new \Exception('Error: '.$e->getMessage());
				}
		}
}