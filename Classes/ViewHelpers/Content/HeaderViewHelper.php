<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers\Content;

class HeaderViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper {

	/**
	 * Renders the TypoScript object in the given TypoScript setup path.
	 *
	 * @param mixed $data the data to be used for rendering the cObject. Can be an object, array or string. If this argument is not set, child nodes will be used
	 *
	 * @return string the content of the rendered TypoScript object
	 */
	public function render($data=NULL) {
		return parent::render('lib.stdheader', $data);
	}

}
