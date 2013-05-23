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

class M4JSystemChecker extends JObject {

	/**
	 * use views as soon as I know how ;-)
	 * @return unknown_type
	 */
	public function checkSystem() {
		$total = M4JSystemChecker::getCacheSize('minify_[a-z0-9]*');
		$deflate = M4JSystemChecker::getCacheSize('minify_[a-z0-9]*.zd');
		$gzip = M4JSystemChecker::getCacheSize('minify_[a-z0-9]*.zg');
		$noncompress = $total - $deflate - $gzip;
		$cacheEntries = sizeof(M4JHelper::readDirectory ( M4J_CACHE_DIRECTORY, 'minify_[a-z0-9]*', false, true ));

		$cacheWritable = is_writable(M4J_CACHE_DIRECTORY) ? JText::_('MINIFY_YES') : JText::_('MINIFY_NO');
		echo "<table align='center' border='0'>";
		echo "<tr><td><b>".JText::_('MINIFY_IS_CACHE_WRITABLE').$cacheWritable."</b></td><td></td></tr>";
		echo "<tr><td><b>".JText::_('MINIFY_CACHE_SIZE').$total.JText::_('MINIFY_BYTES_IN').$cacheEntries.JText::_('MINIFY_FILES')."</b></td><td></td></tr>";

		if ($deflate + $gzip != 0) {
			$ratio = round($total / ($deflate + $gzip), 2);
		}
		else {
			$ratio = 0;
		}
		echo "<tr><td><b>".JText::_('MINIFY_BANDWIDTH_WIN').$ratio." </b></td><td></td></tr>";
		
		echo "<tr><td>";
		if ($total != 0) {
		echo "<img alt=\"".JText::_('MINIFY_CHART_REMARK')."\" src=\"http://chart.apis.google.com/chart?cht=p3&chd=t:$noncompress,$deflate,$gzip&chs=500x200&chl=normal ($noncompress)|deflate ($deflate)|gzip ($gzip)\" />";
		}
		else {
			echo JText::_('MINIFY_CACHE_EMPTY');
		}
		echo "</td><td></td></tr>";
		
		
		
		echo "</table>";
	}

	/**
	 *
	 * @param $regex
	 * @return unknown_type
	 */
	public function getCacheSize($regex) {
		//Number of files
		$files = M4JHelper::readDirectory ( M4J_CACHE_DIRECTORY, $regex, false, true );
		$size = 0;
		foreach ( $files as $file ) {
			$size = $size + filesize($file);
		}
		return $size;
	}


}