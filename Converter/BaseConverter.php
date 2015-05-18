<?php
/** 
 * User: Tuna
 * Date: 2.5.2015
 * Time: 18:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Converter;


use ImageBase\Enum\OutputType;
use ImageBase\Enum\PathType;

class BaseConverter
{
	public $_file; // file url or full path in local folder
	public $_data; // Curl or File Get Content this $_file
	public $_base64; // Base64 encode or decode result
	public $_image; // Image file (Base64 or real)
	public $_pathType;
	public $_outputType;
	public $_path;
	public $_mimeType;


	public function __construct($file, $pathType = PathType::URL, $outputType = OutputType::RAW)
	{
		$this->_file 					= $file;
		$this->_pathType 			= $pathType;
		$this->_outputType 		= $outputType;
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

	/*
	 * Schema
	 * data:[<mime type>][;charset=<charset>][;base64],<encoded data>
	 * */
	public function setImage($image = null)
	{
		if($image !== null)
			$this->_image = $image;
		else
			$this->_image = 'data:'.$this->getMimeType().';base64,'.$this->getBase64Encode();

		return $this;
	}

	public function getImage()
	{
		return $this->_image;
	}

	public function setBase64Encode()
	{
		$this->_base64 = base64_encode($this->getData());

		return $this;
	}

	public function getBase64Encode()
	{
			return $this->_base64;
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

	public function setMimeType($mimeType)
	{
		$this->_mimeType = $mimeType;

		return $this;
	}

	public function getMimeType()
	{
		return $this->_mimeType;
	}

	/*
	 * Additional Function
	*/

	public function isFile()
	{
		if(!array_key_exists($this->getPathType(), PathType::getList()))
			$this->setPathType(PathType::URL);

		/*File is URL*/
		if($this->getPathType() == PathType::LOCAL)
			if(!file_exists($this->getFile()))
				return false;

		/*File is LOCAL*/
		return true;
	}

	protected function downloadFile()
	{
		$data = $this->fileGetContent();

		if($data) {
			$this->setData($data);
			$this->setBase64Encode($data);
		} else {
			$this->setData(null);
			$this->setBase64Encode(null);
		}
	}

	protected function fileGetContent()
	{
		if(!$this->isFile())
			return false;

		return file_get_contents($this->getFile());
	}

	protected function progress()
	{
		/*
		 * Step by Step
		 * Get $this->_data
		 * Get fInfo or advanced class image info data
		 * If use advanced class, will you inject Image Models into the class
		 * Ready to getOutput()
		 * Thats it
		 * */
		$this->downloadFile();
		if($this->getData() === null)
			return false;

		$fInfo = new \finfo(FILEINFO_MIME_TYPE);
		$mimeType = $fInfo->buffer($this->getData());
		$this->setMimeType($mimeType);
		$this->setImage();
		return true;
	}

	/*
 * Final Function
 */
	public function getOutput()
	{

		if(!$this->progress())
			return null;

		switch($this->getOutputType())
		{
			case OutputType::RAW:
				return $this->getImage();
				break;
			case OutputType::HTML:
				return '<img alt="Base64 Image" src="' . $this->getImage() . '" />';
				break;
			case OutputType::CSS:
				return '.base64_image_code {background:url("' . $this->getImage() . '") no-repeat top left;}';
				break;
			case OutputType::INLINE:
				return null;
				break;
			default:
				return null;
				break;
		}
	}

	/*
	 * Debug Option
	 * */
	public function debug()
	{
		unset($this->_data);
		var_dump($this);
	}

}