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

require_once( JApplicationHelper::getPath( 'toolbar_html' ) );


switch ($task) {
  case "about":
    menuMinify::ABOUT_MENU();
    break;

  case "settings":
    menuMinify::CONFIG_MENU();
    break;
  
  case "language":
    menuMinify::LANG_MENU();
    break;
    
  case "urlbuilder":
    menuMinify::GROUP_URL_MENU();
    break;

  default:
   menuMinify::_DEFAULT();
    break;
}
?>