<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers;

class LinkViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Link\PageViewHelper {

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
		$this->registerTagAttribute('data-ls', 'string', 'Slider configuration');
	}

}
