<?php
/**
 * @package    DD_Newsticker
 *
 * @author     HR IT-Solutions Florian Häusler <info@hr-it-solutions.com>
 * @copyright  Copyright (C) 2017 - 2017 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

/**
 * Class DD_NewstickerViewArticles
 *
 * @since  Version  1.0.0.0
 */
class DD_NewstickerViewArticles extends JViewLegacy
{
	/**
	 * An array of items
	 *
	 * @var  array
	 */
	protected $items;

	/**
	 * The model state
	 *
	 * @var  object
	 */
	protected $state;

	/**
	 * The Pagination
	 *
	 */
	protected $pagination;

	public $filterForm;

	public $activeFilters;

	protected $canDo;

	protected $sidebar;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise an Error object.
	 *
	 * @since  Version  1.0.0.0
	 * @throws  Exception
	 */
	public function display($tpl = null)
	{
		$this->canDo = DD_NewstickerHelper::getActions('com_dd_newsticker', 'articles');

		DD_NewstickerHelper::addSubmenu('articles');

		// Load the datas from the model
		$this->items			= $this->get('Items');
		$this->state			= $this->get('State');
		$this->pagination		= $this->get('Pagination');
		$this->filterForm		= $this->get('FilterForm');
		$this->activeFilters	= $this->get('ActiveFilters');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors), 500);
		}

		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();

		return parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   Version  1.0.0.0
	 */
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('DD Newsticker: Articles'), 'article');

		if ($this->canDo->get('core.create'))
		{
			JToolBarHelper::addNew('article.add');
		}

		if (!empty($this->items))
		{
			if ($this->canDo->get('core.edit'))
			{
				JToolBarHelper::editList('article.edit');
			}

			if ($this->canDo->get('core.edit.state'))
			{
				JToolbarHelper::publish('articles.publish', 'JTOOLBAR_PUBLISH', true);
				JToolbarHelper::unpublish('articles.unpublish', 'JTOOLBAR_UNPUBLISH', true);
				JToolbarHelper::checkin('articles.checkin');
			}

			if ($this->state->get('filter.published') == -2 && $this->canDo->get('core.delete'))
			{
				JToolbarHelper::deleteList('', 'articles.delete', 'JTOOLBAR_EMPTY_TRASH');
			}
			elseif ($this->canDo->get('core.edit.state'))
			{
				JToolbarHelper::trash('articles.trash');
			}
		}

		if ($this->canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_dd_newsticker');
		}
	}

	/**
	 * Add the sidebar
	 *
	 * @return  void
	 *
	 * @since   Version  1.0.0.0
	 */
	protected function addSidebar()
	{
		DD_NewstickerHelper::addSubmenu('articles');
		$this->sidebar = JHtml::_('sidebar.render');
	}

	/**
	 * Drop Down Filter
	 *
	 * @return array
	 *
	 * @since Version 1.0.0.0
	 */
	protected function getSortFields()
	{
		return array(
			'a.state' => JText::_('JSTATUS'),
			'a.title' => JText::_('JGLOBAL_TITLE'),
		);
	}
}
