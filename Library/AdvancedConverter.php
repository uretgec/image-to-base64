<?php
/** 
 * User: Tuna
 * Date: 2.5.2015
 * Time: 18:57
 * Company: Uretgec
 * URI: www.uretgec.com
 */

namespace ImageBase\Converter;


use ImageBase\Enum\ReverseType;

class AdvancedConverter extends BaseConverter
{
		public $_reverse;

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
			$this->_image = base64_decode($this->_data);

			return $this;
		}

		public function getBase64Decode()
		{
			return $this->_image;
		}


}