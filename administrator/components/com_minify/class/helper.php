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
define('M4J_CACHE_DIRECTORY', JPATH_SITE.DS.'components'.DS.'com_minify'.DS.'cache');


class M4JHelper extends JObject {





	public function cleanCache() {
		$files = M4JHelper::readDirectory ( M4J_CACHE_DIRECTORY, '.*' . 'minify_' . '.*', false, true );
		foreach ( $files as $file ) {
			@unlink ( $file );
		}
	}


	public function readDirectory($path, $filter = '.', $recurse = false, $fullpath = false) {
		$arr = array ( );
		if (! @is_dir ( $path )) {
			return $arr;
		}
		$handle = opendir ( $path );

		while ( $file = readdir ( $handle ) ) {
			$dir = M4JHelper::getPath ( $path . '/' . $file, false );
			$isDir = is_dir ( $dir );
			if (($file != ".") && ($file != "..")) {
				if (preg_match ( "/$filter/", $file )) {
					if ($fullpath) {
						$arr [] = trim ( M4JHelper::getPath ( $path . '/' . $file, false ) );
					} else {
						$arr [] = trim ( $file );
					}
				}
				if ($recurse && $isDir) {
					$arr2 = $this->readDirectory ( $dir, $filter, $recurse, $fullpath );
					$arr = array_merge ( $arr, $arr2 );
				}
			}
		}
		closedir ( $handle );

		//sort array
		asort ( $arr );
		return $arr;
	}

	private function getPath($path, $withTrailingSlash = true) {
		$retval = "";

		$isWin = (substr ( PHP_OS, 0, 3 ) == 'WIN');

		if ($isWin) {
			$retval = str_replace ( '/', '\\', $path );
			if ($withTrailingSlash) {
				if (substr ( $retval, - 1 ) != '\\') {
					$retval .= '\\';
				}
			}

			// Check if UNC path
			$unc = substr ( $retval, 0, 2 ) == '\\\\' ? 1 : 0;

			// Remove double \\
			$retval = str_replace ( '\\\\', '\\', $retval );

			// If UNC path, we have to add one \ in front or everything breaks!
			if ($unc == 1) {
				$retval = '\\' . $retval;
			}
		} else {
			$retval = str_replace ( '\\', '/', $path );
			if ($withTrailingSlash) {
				if (substr ( $retval, - 1 ) != '/') {
					$retval .= '/';
				}
			}
			// Check if UNC path
			$unc = substr ( $retval, 0, 2 ) == '//' ? 1 : 0;
			$retval = str_replace ( '//', '/', $retval );

			if ($unc == 1) {
				$retval = '/' . $retval;
			}
		}

		return $retval;
	}


	function getContentOfFile($file, $option) {
		//change all single backslashes to double backslashes, because of eventual windows path
		//str_replace('\\','\\\\', $file);
		//$file = stripslashes($file);
		$f = fopen($file, "r");
		$content = fread($f, filesize($file));
		return $content;
	}

	function showFile($file, $option) {
		//change all single backslashes to double backslashes, because of eventual windows path
		//str_replace('\\','\\\\', $file);
		//$file = stripslashes($file);
		$f = fopen($file, "r");
		$content = fread($f, filesize($file));
		$content = htmlspecialchars($content);
		?>
<form action="index2.php?" method="post" name="adminForm"
	class="adminForm" id="adminForm">

<table cellpadding="4" cellspacing="0" border="0" width="100%"
	class="adminform">
	<tr>
		<th colspan="4">Path: <?php echo $file; ?></th>
	</tr>
	<tr>
		<td><textarea cols="180" rows="20" name="filecontent" id="filecontent"><?php echo $content; ?></textarea>
		</td>
	</tr>
	<tr>
		<td class="error">Please note: The file must be writable to save your
		changes.</td>
	</tr>
</table>
		<?php echo JHTML::_( 'form.token' ); ?> <input type="hidden"
	name="file" value="<?php echo $file; ?>" /> <input type="hidden"
	name="option" value="<?php echo $option; ?>"> <input type="hidden"
	name="task" value=""> <input type="hidden" name="boxchecked" value="0">

</form>
		<?php

	}

	/**
	 * maybe joomla 1.5 has an editor for plugins?
	 * @param unknown_type $option
	 */
	function showLanguage($option) {
		$lang		=& JFactory::getLanguage();
		$langTag = $lang->getTag();

		$file = JPATH_SITE.DS.'administrator'.DS.'language'.DS.$langTag.DS.$langTag.'.com_minify.ini';

		//fallback to english
		if (!file_exists($file)) {
			$file = JPATH_SITE.DS.'administrator'.DS.'language'.DS.'en-GB'.DS.'en-GB.com_minify.ini';
		}


		@ chmod($file, 0766);
		$permission = is_writable($file);
		if (!$permission) {
			echo "<center><h1><font color=red>Warning...</FONT></h1><BR>";
			echo "<B>".JText::_('SECURITY_IMAGES_CHMOD_766')."</B></center><BR />";
		}

		M4JHelper::showFile($file, $option);
	}

	/**
	 *
	 * @param unknown_type $file
	 * @param unknown_type $filecontent
	 * @param unknown_type $option
	 */
	function saveFile($file, $filecontent, $option) {
		global $mainframe;

		@ chmod($file, 0766);
		$permission = is_writable($file);
		if (!$permission) {
			$mainframe->redirect("index2.php?option=$option&task=settings", JText::_('SECURITY_IMAGES_CHMOD_766'));
			break;
		}

		if ($fp = fopen($file, "w")) {
			fputs($fp, stripslashes($filecontent));
			fclose($fp);
			$mainframe->redirect("index2.php?option=$option&task=settings", JText::_('SECURITY_IMAGES_Language_Saved_in').$file);
		}
	}


	function saveGroupFile($file, $filecontent, $option) {
		global $mainframe;

		@ chmod($file, 0766);
		$permission = is_writable($file);
		if (!$permission) {
			$mainframe->redirect("index2.php?option=$option&task=settings", JText::_('SECURITY_IMAGES_CHMOD_766'));
			break;
		}

		if ($fp = fopen($file, "w")) {

			$filecontent = "<?php\n
// no direct access
defined('_MINIFY_EXEC') or die('Restricted access');".$filecontent."\n ?>";


			fputs($fp, stripslashes($filecontent));
			fclose($fp);
			$mainframe->redirect("index2.php?option=$option&task=settings", JText::_('SECURITY_IMAGES_Language_Saved_in').$file);
		}
	}


}
?>