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
 * This program contains also minify
 *
 * Copyright (c) 2008 Ryan Grove <ryan@wonko.com>
 * Copyright (c) 2008 Steve Clay <steve@mrclay.org>
 * All rights reserved.

 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *   * Redistributions of source code must retain the above copyright notice,
 *     this list of conditions and the following disclaimer.
 *   * Redistributions in binary form must reproduce the above copyright notice,
 *     this list of conditions and the following disclaimer in the documentation
 *     and/or other materials provided with the distribution.
 *   * Neither the name of this project nor the names of its contributors may be
 *     used to endorse or promote products derived from this software without
 *     specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 *
 * @package		Minify4Joomla
 * @copyright	Copyright (C) 2009  Cédric Walter. All rights reserved.
 *******************************************************************/

/**
 * Utility functions for generating group URIs in HTML files
 *
 * Before including this file, /min/lib must be in your include_path.
 * 
 * @package Minify
 */

// no direct access
defined('_MINIFY_EXEC') or die('Restricted access');

require_once 'Minify/Build.php';


/**
 * Get a timestamped URI to a minified resource using the default Minify install
 *
 * <code>
 * <link rel="stylesheet" type="text/css" href="<?php echo Minify_groupUri('css'); ?>" />
 * <script type="text/javascript" src="<?php echo Minify_groupUri('js'); ?>"></script>
 * </code>
 *
 * If you do not want ampersands as HTML entities, set Minify_Build::$ampersand = "&" 
 * before using this function.
 *
 * @param string $group a key from groupsConfig.php
 * @param boolean $forceAmpersand (default false) Set to true if the RewriteRule
 * directives in .htaccess are functional. This will remove the "?" from URIs, making them
 * more cacheable by proxies.
 * @return string
 */ 
function Minify_groupUri($group, $forceAmpersand = false)
{
    $path = $forceAmpersand
        ? "/g={$group}"
        : "/?g={$group}";
    return _Minify_getBuild($group)->uri(
        '/' . basename(dirname(__FILE__)) . $path
        ,$forceAmpersand
    );
}


/**
 * Get the last modification time of the source js/css files used by Minify to
 * build the page.
 * 
 * If you're caching the output of Minify_groupUri(), you'll want to rebuild 
 * the cache if it's older than this timestamp.
 * 
 * <code>
 * // simplistic HTML cache system
 * $file = '/path/to/cache/file';
 * if (! file_exists($file) || filemtime($file) < Minify_groupsMtime(array('js', 'css'))) {
 *     // (re)build cache
 *     $page = buildPage(); // this calls Minify_groupUri() for js and css
 *     file_put_contents($file, $page);
 *     echo $page;
 *     exit();
 * }
 * readfile($file);
 * </code>
 *
 * @param array $groups an array of keys from groupsConfig.php
 * @return int Unix timestamp of the latest modification
 */ 
function Minify_groupsMtime($groups)
{
    $max = 0;
    foreach ((array)$groups as $group) {
        $max = max($max, _Minify_getBuild($group)->lastModified);
    }
    return $max;
}

/**
 * @param string $group a key from groupsConfig.php
 * @return Minify_Build
 * @private
 */
function _Minify_getBuild($group)
{
    static $builds = array();
    static $gc = false;
    if (false === $gc) {
        $gc = (require dirname(__FILE__) . '/groupsConfig.php');
    }
    if (! isset($builds[$group])) {
        $builds[$group] = new Minify_Build($gc[$group]);
    }
    return $builds[$group];
}
