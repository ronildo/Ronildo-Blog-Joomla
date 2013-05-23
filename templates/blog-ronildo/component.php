<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
<style type="text/css">
div#comment,
div.moreInfoWrapper
{display:none;}

/** Tela de enviar para um amigo **/
body{font: normal 12px Arial; color: #333;}
form input{
	background		: #EFEFEF;
	border			: 1px solid #ccc;
	color			: #333;
	font-size		: 14px;
	height			: 22px !important;
	height			: 25px;
	padding			: 0 0 0 2px;
}

button
{
	background: url(<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/bg_button_span.gif) repeat-x;
	border: 1px solid #AAA;
	color: #333;
	float: left;
	height: 24px;
	line-height: 24px;
	padding: 0 15px 2px 15px;
	
	-moz-border-radius:10px; /* Firefox, etc */
	-khtml-border-radius:10px; /* Konqueror, etc */
	-webkit-border-radius:10px; /* Safari, Google Chrome, etc */
	-opera-border-radius:10px; /* Opera */
}
</style>
</head>
<body class="contentpane">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>
