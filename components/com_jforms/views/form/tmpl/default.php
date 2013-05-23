<?php
/**
* Default layout for form view
*
* @version		$Id: default.php 170 2009-08-12 07:29:38Z dr_drsh $
* @package		Joomla
* @subpackage	JForms
* @copyright	Copyright (C) 2008 Mostafa Muhammad. All rights reserved.
* @license		GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');


echo '<div class="jform">';		
echo '<table class="jform"><tr><td>';
echo '<span class="data"></span><h2>'.$this->row->title.'</h2>';

echo '<form name="jform" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm_'.$this->row->id.'(this);">';

foreach ($this->row->fields as $f ){
	echo $this->pManager->invokeMethod('render', JFORM_PLUGIN_ELEMENT, array($f->type), array( $f ) );
}

?>

<input type="hidden" name="option" value="com_jforms" />
<input type="hidden" name="task" value="save" />
<input type="hidden" name="uid" value="<?php echo $this->uid ?>" />
<input type="hidden" name="id" value="<?php echo $this->row->id ?>" />
<input type="hidden" name="Itemid" value="<?php echo $this->Itemid ?>" />

<?php echo JHTML::_( 'form.token' ); 
echo '</form>';
echo '</td></tr></table>';
echo '</div>';