<?php defined('_JEXEC')  or die('Direct Access to this location is not allowed.');

/*
 * Copyright Copyright (C) 2007 Alain Georgette. All rights reserved.
 * Copyright Copyright (C) 2006 Frantisek Hliva. All rights reserved.
 * License http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * !JoomlaComment is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * !JoomlaComment is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA  02110-1301, USA.
 */

require_once(JPATH_SITE."/components/com_comment/joscomment/utils.php");

JOSC_utils::set_JoomlaRelease();

/* global first to verify josctask values AND allow rss execution */
$josctask 	= JOSC_utils::decodeData('josctask');
$component  = JOSC_utils::decodeData('component');
$sectionid  = intval(JOSC_utils::decodeData('joscsectionid'));
switch ($josctask) {
    case 'ajax_insert':
    case 'ajax_quote':
    case 'ajax_modify':
    case 'ajax_edit':
    case 'ajax_getcomments':
    case 'ajax_delete':
    case 'ajax_delete_all':
    case 'ajax_voting_yes':
    case 'ajax_voting_no':
    case 'ajax_reload_captcha':
    case 'ajax_search':
    case 'ajax_insert_search':
		execPlugin($component,$sectionid);
        break;

    case 'rss':
        createFeed();
        break;

    case 'noajax':
		execPlugin($component,$sectionid);
        break;

    default:
        break;
}

function execPlugin($component,$sectionid)
{
	$null=null;
	$comObject = JOSC_utils::ComPluginObject($component, $null, 0, $sectionid);
	JOSC_utils::execJoomlaCommentPlugin($comObject, $null, $null, false);
}

function createFeed()
{
    $null=null;
    $component = JRequest::getCmd('plugin');
    $comObject = JOSC_utils::ComPluginObject($component, $null, 0, '');
    $comObject->createFeed();
}

?>
