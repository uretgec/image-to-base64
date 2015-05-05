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
use ImageBase\Enum\OutputType;
use ImageBase\Enum\PathType;

class BaseConverter
{
	public $_file; // file url or full path in local folder
	public $_data; // Curl or File Get Content this $_file
	public $_image; // Base64 encode or decode result
	public $_pathType;
	public $_outputType;
	public $_path;
	public $_downloadType;

	public function __construct($file, $pathType = PathType::URL, $outputType = OutputType::RAW, $downloadType = DownloadType::FGET)
	{
		$this->_file 					= $file;
		$this->_pathType 			= $pathType;
		$this->_outputType 		= $outputType;
		$this->_downloadType 	= $downloadType;
	}

	public function setFile($file)
	{
		$this->_file = $file;

		return $this;
	}

	public function getFile()
	{
		return $this->_file;
	}

	public function setData($data)
	{
		$this->_data = $data;

		return $this;
	}

	public function getData()
	{
		return $this->_data;
	}

	public function setImage($image)
	{
		$this->_image = $image;

		return $this;
	}

	public function getImage()
	{
		return $this->_image;
	}

	public function setBase64Encode()
	{
		$this->_image = base64_decode($this->_data);

		return $this;
	}

	public function getBase64Encode()
	{
			return $this->_image;
	}

	public function setPathType($pathType)
	{
		$this->_pathType = $pathType;

		return $this;
	}

	public function getPathType()
	{
		return $this->_pathType;
	}

	public function setOutputType($outputType)
	{
		$this->_outputType = $outputType;

		return $this;
	}

	public function getOutputType()
	{
		return $this->_outputType;
	}

	public function setPath($path)
	{
		$this->_path = $path;

		return $this;
	}

	public function getPath()
	{
		return $this->_path;
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

	public function isFile()
	{
		if(!array_key_exists($this->getPathType(), PathType::getList()))
			$this->setPathType(PathType::URL);

		/*File is URL*/
		if(!file_exists($this->getFile()))
			return false;

		/*File is LOCAL*/
		return true;
	}

	public function downloadFile()
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

	protected function fileGetContent()
	{
		return file_get_contents($this->getFile());
	}

	protected function fOpen()
	{
		return false;
	}

	protected function fCurl()
	{
		return false;
	}

	public function getOutput()
	{
		switch($this->_outputType)
		{
			case OutputType::RAW:
				break;
			case OutputType::HTML:
				break;
			case OutputType::CSS:
				break;
			case OutputType::INLINE:
				break;
		}
	}
}