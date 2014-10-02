<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers;

class FlagViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper {


	/**
	 * Get Flag Image
	 *
	 * @author Boris
	 * @since 24.08.2014
	 *
	 * @param string $code
	 * @param \SJBR\StaticInfoTables\Domain\Model\Country $country
	 * @param int $size
	 *
	 * @return string
	 */
	public function render($code=NULL, \SJBR\StaticInfoTables\Domain\Model\Country $country=NULL, $size=4) {
		//Get params
		if(!is_null($country)) {
			$code	= $country->getIsoCodeA2();
			$this->tag->addAttribute('title', $country->getOfficialNameEn());
		} elseif(!is_null($code)) {
			$code	= $code;
		} else {
			throw new Exception('No country code given!');
		}

		//Resolve size
		switch($size) {
			case 1:
				$folder	= 16;
				break;

			case 2:
				$folder	= 24;
				break;

			case 3:
				$folder	= 32;
				break;

			default:
				$folder	= 48;
		}

		//Get params
		$src_requested	= '/typo3conf/ext/trb_basics_viewhelper/Resources/Public/Flags/'.$folder.'/'.strtolower($code).'.png';
		$src_fallback	= '/typo3conf/ext/trb_basics_viewhelper/Resources/Public/Flags/'.$folder.'/_unknown.png';

		//Deliver
		if(file_exists(rtrim(PATH_site, '/').$src_requested)) {
			return parent::render($src_requested);
		} else {
			return parent::render($src_fallback);
		}
	}

}
