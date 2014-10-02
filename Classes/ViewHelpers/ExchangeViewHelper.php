<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers;

class ExchangeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Array with texts
	 * @var array
	 */
	static private $_items	= array();

	/**
	 * Set content of Exchange-Viewhelper
	 * (non-PHPdoc)
	 *
	 * @author Boris
	 * @since 07.09.2014
	 *
	 * @param string $key
	 * @param string $value
	 *
	 * @see \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper::render()
	 */
	public function render($key, $value=NULL) {
		//Get 'set' content
		if(is_null($value)) {
			$value	= $this->renderChildren();
		}

		//No content given => Deliver content
		if(trim($value) == '') {
			return self::GetValue($key);
		}

		//Set content
		self::$_items[$key]	= $value;
	}

	/**
	 * Get value for key
	 *
	 * @author Boris
	 * @since 07.09.2014
	 *
	 * @param string $key
	 *
	 * @return string
	 */
	static public function GetValue($key) {
		if(isset(self::$_items[$key])) {
			return self::$_items[$key];
		}
	}

}
