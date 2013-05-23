<?php
// no direct access
defined('_MINIFY_EXEC') or die( 'Restricted access' );

$joomla_liveurl = "http://www.ronildo.com.br/blog";
$min_cacheFileLocking = "1";
$min_enableBuilder = "1";
$min_allowDebugFlag = "0";
$min_serveOptions['maxAge'] = "1800";
$min_serveOptionsAllowDir = "0";
$min_serveOptionsAllowDirListBackup = array();
if ($min_serveOptionsAllowDir) {
$min_serveOptions['minApp']['allowDirs'] = array();
}
$min_serveOptions['minApp']['groupsOnly'] = "1";
$min_serveOptions['minApp']['maxFiles'] = "10";
$min_uploaderHoursBehind = "0";
$minify4joomlaversion = "1.0.0";
$minifyVersion = "2.1.1";
?>