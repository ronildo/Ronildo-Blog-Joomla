<?php
/**
 * SEF component for Joomla! 1.5
 *
 * @author      ARTIO s.r.o.
 * @copyright   ARTIO s.r.o., http://www.artio.cz
 * @package     JoomSEF
 * @version     3.1.0
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

//require_once(JPATH_COMPONENT.DS.'classes'.DS.'button.php');

class SEFViewSEF extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('JoomSEF'), 'artio.png');

		parent::display($tpl);
	}
}
