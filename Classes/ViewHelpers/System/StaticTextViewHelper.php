<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers\System;

class StaticTextViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper {

	/**
	 * (non-PHPdoc)
	 *
	 * @author Boris
	 * @since 07.09.2014
	 *
	 * @param int $index
	 *
	 * @see \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper::render()
	 */
	public function render($index) {
		return parent::render('trb_basics_typoscript.body.text.'.intval($index));
	}

}
