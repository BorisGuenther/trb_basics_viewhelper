<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers;

class ImageViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper {

	/**
	 * (non-PHPdoc)
	 *
	 * @author Boris
	 * @since 29.05.2014
	 *
	 * @see \TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper::initializeArguments()
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerTagAttribute('data-ls', 'string', 'Slider configuration');
	}

}
