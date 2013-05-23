<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$menu = & JSite::getMenu();
if ($menu->getActive() == $menu->getDefault())
	$home = "home";


?>
