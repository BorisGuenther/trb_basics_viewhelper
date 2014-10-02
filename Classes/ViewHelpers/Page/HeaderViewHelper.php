<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers\Page;

class HeaderViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper {

	/**
	 * Render Page Header
	 *
	 * @param array $page The page array
	 * @param string $heading
	 * @param string $key
	 * @param string $class
	 *
	 * @return string
	 */
	public function render($page, $heading=NULL, $key=NULL, $class=NULL) {
		//Get default heading
		if(is_null($heading)) {
			$heading	= 'h1';
		}

		//Get Exchange Value
		if(!is_null($key)) {
			$result	= \TRB\TrbBasicsViewhelper\ViewHelpers\ExchangeViewHelper::GetValue($key);
		}

		//Get heading
		if(is_null($result)) {
			if(trim($page['subtitle']) != '') {
				$result	= $page['subtitle'];
			} else {
				$result	= $page['title'];
			}
		}

		//Deliver
		return '<'.$heading.' class="'.$class.'">'.$result.'</'.$heading.'>';
	}

}
