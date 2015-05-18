<?php
/** 
 * User: Tuna
 * Date: 2.5.2015
 * Time: 18:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Converter;


class FunctionalConverter extends BaseConverter
{
	public $_exifModel;
	public $_imageModel;

	public function setExifModel($exif)
	{
		$this->_exifModel = $exif;

		return $this;
	}

	public function getExifModel()
	{
		return $this->_exifModel;
	}

	public function setImageModel($imageModel)
	{
		$this->_imageModel = $imageModel;

		return $this;
	}

	public function getImageModel()
	{
		return $this->_imageModel;
	}

	/*
	 * Additional Functions
	 * */
	protected function saveImage()
	{
		return null;
	}
}