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
//since I include config files
//define('_MINIFY_EXEC', 1);

class M4JDocumentRendererHead {

	var $min_serveOptions = array();
	

	//a singleton
	function &getInstance()
	{
		static $instance;

		if (!is_object($instance))
		{
			//$min_serveOptions['minApp']['groups'] = require_once(JPATH_SITE.'components'.DS.'com_minify'.DS.'groupsConfig.php');
			$instance = & new M4JDocumentRendererHead();
		}

		return $instance;
	}

	/**
	 * LearningMode replace ?f= by ?g= and automatically change group file!
	 *
	 * @param $document
	 * @return unknown_type
	 */
	function  getScriptFileLinks(&$document, $lnEnd, $tab) {
		$scriptsBytype = array();
		foreach ($document->_scripts as $strSrc => $strType) {
			if (array_key_exists($strType, $scriptsBytype)) {
				$scriptsBytype[$strType] .= $strSrc.",";
			} else {
				$scriptsBytype[$strType] = $strSrc.",";
			}
		}
		
		//if ($m4j_learningMode ) {	}
		
		$strHtml = "";
		foreach ($scriptsBytype as  $strType => $strMinify) {
			//poor man approach, always end with a , too much so remove it
			$strMinify = substr($strMinify, 0, strlen($strMinify) - 1);
			$strHtml .= $tab.'<script type="'.$strType.'" src="'.JURI :: root().'components/com_minify/?f='.$strMinify.'"></script>'.$lnEnd;
		}
		return $strHtml;
	}

	

	function getStylesheetLinks() {

		$scriptsBy = array();
		foreach ($document->_styleSheets as $strSrc => $strAttr ) {
			if (array_key_exists($strAttr['mime'], $scriptsBy)) {
				$scriptsBy[$strAttr['mime']] .= $strSrc.",";
			} else {
				$scriptsBy[$strAttr['mime']] = $strSrc.",";
			}
			
			if (array_key_exists($strAttr['media'], $scriptsBy)) {
				$scriptsBy[$strAttr['media']] .= $strSrc.",";
			} else {
				$scriptsBy[$strAttr['media']] = $strSrc.",";
			}
			
			if (array_key_exists($strAttr['mime'], $scriptsBy)) {
				$scriptsBy[$strAttr['mime']] .= $strSrc.",";
			} else {
				$scriptsBy[$strAttr['mime']] = $strSrc.",";
			}
			
			
			
		}

		foreach ($document->_styleSheets as $strSrc => $strAttr )
		{
			$strHtml .= $tab . '<link rel="stylesheet" href="'.$strSrc.'" type="'.$strAttr['mime'].'"';
			if (!is_null($strAttr['media'])){
				$strHtml .= ' media="'.$strAttr['media'].'" ';
			}
			if ($temp = JArrayHelper::toString($strAttr['attribs'])) {
				$strHtml .= ' '.$temp;;
			}
			$strHtml .= $tagEnd.$lnEnd;
		}
	}



}

?>