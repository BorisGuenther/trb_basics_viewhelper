<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers;

class RenderViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper {

	/**
	 * Render Template
	 *
	 * @author Boris
	 * @since 25.06.2014
	 *
	 * @param string $section
	 * @param string $partial
	 * @param array $arguments
	 * @param bool $optional
	 * @param string $fallback
	 *
	 * @return string
	 */
	public function render($section=NULL, $partial=NULL, $arguments=array(), $optional=FALSE, $fallback=NULL) {
		try {
			return parent::render($section, $partial, $arguments, $optional);
		} catch(\TYPO3\CMS\Fluid\View\Exception\InvalidTemplateResourceException $e) {
			if(!is_null($fallback)) {
				return parent::render($section, $fallback, $arguments, $optional);
			}
			throw $e;
		}
	}

}
