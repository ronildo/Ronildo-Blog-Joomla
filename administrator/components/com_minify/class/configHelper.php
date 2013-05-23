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

define('M4J_CONFIG', JPATH_SITE.DS.'components'.DS.'com_minify'.DS.'config.php');
define('M4J_GROUPCONFIG', JPATH_SITE.DS.'components'.DS.'com_minify'.DS.'groupsConfig.php');


class M4JConfigHelper extends JObject {

	function __construct()
	{
		parent::__construct();
	}

	public function getArraySring($b = array()) {
		$i = 0;
		$result = "";
		foreach($b as $key => $value){
			$result .= "'".$value."'";
			if ($i < sizeof($b) -1) {
				$result .= ',';
			}
			$i++;
		}
		return $result;
	}
	
	
	public function showUrlBuilder() {
		$minify4JoomlaBuilderHome = JURI :: root().'/administrator/components/com_minify/builder';
		
		echo "<script> window.open('$minify4JoomlaBuilderHome','mywindow','width=800,height=600')</script>";
		echo  JText::_('MINIFY_GROUP_URL_EDIT');
		echo  "<br /><br />";	
		echo "<h1>".JText::_('MINIFY_FIND_URL_TITLE')."</h1>";
		echo JText::_('MINIFY_FIND_URL_HOWTO');
		echo "<br />";
		echo "<a href=\"javascript:(function(){var%20d=document,uris=[],i=0,o,home=(location+'').split('/').splice(0,3).join('/')+'/';function%20add(uri){return(0===uri.indexOf(home))&&(!/[\?&]/.test(uri))&&uris.push(escape(uri.substr(home.length)));};function%20sheet(ss){if(ss.href&&add(ss.href)&&ss.cssRules){var%20i=0,r;while(r=ss.cssRules[i++])%20r.styleSheet&&sheet(r.styleSheet);}};while(o=d.getElementsByTagName('script')[i++])%20o.src&&!(o.type&&/vbs/i.test(o.type))&&add(o.src);i=0;while(o=d.styleSheets[i++])%20sheet(o);if(uris.length)%20window.open('".$minify4JoomlaBuilderHome."/#'+uris.join(','));else%20alert('No%20js/css%20files%20found%20with%20URLs%20within%20.\n(This%20tool%20is%20limited%20to%20URLs%20with%20the%20same%20domain.)');})();\" >";
		echo JText::_('MINIFY_FIND_URL_BOOKMARKLET_LINK');
		echo "</a>";
	}
	
	
	
