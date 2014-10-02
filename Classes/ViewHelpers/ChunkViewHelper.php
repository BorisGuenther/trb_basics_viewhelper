<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers;

class ChunkViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @param QueryResultInterface|array $items
	 * @param int $size
	 * @param string $as
	 *
	 * @return string
	 */
	public function render($items, $size, $as) {
		//Adjust input
		if($items instanceof \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult) {
			$items	= $items->toArray();
		}

		//Split array into chunks
		$chunks	= array_chunk($items, $size);

		//Process chunks
		$this->templateVariableContainer->add($as, $chunks);
		$content	= $this->renderChildren();
		$this->templateVariableContainer->remove($as);

		return $content;
	}

}
