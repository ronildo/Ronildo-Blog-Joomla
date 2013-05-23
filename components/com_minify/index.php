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

// Set flag that this is a parent file
define( '_MINIFY_EXEC', 1 );

define('MINIFY_MIN_DIR', dirname(__FILE__));

//I do not want to have these settings in cache
$min_cachePath = MINIFY_MIN_DIR.DIRECTORY_SEPARATOR.'cache';
$min_libPath = MINIFY_MIN_DIR .DIRECTORY_SEPARATOR.'lib';
require MINIFY_MIN_DIR.DIRECTORY_SEPARATOR.'config.php';

// setup include path
set_include_path($min_libPath . DIRECTORY_SEPARATOR . get_include_path());

ini_set('zlib.output_compression', 0);

require 'Minify.php';

Minify::$uploaderHoursBehind = $min_uploaderHoursBehind;
Minify::setCache(
    isset($min_cachePath) ? $min_cachePath : null
    ,$min_cacheFileLocking
);

if (0 === stripos(PHP_OS, 'win')) {
    Minify::setDocRoot(); // we may be on IIS
}
if ($min_allowDebugFlag && isset($_GET['debug'])) {
    $min_serveOptions['debug'] = true;
}
if (isset($_GET['g'])) {
    // well need groups config
    $min_serveOptions['minApp']['groups'] = (
    require MINIFY_MIN_DIR . DIRECTORY_SEPARATOR.'groupsConfig.php');
    // check for URI versioning
    if (preg_match('/&\\d/', $_SERVER['QUERY_STRING'])) {
        $min_serveOptions['maxAge'] = 31536000;
    }
}

if (isset($_GET['f']) || isset($_GET['g'])) {
    // serve!   
    Minify::serve('MinApp', $min_serveOptions);
        
} elseif ($min_enableBuilder) {
    header('Location: builder/');
    exit();
} else {
    header("Location: /");
    exit();
}
