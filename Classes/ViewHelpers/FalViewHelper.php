<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers;

class FalViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @var \TYPO3\CMS\Core\Resource\FileRepository
	 * @inject
	 */
	protected $fileRepository;

	/**
	 * @param int $uid
	 * @param string $table
	 * @param string $field
	 * @param string $as
	 * @param int $slide
	 *
	 * @return string
	 */
	public function render($uid, $table, $field, $as, $slide=0) {
		//Adjust slide
		if($slide == -1) {
			$slide	= 9999;
		}

		//Get images
		do {
			//Fetch items
			$items	= $this->fileRepository->findByRelation($table, $field, $uid);

			//Items found or no slide enabled
			if(count($items) != 0 || $slide == 0) {
				break;
			}

			//Get parent page
			$page	= \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($table, $uid);

			//Get next UID
			$uid	= $page['pid'];

			//Adjust slide
			$slide--;
		} while($uid != 0 && $slide > 0);

		//Assign items
		$this->templateVariableContainer->add($as, $items);

		//Process items
		$content	= $this->renderChildren();

		//Clear
		$this->templateVariableContainer->remove($as);

		//Deliver
		return $content;
	}

}
