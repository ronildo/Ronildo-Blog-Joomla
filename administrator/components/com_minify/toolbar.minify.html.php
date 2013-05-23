<?php
/** ****************************************************************
 * This file is part of Minify4Joomla.
 *
 * Minify4Joomla is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.

 * Minify4Joomla is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Minify4Joomla.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package		Minify4Joomla
 * @copyright	Copyright (C) 2009  Cédric Walter. All rights reserved.
 *******************************************************************/

defined( '_JEXEC' ) or die( 'Restricted access' );

class menuMinify {
  
  function CONFIG_MENU() {
    JToolBarHelper::title( JText::_( 'MINIFY4JOOMLA_SETTINGS' ), 'sections.png' );
    JToolBarHelper::save( 'savesettings', 'Save Settings' );
    JToolBarHelper::back();
    JToolBarHelper::spacer();
  }
  function ABOUT_MENU() {
    JToolBarHelper::title( JText::_( 'ABOUT_MINIFY4JOOMLA' ), 'sections.png' );
    JToolBarHelper::back();
  }

  function LANG_MENU() {
    JToolBarHelper::title( JText::_( 'EDIT_LANGUAGE_FILE' ), 'sections.png' );
    JToolBarHelper::save( 'savefile', 'Save File' );
    JToolBarHelper::cancel();
  }
  
  function GROUP_URL_MENU() {
    JToolBarHelper::title( JText::_( 'EDIT_LANGUAGE_FILE' ), 'sections.png' );
    JToolBarHelper::save( 'savegroups', 'Save File' );
    JToolBarHelper::cancel();
  }
    
  function _DEFAULT() {
    JToolBarHelper::title( JText::_( 'MINIFY4JOOMLA' ), 'sections.png' );
    JToolBarHelper::save( 'savefile', 'Save File' );
    JToolBarHelper::cancel();
  }
  
  
  

}
?>