	function showConfig($option)
	{
		include(JPATH_SITE.DS.'components'.DS.'com_minify'.DS.'config.php');
		?>
<script language="javascript" type="text/javascript">
	    function submitbutton(pressbutton) {
	      var form = document.adminForm;
	      if (pressbutton == 'cancel') {
	        submitform( pressbutton );
	        return;
	      }
	        submitform( pressbutton );
	    }
	    </script>
<table cellpadding="0" cellspacing="0" border="0" width="600px">
	<tr>
		<td><img
			src=<?php echo JURI :: root()."administrator/components/com_minify/logo/minify4joomla.gif" ?>>
		</td>
		<td><b><?php echo JText::_('MINIFY_ABOUT'); ?></b> <br>
		<br>
		<?php
		echo JText::_('MINIFY_DESCRIPTION');
		$copyright = "<p></br>" . "" . "</br>" . "" . "</br></br></br>" . "<font class='smalldark'><b>" . $minify4joomlaversion . "</b> - Copyright 2009 by Cédric Walter - www.waltercedric.com</font></p>";
		echo $copyright;
		?></td>
	</tr>
</table>
<br />
<form action="index2.php" method="post" name="adminForm"><br />
		<?php
		jimport('joomla.html.pane');
		$jPaneTabs =& JPane::getInstance('sliders');
		echo $jPaneTabs->startPane("Minify4Joomla");
		echo $jPaneTabs->startPanel('Minify4Joomla', "General-Settings");
		?>
<div class="col40">
<fieldset class="adminform">
<table border="0" cellpadding="4" cellspacing="2" class="adminForm">
	<?php if ($min_enableBuilder) {?>
	<tr align="center" valign="middle">
		<td align="left" valign="top" colspan="3"><big><big><span style="color: rgb(255, 0, 0);"><?php echo JText::_('MINIFY_BUILDER_SHOULD_BE_DISABLED') ?></span></big></big></td>
	</tr>
	<?php } ?>
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_JOOMLA_LIVE') ?></strong></td>
		<td align="left" valign="top"><input type="text" size="90"
			name="joomla_liveurl"
			value="<?php echo $joomla_liveurl; ?>"></td>
		<td align="left" valign="top"><?php echo JText::_('MINIFY_JOOMLA_LIVE') ?></td>
	</tr>
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_CACHE') ?></strong></td>
		<td align="left" valign="top"><?php echo JHTML::_('select.booleanlist', 'min_cacheFileLocking', 'class="inputbox"', $min_cacheFileLocking ); ?>
		</td>
		<td align="left" valign="top" width="50%"><?php echo JText::_('MIN_CACHEFILELOCKING') ?></td>
	</tr>
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_URL_BUILDER') ?></strong></td>
		<td align="left" valign="top"><?php echo JHTML::_('select.booleanlist', 'min_enableBuilder', 'class="inputbox"', $min_enableBuilder ); ?>
		</td>
		<td align="left" valign="top" width="50%"><?php echo JText::_('MIN_ENABLEBUILDER') ?></td>
	</tr>
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_DEBUG') ?></strong></td>
		<td align="left" valign="top"><?php echo JHTML::_('select.booleanlist', 'min_allowDebugFlag', 'class="inputbox"', $min_allowDebugFlag ); ?>
		</td>
		<td align="left" valign="top" width="50%"><?php echo JText::_('MIN_ALLOWDEBUGFLAG') ?></td>
	</tr>
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_AGE') ?></strong></td>
		<td align="left" valign="top"><input type="text" size="6"
			name="min_serveOptionsMaxAge"
			value="<?php echo $min_serveOptions['maxAge']; ?>"></td>
		<td align="left" valign="top"><?php echo JText::_('min_serveOptionsMaxAge') ?></td>
	</tr>
	
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_RESTRICT') ?></strong></td>
		<td align="left" valign="top"><?php echo JHTML::_('select.booleanlist', 'min_serveOptionsAllowDir', 'class="inputbox"', $min_serveOptionsAllowDir ); ?>
		</td>
		<td align="left" valign="top" width="50%"><?php echo JText::_('MIN_SERVEOPTIONSALLOWDIRS') ?></td>
	</tr>
	<?php if ($min_serveOptionsAllowDir) { ?>  
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_RESTRICT') ?></strong></td>
		<td align="left" valign="top"><input type="text" size="120"
			name="min_serveOptionsAllowDirList"
			value="<?php echo M4JConfigHelper::getArraySring($min_serveOptions['minApp']['allowDirs']); ?>"></td>
		<td align="left" valign="top"><?php echo JText::_('MIN_SERVEOPTIONSALLOWDIRS_LIST') ?></td>
	</tr>
	<?php } ?>



	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_GROUP_ONLY') ?></strong></td>
		<td align="left" valign="top"><?php echo JHTML::_('select.booleanlist', 'min_serveOptionsGroupsOnly', 'class="inputbox"', $min_serveOptions['minApp']['groupsOnly'] ); ?>
		</td>
		<td align="left" valign="top" width="50%"><?php echo JText::_('MIN_SERVEOPTIONSGROUPSONLY') ?></td>
	</tr>
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_MAX_FILE_INCLUSION') ?></strong></td>
		<td align="left" valign="top"><input type="text" size="3"
			name="min_serveOptionsMaxFiles"
			value="<?php echo $min_serveOptions['minApp']['maxFiles']; ?>"></td>
		<td align="left" valign="top"><?php echo JText::_('MIN_SERVEOPTIONSMAXFILES') ?></td>
	</tr>
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong><?php echo JText::_('MINIFY_WINDOWS_UPLOAD') ?></strong></td>
		<td align="left" valign="top"><input type="text" size="5"
			name="min_uploaderHoursBehind"
			value="<?php echo $min_uploaderHoursBehind; ?>"></td>
		<td align="left" valign="top"><?php echo JText::_('MIN_UPLOADERHOURSBEHIND') ?></td>
	</tr>
	<tr align="center" valign="middle">
		<td align="left" valign="top"><strong>minify</strong></td>
		<td align="left" valign="top">v.<?php echo $minifyVersion; ?></td>
		<td align="left" valign="top"></td>
	</tr>
</table>
<?php echo $jPaneTabs->endPanel(); ?>
<?php echo $jPaneTabs->endPane(); ?>
<?php echo JHTML::_( 'form.token' ); ?> 
 
 <input type="hidden" name="option" value="<?php echo $option; ?>"> 
 <input
	type="hidden" name="task" value=""> 
 <input type="hidden"
	name="boxchecked" value="0"></fieldset>
</div>
</form>
<?php

	}

