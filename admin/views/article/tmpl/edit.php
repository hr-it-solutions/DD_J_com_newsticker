<?php
/**
 * @package    DD_SocialShare
 *
 * @author     HR IT-Solutions Florian Häusler <info@hr-it-solutions.com>
 * @copyright  Copyright (C) 2017 - 2017 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
JHtml::_('formbehavior.chosen', '#jform_catid', null, array('disable_search_threshold' => 0));
JHtml::_('formbehavior.chosen', 'select');

JHtml::_('script', 'com_dd_socialshare/admin.dd_socialshare.min.js', array('version' => 'auto', 'relative' => true));

JText::script('COM_DD_SOCIALSHARE_BUTTON_SHARE_AGAIN');

?>
<div id="dd_socialshare-article" class="row-fluid dd_socialshare">
<form action="<?php echo JRoute::_('index.php?option=com_dd_newsticker&layout=edit&id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="adminForm" class="form-validate">
<div class="row-fluid">
    <div class="span12">
        <div class="form-inline form-inline-header">
            <div class="control-group">
                <div class="control-label">
                    <?php echo $this->form->getLabel('title'); ?>
                </div>
                <div class="controls">
                    <?php echo $this->form->getInput('title'); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
			        <?php echo $this->form->getLabel('id'); ?>
                </div>
                <div class="controls">
			        <?php echo $this->form->getInput('id'); ?>
                </div>
            </div>
        </div>

	    <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>
	    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('General')); ?>
        <div class="row-fluid">
            <div class="span9">
                <fieldset>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('source'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('source'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('eventdate'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('eventdate'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('positiv'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('positiv'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('topic'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('topic'); ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="span3">
		        <?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>

            </div>
        </div>
	    <?php echo JHtml::_('bootstrap.endTab');?>

	    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('Publishing')); ?>
        <div class="row-fluid form-horizontal-desktop">
            <div class="span3">
                <div class="control-group">
                    <div class="control-label">
			            <?php echo $this->form->getLabel('created_by'); ?>
                    </div>
                    <div class="controls">
			            <?php echo $this->form->getInput('created_by'); ?>
                    </div>
                </div>
            </div>
        </div>
	    <?php echo JHtml::_('bootstrap.endTab'); ?>

	    <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value=""/>
	    <?php echo JHtml::_('form.token'); ?>
    </div>
</div>
</form>
</div>
