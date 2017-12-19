<?php
/**
 * @package    DD_Newsticker
 *
 * @author     HR IT-Solutions Florian Häusler <info@hr-it-solutions.com>
 * @copyright  Copyright (C) 2017 - 2017 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

if (!JFactory::getUser()->authorise('core.manage', 'com_dd_newsticker'))
{
	throw new JAccessExceptionNotallowed(JText::_('JERROR_ALERTNOAUTHOR'), 403);
}

JLoader::import('helpers.dd_newsticker', JPATH_COMPONENT_ADMINISTRATOR);

JHtml::_('jQuery.Framework');

JHTML::_('stylesheet', 'com_dd_newsticker/admin.dd_newsticker.min.css', array(), true);

$controller	= JControllerLegacy::getInstance('DD_Newsticker');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
