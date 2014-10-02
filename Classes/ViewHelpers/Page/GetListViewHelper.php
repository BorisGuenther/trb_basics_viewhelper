<?php
namespace TRB\TrbBasicsViewhelper\ViewHelpers\Page;

class GetListViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * pagesRepository
	 *
	 * @var \TYPO3\CMS\Frontend\Page\PageRepository
	 * @inject
	 */
	protected $pageRepository = NULL;

	/**
	 * @param int $pid
	 * @param string $as
	 *
	 * @return void
	 */
	public function render($pid, $as) {
		//Set language
		$this->pageRepository->sys_language_uid	= $GLOBALS['TSFE']->sys_language_uid;

		//Get pages
		$where		= $this->pageRepository->enableFields('pages').' AND nav_hide = 0 AND doktype = 1';
		$pages		= $this->pageRepository->getMenu($pid, '*', 'sorting', $where);

		//Helper
		$search		= array(' ', 'ä', 'ö', 'ü', 'ß', '/', '\\', '.', ';', ',', '&');
		$replace	= array('-', 'ae', 'öe', 'ue', '', '', '', '', '', '', '');

		//Inject Page-Title
		$result	= array();
		foreach($pages as $page) {
			//Adjust title
			$page['trb_basics_css_id']	= str_replace($search, $replace, strtolower($page['title'])).'-pid'.$page['uid'];

			//Detach
			$result[]	= $page;
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
