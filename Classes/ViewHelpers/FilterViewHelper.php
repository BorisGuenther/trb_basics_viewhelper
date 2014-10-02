<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers;

class FilterViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @param QueryResultInterface|array $categories
	 * @param string $prefix
	 *
	 * @return string
	 */
	public function render($categories, $prefix=NULL) {
		//Adjust prefix
		if(trim($prefix) != '') {
			$prefix	= $prefix.'-';
		}

		$result	= '';
		foreach($categories as $category) {
			$result .= ' '.$prefix.$category->getUid();
		}

		return $result.' ';
	}

}
