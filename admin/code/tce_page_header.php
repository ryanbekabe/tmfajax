<?php
//============================================================+
// File name   : tce_page_header.php
// Begin       : 2001-09-18
// Last Update : 2010-05-10
//
// Description : output default XHTML page header
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//
// License:
//    Copyright (C) 2004-2010  Nicola Asuni - Tecnick.com LTD
//    See LICENSE.TXT file for more information.
//============================================================+

/**
 * @file
 * Outputs default XHTML page header.
 * @package com.tecnick.tcexam.admin
 * @author Nicola Asuni
 * @since 2001-09-18
 */

/**
 */
if(f_sc_name('tmf_show_offline_sheet.php')){
	require_once('tce_xhtml_header_offline.php');
}else{
	require_once('tce_xhtml_header.php');
}
// display header (image logo + timer)
echo '<div class="header">'.K_NEWLINE;
echo '<div class="left"></div>'.K_NEWLINE;
echo '<div class="right">'.K_NEWLINE;
if(!f_sc_name('tmf_show_offline_sheet.php')){
	echo '<a name="timersection" id="timersection"></a>'.K_NEWLINE;
	include('../../shared/code/tce_page_timer.php');
}
echo '</div>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;



// display menu
echo '<div id="menuBody">'.K_NEWLINE;
echo '<div id="scrollayer" class="scrollmenu ';
if(f_sc_name('tmf_show_offline_sheet.php')){
	echo 'hidden';
}
echo ' ">'.K_NEWLINE;
if($_SESSION['session_user_level']>0){
// echo '<p id="appDesc">'.K_APP_DESC.'</p>'.K_NEWLINE;	
echo '<div style="padding-bottom:15px;background:#212121">';
echo '<div id="menuContent" class="d-flex">'.K_NEWLINE;
echo '<p id="logoIMG"><img width="55px" height="55px" src="'.K_PATH_HOST.K_PATH_TCEXAM.'cache/logo/'.K_INSTITUTION_LOGO.'" /></p>'.K_NEWLINE;
echo '<p id="insName">'.K_INSTITUTION_NAME.'</p>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;
echo '<div class="ft-sm ta-center ml-15 mr-15 d-flex" style="justify-content:space-between"><span style="background:#323232;cursor:pointer" class="p-10 brad-5" onclick="location.replace(\'tce_edit_user.php?user_id='.$_SESSION['session_user_id'].'\')"><i class="fas fa-user"></i> <span>'.urldecode($_SESSION['session_user_firstname']).'</span></span><span class="p-10 brad-5" style="background:#d32f2f;cursor:pointer" onclick="if(confirm(\'logout?\')){location.replace(\'tce_logout.php\')}"><i class="fas fa-sign-out-alt"></i></span></div>';
}
echo '</div>';

// CSS changes for old browsers
echo '<!--[if lte IE 7]>'.K_NEWLINE;
echo '<style type="text/css">'.K_NEWLINE;
echo 'ul.menu li {text-align:left;behavior:url("../../shared/jscripts/IEmen.htc");}'.K_NEWLINE;
echo 'ul.menu ul {background-color:#003399;margin:0;padding:0;display:none;position:absolute;top:20px;left:0px;}'.K_NEWLINE;
echo 'ul.menu ul li {width:200px;text-align:left;margin:0;}'.K_NEWLINE;
echo 'ul.menu ul ul {display:none;position:absolute;top:0px;left:190px;}'.K_NEWLINE;
echo '</style>'.K_NEWLINE;
echo '<![endif]-->'.K_NEWLINE;
require_once(dirname(__FILE__).'/tce_page_menu.php');
echo '</div>'.K_NEWLINE;

echo '<div class="body">'.K_NEWLINE;
if(isset($thispage_title_icon)){
	$page_icon = $thispage_title_icon;
}else{
	$page_icon = '<i class="fas fa-home"></i> ';
}

echo '<div class="content">'.K_NEWLINE;
echo '<a name="topofdoc" id="topofdoc"></a>'.K_NEWLINE;
if(f_sc_name('tmf_show_offline_sheet.php')){
	echo '<div>'.K_NEWLINE;
	echo '<h1 class="pageTitle">
	<span id="menuShow" class="spmenubars spicoheader"><i class="fas fa-bars"></i></span>
	<span id="menuHide" class="spmenubars spicoheader"><i class="fas fa-times"></i></span>
	<span class="spicoheader"><i class="fas fa-school"></i></span><span class="splblheader">'.K_INSTITUTION_NAME.'</span></h1>'.K_NEWLINE;
	echo '<h1 class="pageTitle pageTitleDesc"><span class="splblheader">'.htmlspecialchars($thispage_title, ENT_NOQUOTES, $l['a_meta_charset']).'</span></h1>'.K_NEWLINE;
}else{
	echo '<div class="h-title d-iflex">'.K_NEWLINE;
	echo '<span id="mmCloseBtn"><i class="fas fa-bars"></i></span><h1>'.$page_icon.htmlspecialchars($thispage_title, ENT_NOQUOTES, $l['a_meta_charset']).'</h1>'.K_NEWLINE;
}
echo '</div>'.K_NEWLINE;

//============================================================+
// END OF FILE
//============================================================+
