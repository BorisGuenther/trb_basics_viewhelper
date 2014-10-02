<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers;

class TranslateViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper {

	/**
	 * Default path for translations
	 * @var string
	 */
	static private $_default_path	= NULL;

	/**
	 * (non-PHPdoc)
	 *
	 * @author Boris
	 * @since 28.05.2014
	 *
	 * @see \TYPO3\CMS\Fluid\ViewHelpers\Link\PageViewHelper::initializeArguments()
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('default-path', 'string', 'Default path for locallang file');
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @author Boris
	 * @since 07.09.2014
	 *
	 * @see \TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::render()
	 */
	public function render() {
		//Set default path
		if($this->hasArgument('default-path')) {
			//Ensure it's LLL-Path
			if(substr($this->arguments['default-path'], 0, 4) != 'LLL:') {
				throw new \TYPO3\CMS\Fluid\Core\ViewHelper\Exception\InvalidVariableException('Value for paramter "default-path" needs to start with "LLL:"!', 4711);
			}

			//Set default path
			self::$_default_path	= $this->arguments['default-path'];
			return;
		}

		//Get key
		$key	= $this->arguments['key'];

		//Use default path
		if(substr($key, 0, 4) != 'LLL:' && !is_null(self::$_default_path)) {
			//Update key
			$this->arguments['key']	= self::$_default_path.':'.$key;

			//Translate
			$result	= parent::render();
		}

		//Fallback to non-default-path
		if(is_null($result) || ($this->arguments['default'] && $this->arguments['default'] == $result)) {
			//Update key
			$this->arguments['key']	= $key;

			//Translate
			$result	= parent::render();
		}

		//Deliver
		return $result;
	}

}
