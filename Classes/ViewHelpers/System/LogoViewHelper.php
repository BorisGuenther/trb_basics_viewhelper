<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers\System;

class LogoViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper {

	/**
	 * (non-PHPdoc)
	 *
	 * @author Boris
	 * @since 07.09.2014
	 *
	 * @see \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper::render()
	 */
	public function render() {
		return parent::render('trb_basics_typoscript.body.logo');
	}

}
