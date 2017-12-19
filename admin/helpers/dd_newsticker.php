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
 * Class DD_NewstickerHelper
 *
 * @since  Version 1.0.0.0
 */
class DD_NewstickerHelper extends JHelperContent
{

	public static $extension = 'com_dd_newsticker';

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param   string   $component  The component name.
	 * @param   string   $section    The access section name.
	 * @param   integer  $id         The item ID.
	 *
	 * @return  JObject
	 */
	public static function getActions($component = '', $section = '', $id = 0)
	{
		if (!$section || $id)
		{
			return parent::getActions($component, $section, $id);
		}

		$assetName = $component . '.' . $section;

		$path = JPATH_ADMINISTRATOR . '/components/' . $component . '/access.xml';

		$actions = JAccess::getActionsFromFile($path, "/access/section[@name='component']/");

		$user	= JFactory::getUser();
		$result	= new JObject;

		foreach ($actions as $action)
		{
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}

		return $result;
	}


	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
	 *
	 * @since    Version 1.1.0.1
	 */
	public static function addSubmenu($vName)
	{
		// Articles
		JHtmlSidebar::addEntry(
			JText::_('Newsticker Articles'),
			'index.php?option=com_dd_newsticker&view=articles',
			$vName == 'articles'
		);
	}


	/**
	 * Get Component Version
	 *
	 * @return string component version
	 *
	 * @since  Version  1.1.0.0
	 */
	public static function getComponentVersion()
	{
		$xml = JFactory::getXML(JPATH_ADMINISTRATOR . '/components/com_dd_newsticker/dd_newsticker.xml');
		$version = (string) $xml->version;

		return $version;
	}

	/**
	 * Get Component Coyright
	 *
	 * @return string component copyright
	 *
	 * @since  Version  1.1.0.0
	 */
	public static function getComponentCoyright()
	{
		$xml = JFactory::getXML(JPATH_ADMINISTRATOR . '/components/com_dd_newsticker/dd_newsticker.xml');
		$copyright = (string) $xml->copyright;

		return $copyright;
	}
}
