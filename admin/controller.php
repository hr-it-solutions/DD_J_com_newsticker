<?php
/**
 * @package    DD_Newsticker
 *
 * @author     HR IT-Solutions Florian Häusler <info@hr-it-solutions.com>
 * @copyright  Copyright (C) 2017 - 2017 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

class DD_NewstickerController extends JControllerLegacy{

	/**
	 * The default view.
	 *
	 * @var    string
	 *
	 * @since  Version 1.0.0.0
	 */
	protected $default_view = 'articles';

	/**
	 * Method to display a view.
	 *
	 * @param   boolean        $cachable   If true, the view output will be cached
	 * @param   array|boolean  $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  ContentController|boolean  This object to support chaining.
	 *
	 * @since   Version 1.0.0.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
		return parent::display();
	}
}
