<?php
/** 
 * User: Tuna
 * Date: 2.5.2015
 * Time: 18:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Converter;


use ImageBase\Enum\DownloadType;
use ImageBase\Enum\ReverseType;

class AdvancedConverter extends BaseConverter
{
	public $_reverse;
	public $_downloadType;

	public function setReverse($reverse = ReverseType::ENCODE)
	{
		$this->_reverse = $reverse;

		return $this;
	}

	public function getReverse()
	{
		return $this->_reverse;
	}

	public function setBase64Decode()
	{
		$this->_base64 = base64_decode($this->_data);

		return $this;
	}

	public function getBase64Decode()
	{
		return $this->_base64;
	}

	public function setDowloadType($downloadType)
	{
		$this->_downloadType = $downloadType;

		return $this;
	}

	public function getDowloadType()
	{
		return $this->_downloadType;
	}

	/*
	 * Additional Function
	*/

	protected function downloadFile()
	{
		if(!array_key_exists($this->getDowloadType(),DownloadType::getList()))
			$this->setDowloadType(DownloadType::FGET);

		$data = false;
		switch($this->getDowloadType())
		{
			case DownloadType::FGET:
				$data = $this->fileGetContent();
				break;
			case DownloadType::FOPEN:
				$data = $this->fOpen();
				break;
			case DownloadType::CURL:
				$data = $this->fCurl();
				break;
		}

		if($data)
			$this->setData($data);
		else
			$this->setData(null);
	}

	protected function fOpen()
	{
		return false;
	}

	protected function fCurl()
	{
		return false;
	}
}