	/**
	 * 
	 * @param $option
	 * @return unknown_type
	 */
	function saveConfig($option)
	{
		global $mainframe;

		$option = JRequest::getVar( 'option', '');
		$params_request = array (
			'joomla_liveurl',
			'min_cacheFileLocking',
			'min_enableBuilder',
			'min_allowDebugFlag',
            'min_serveOptionsMaxAge',
			'min_serveOptionsGroupsOnly',
			'min_serveOptionsMaxFiles',
			'min_serveOptionsAllowDir',
			'min_serveOptionsAllowDirList',
			'min_uploaderHoursBehind',
			'minify4joomlaversion',
			'minifyVersion'
			);

			foreach ($params_request as $val) {
				$$val = JRequest::getVar( $val, '');
			}
			
			$configfile = JPATH_SITE.DS.DS."components".DS."com_minify".DS."config.php";

			@ chmod($configfile, 0766);
			$permission = is_writable($configfile);

			$mosmsg = JText::_('MINIFY_CONFIG_NOT_WRITABLE');
			if (!$permission)
			{
				$mainframe->redirect("index2.php?option=$option&act=config", $mosmsg);
				break;
			}
			
			$config = "<?php\n";
			$config .= "// no direct access\n";
			$config .= "defined('_MINIFY_EXEC') or die( 'Restricted access' );\n";
			$config .= "\n";
			$config .= "\$joomla_liveurl = \"$joomla_liveurl\";\n";
			$config .= "\$min_cacheFileLocking = \"$min_cacheFileLocking\";\n";
			$config .= "\$min_enableBuilder = \"$min_enableBuilder\";\n";
			$config .= "\$min_allowDebugFlag = \"$min_allowDebugFlag\";\n";
			$config .= "\$min_serveOptions['maxAge'] = \"$min_serveOptionsMaxAge\";\n";
			$config .= "\$min_serveOptionsAllowDir = \"$min_serveOptionsAllowDir\";\n";
			
			$min_serveOptionsAllowDirList = JRequest::getVar( "min_serveOptionsAllowDirList", '', _MOS_ALLOWHTML);
			if (strlen($min_serveOptionsAllowDirList) == 0) {
				$min_serveOptionsAllowDirList = M4JConfigHelper::getArraySring($min_serveOptionsAllowDirListBackup);
			} 
			
			$config .= "\$min_serveOptionsAllowDirListBackup = array(".$min_serveOptionsAllowDirList.");\n";
			
			$config .= "if (\$min_serveOptionsAllowDir) {\n";
			$config .= "\$min_serveOptions['minApp']['allowDirs'] = array(".$min_serveOptionsAllowDirList.");\n";
			$config .= "}\n";
			
			$config .= "\$min_serveOptions['minApp']['groupsOnly'] = \"$min_serveOptionsGroupsOnly\";\n";			
			$config .= "\$min_serveOptions['minApp']['maxFiles'] = \"$min_serveOptionsMaxFiles\";\n";			
			$config .= "\$min_uploaderHoursBehind = \"$min_uploaderHoursBehind\";\n";

			//You are  not allowed to modify this copyright, keep the copyright, add yourself in it
			$config .= "\$minify4joomlaversion = \"1.0.0\";\n";
			$config .= "\$minifyVersion = \"2.1.1\";\n";
			$config .= "?>";

			$mosmsg = "";
			if ($fp = fopen("$configfile", "w"))
			{

				fputs($fp, $config, strlen($config));
				fclose($fp);
				$mosmsg = JText::_('MINIFY_CONFIG_OPEN_CLOSE');;
			}
			$mainframe->redirect("index2.php?option=$option&task=settings", JText::_('MINIFY_CONFIG_SAVED_IN'). $configfile);
	}


}


?>