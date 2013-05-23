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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();


jimport('joomla.application.component.controller');

require_once (dirname(__FILE__).DS.'class'.DS.'helper.php');
require_once (dirname(__FILE__).DS.'class'.DS.'configHelper.php');

/**
 *
 */
class MinifyAdminController extends JController
{

	var $langTag = "en-GB";

	function __construct( $default = array())
	{
		parent::__construct( $default );
		$lang		=& JFactory::getLanguage();
		$this->langTag = $lang->getTag();
	}

	function urlBuilder() {
		M4JConfigHelper::showUrlBuilder();
	}

	function settings() {
		include(M4J_CONFIG);
		$option = JRequest::getVar( 'option', '');
		M4JConfigHelper::showConfig($option);
	}

	function language() {
		$option = JRequest::getVar( 'option', '');
		M4JHelper::showLanguage($option);
	}

	function checkSystem() {
		require_once (dirname(__FILE__).DS.'class'.DS.'systemchecker.php');
		M4JSystemChecker::checkSystem();
	}

	function documentation() {
		$file = dirname( __FILE__ ).DS.'manuals'.DS.$this->langTag.DS.'documentation.html';
		if (!file_exists($file)) {
			$file = dirname( __FILE__ ).DS.'manuals'.DS.'en-GB'.DS.'documentation.html';
		}
		$option = JRequest::getVar( 'option', '');
		echo M4JHelper::getContentOfFile($file, $option);
	}

	function about() {
		$file = dirname( __FILE__ ).DS.'manuals'.DS.$this->langTag.DS.'about.html';
		if (!file_exists($file)) {
			$file = dirname( __FILE__ ).DS.'manuals'.DS.'en-GB'.DS.'about.html';
		}
		$option = JRequest::getVar( 'option', '');
		echo M4JHelper::getContentOfFile($file, $option);
	}

	function checkLatest() {
		include_once (M4J_CONFIG);
		echo "<script> window.open('http://www.waltercedric.com/updater.php?option=com_versions&catid=16&myVersion=$minify4joomlaversion','mywindow')</script>";

		//global $mainframe;
		//$mainframe->redirect("http://www.waltercedric.com/updater.php?option=com_versions&catid=16&myVersion=$minify4joomlaversion", "Redirecting You to www.waltercedric.com for checking latest version");
	}

	function savesettings() {
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$option = JRequest::getVar( 'option', '');
		M4JConfigHelper::saveConfig($option);
		MinifyAdminController::settings();
	}

	function savefile() {
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$option = JRequest::getVar( 'option', '');
		$filecontent = JRequest::getVar( 'filecontent', '', _MOS_ALLOWHTML);
		$file = JRequest::getVar( 'file', '');
		M4JHelper::savefile($file, $filecontent, $option);
	}

	function savegroups() {
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$option = JRequest::getVar( 'option', '');
		$filecontent = JRequest::getVar( 'filecontent', '', _MOS_ALLOWHTML);
		$file = JRequest::getVar( 'file', '');
		M4JHelper::saveGroupfile($file, $filecontent, $option);
	}

	function emptyCache() {
		M4JHelper::cleanCache();
		global $mainframe;
		$option = JRequest::getVar( 'option', '');
		$mainframe->redirect("index2.php?option=$option&task=settings", JText::_('MINIFY_CACHE_CLEANED'));
	}


	function patchJDocumentRendererHead() {
		require_once (dirname(__FILE__).DS.'class'.DS.'patcher.php');
		M4JPatcher::patchJDocumentRendererHead();
	}

	function unpatchJDocumentRendererHead() {
		require_once (dirname(__FILE__).DS.'class'.DS.'patcher.php');
		M4JPatcher::patchJDocumentRendererHead();
	}
	
	function defaultTask() {
		$this->about();
	}

}