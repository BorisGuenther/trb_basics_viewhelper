<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers\Content;

class RenderViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper {

	/**
	 * Render content of page
	 *
	 * @author Boris
	 * @since 31.08.2014
	 *
	 * @param array $data
	 * @param array $settings		array(colpos => fallback_pid);
	 * @param string $as
	 *
	 * @see \TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper::render()
	 */
	public function render($page=NULL, $settings=array(), $as="content") {
		//Get contents
		$result	= array();
		foreach($settings as $colpos => $fallback_pid) {
			//Adjust page settings
			$page['colPos']		= intval($colpos);
			$page['fallback']	= intval($fallback_pid);

			//Get content
			$result[$colpos]	= parent::render('trb_basics_viewhelper.content.render', $page);
		}

		//Assign items
		$this->templateVariableContainer->add($as, $result);

		//Process items
		$content	= $this->renderChildren();

		//Clear
		$this->templateVariableContainer->remove($as);

		//Deliver
		return $content;
	}

}
