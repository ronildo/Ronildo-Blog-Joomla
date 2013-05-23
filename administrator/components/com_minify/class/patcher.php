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

DEFINE('M4J_JOOMLA_HEAD_RENDERER', JPATH_ROOT.DS.'libraries'.DS.'joomla'.DS.'document'.DS.'html'.DS.'renderer'.DS.'head.php');


DEFINE('M4J_JS_UUID1', '30424ab1-e012-4ec5-8148-4ec8cc87504e');
DEFINE('M4J_JS_UUID1', '6b9b8273-b5d3-4e9c-93bd-bf1425dc9d7f');

class M4JPatcher extends JObject {
	
	function patchJDocumentRendererHead() {
		global $mainframe;

		$patchFile = M4J_JOOMLA_HEAD_RENDERER;
		$contents = M4JHelper::getContentOfFile($patchFile, null);
		if (ereg(M4J_JS_UUID1, $contents)) {
			echo '<h1>'.JText::_('MINIFY_ALREADY_PATCHED').'</h1>';
			echo '<a href="index2.php?option='.$mainframe->get('component').'">'.JText::_('MINIFY_CLICK_HERE_CONTINUE').'</a>';
			return;
		}

		//Comment some lines that generate Javascript in renderer
		$patchText = '//'.M4J_JS_UUID1.'\n
		
		
		
		
		
		'.M4J_JS_UUID2.'
		
		
		// Generate script file links
		foreach ($document->_scripts as $strSrc => $strType) {\n
			$strHtml .= $tab.\'<script type="\'.$strType.\'" src=\"\'.$strSrc.\'"></script>\'.$lnEnd;\n
		}';
		$contents = str_replace($patchText,'/*'.$patchText."*/", $contents);





		if ($fp = fopen($patchFile, 'wb')) {
			fwrite($fp, $contents);
			fclose($fp);
		}

		echo '<h1>'.JText::_('MINIFY_SUCCESS').'</h1>';
		echo '<a href="index2.php?option='.$mainframe->get('component').'">'.JText::_('MINIFY_CLICK_HERE_CONTINUE').'</a>';
	}

	function unpatchJDocumentRendererHead() {
		global $mainframe;

		$patchFile = M4J_JOOMLA_HEAD_RENDERER;
		$contents = M4JHelper::getContentOfFile($patchFile, null);
		if (ereg('com_minify', $contents)) {
			echo '<h1>'.JText::_('MINIFY_ALREADY_PATCHED').'</h1>';
			echo '<a href="index2.php?option='.$mainframe->get('component').'">'.JText::_('MINIFY_CLICK_HERE_CONTINUE').'</a>';
			return;
		}

		//Comment some lines that generate Javascript in renderer
		$patchText = '// Generate script file links
		foreach ($document->_scripts as $strSrc => $strType) {\n
			$strHtml .= $tab.\'<script type="\'.$strType.\'" src=\"\'.$strSrc.\'"></script>\'.$lnEnd;\n
		}';
		$contents = str_replace($patchText,'/*'.$patchText."*/", $contents);





		if ($fp = fopen($patchFile, 'wb')) {
			fwrite($fp, $contents);
			fclose($fp);
		}

		echo '<h1>'.JText::_('MINIFY_SUCCESS').'</h1>';
		echo '<a href="index2.php?option='.$mainframe->get('component').'">'.JText::_('MINIFY_CLICK_HERE_CONTINUE').'</a>';
	}

}
?>