<?php
/**
* Thank you messege layout
*
* @version		$Id: default_thank.php 170 2009-08-12 07:29:38Z dr_drsh $
* @package		Joomla
* @subpackage	JForms
* @copyright	Copyright (C) 2008 Mostafa Muhammad. All rights reserved.
* @license		GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

echo '<div class="jform">';
echo '<span class="data"></span><h2>'.$this->form->title.'</h2>';
echo "<br /><p style='clear:left;margin-left:60px;'>".$this->form->thank."</p>";
echo '</div>';