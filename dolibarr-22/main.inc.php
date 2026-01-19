<?php

/* Copyright (C) 2002-2007  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2003       Xavier Dutoit           <doli@sydesy.com>
 * Copyright (C) 2004-2021  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2004       Sebastien Di Cintio     <sdicintio@ressource-toi.org>
 * Copyright (C) 2004       Benoit Mortier          <benoit.mortier@opensides.be>
 * Copyright (C) 2005-2021  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2011-2014  Philippe Grand          <philippe.grand@atoo-net.com>
 * Copyright (C) 2008       Matteli
 * Copyright (C) 2011-2016  Juanjo Menent           <jmenent@2byte.es>
 * Copyright (C) 2012       Christophe Battarel     <christophe.battarel@altairis.fr>
 * Copyright (C) 2014-2015  Marcos García           <marcosgdf@gmail.com>
 * Copyright (C) 2015       Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2020       Demarest Maxime         <maxime@indelog.fr>
 * Copyright (C) 2020-2024  Charlene Benke          <charlene@patas-monkey.com>
 * Copyright (C) 2021-2024  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2021       Alexandre Spangaro      <aspangaro@open-dsi.fr>
 * Copyright (C) 2023       Joachim Küter      		<git-jk@bloxera.com>
 * Copyright (C) 2023       Eric Seigne      		<eric.seigne@cap-rel.fr>
 * Copyright (C) 2024-2025	MDW							<mdeweerd@users.noreply.github.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *	\file       htdocs/main.inc.php
 *	\ingroup	core
 *	\brief      File that defines environment for Dolibarr GUI pages only (file not required by scripts)
 */
//@ini_set('memory_limit', '128M');	// This may be useless if memory is hard limited by your PHP
// For optional tuning. Enabled if environment variable MAIN_SHOW_TUNING_INFO is defined.
$micro_start_time = 0;
\define('ROWS_1', 1);
\define('ROWS_2', 2);
\define('ROWS_3', 3);
\define('ROWS_4', 4);
\define('ROWS_5', 5);
\define('ROWS_6', 6);
\define('ROWS_7', 7);
\define('ROWS_8', 8);
\define('ROWS_9', 9);
/**
 *	Show HTML header HTML + BODY + Top menu + left menu + DIV
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param 	string 			$head				Optional head lines
 * @param 	string 			$title				HTML title
 * @param	string			$help_url			Url links to help page
 * 		                            			Syntax is: For a wiki page: EN:EnglishPage|FR:FrenchPage|ES:SpanishPage|DE:GermanPage
 *                                  			For other external page: http://server/url
 * @param	string			$target				Target to use on links
 * @param 	int<0,1>		$disablejs			More content into html header
 * @param 	int<0,1>		$disablehead		More content into html header
 * @param 	string[]|string  	$arrayofjs			Array of complementary js files
 * @param 	string[]|string  	$arrayofcss			Array of complementary css files
 * @param	string			$morequerystring	Query string to add to the link "print" to get same parameters (use only if autodetect fails)
 * @param   string  		$morecssonbody      More CSS on body tag. For example 'classforhorizontalscrolloftabs'.
 * @param	string			$replacemainareaby	Replace call to main_area() by a print of this string
 * @param	int				$disablenofollow	Disable the "nofollow" on meta robot header
 * @param	int				$disablenoindex		Disable the "noindex" on meta robot header
 * @return	void
 * @phan-suppress PhanRedefineFunction
 */
function llxHeader($head = '', $title = '', $help_url = '', $target = '', $disablejs = 0, $disablehead = 0, $arrayofjs = '', $arrayofcss = '', $morequerystring = '', $morecssonbody = '', $replacemainareaby = '', $disablenofollow = 0, $disablenoindex = 0)
{
}
/**
 *  Show HTTP header. Called by top_htmlhead().
 *
 *  @param  string  	$contenttype    Content type. For example, 'text/html'
 *  @param	int<0,1>	$forcenocache	Force disabling of cache for the page
 *  @return	void
 */
function top_httphead($contenttype = 'text/html', $forcenocache = 0)
{
}
/**
 * Output html header of a page. It calls also top_httphead()
 * This code is also duplicated into security2.lib.php::dol_loginfunction
 *
 * @param 	string		$head			 Optional head lines
 * @param 	string		$title			 HTML title
 * @param 	int<0,1>   	$disablejs		 Disable js output
 * @param 	int<0,1>   	$disablehead	 Disable head output
 * @param 	string[]	$arrayofjs		 Array of complementary js files
 * @param 	string[]	$arrayofcss		 Array of complementary css files
 * @param 	int<0,1>	$disableforlogin Do not load heavy js and css for login pages
 * @param   int<0,1>	$disablenofollow Disable nofollow tag for meta robots
 * @param   int<0,1>	$disablenoindex  Disable noindex tag for meta robots
 * @return	void
 */
function top_htmlhead($head, $title = '', $disablejs = 0, $disablehead = 0, $arrayofjs = array(), $arrayofcss = array(), $disableforlogin = 0, $disablenofollow = 0, $disablenoindex = 0)
{
}
/**
 *  Show an HTML header + a BODY + The top menu bar
 *
 *  @param      string			$head    			Lines in the HEAD
 *  @param      string			$title   			Title of web page
 *  @param      string			$target  			Target to use in menu links (Example: '' or '_top')
 *	@param		int<0,1>		$disablejs			Do not output links to js (Ex: qd fonction utilisee par sous formulaire Ajax)
 *	@param		int<0,1>		$disablehead		Do not output head section
 *	@param		string[]		$arrayofjs			Array of js files to add in header
 *	@param		string[]		$arrayofcss			Array of css files to add in header
 *  @param		string			$morequerystring	Query string to add to the link "print" to get same parameters (use only if autodetect fails)
 *  @param      string			$helppagename    	Name of wiki page for help ('' by default).
 * 				     		    		            Syntax is: For a wiki page: EN:EnglishPage|FR:FrenchPage|ES:SpanishPage|DE:GermanPage
 * 						                		    For other external page: http://server/url
 *  @return		void
 */
function top_menu($head, $title = '', $target = '', $disablejs = 0, $disablehead = 0, $arrayofjs = array(), $arrayofcss = array(), $morequerystring = '', $helppagename = '')
{
}
/**
 * Build the tooltip on user login
 *
 * @param	int<0,1>	$hideloginname		Hide login name. Show only the image.
 * @param	string		$urllogout			URL for logout (Will use DOL_URL_ROOT.'/user/logout.php?token=...' if empty)
 * @return  string                  		HTML content
 */
function top_menu_user($hideloginname = 0, $urllogout = '')
{
}
/**
 * Build the tooltip on top menu quick add.
 * Called when option MAIN_USE_TOP_MENU_QUICKADD_DROPDOWN is set
 *
 * @return  string                  HTML content
 */
function top_menu_quickadd()
{
}
/**
 * Build the tooltip on top menu quick add.
 * Called when MAIN_USE_TOP_MENU_IMPORT_FILE is set to 1 or to an URL string.
 *
 * @return  string                  HTML content
 */
function top_menu_importfile()
{
}
/**
 * Generate list of quickadd items
 *
 * @param	int		$mode		1=No scroll
 * @return 	string 				HTML output
 */
function printDropdownQuickadd($mode = 0)
{
}
/**
 * Build the tooltip on top menu bookmark
 *
 * @return  string                  HTML content
 */
function top_menu_bookmark()
{
}
/**
 * Build the tooltip on top menu search
 *
 * @return  string                  HTML content
 */
function top_menu_search()
{
}
/**
 *  Show left menu bar
 *
 *  @param  ''			$menu_array_before 	       	Table of menu entries to show before entries of menu handler. This param is deprecated and must be provided to ''.
 *  @param  string		$helppagename    	       	Name of wiki page for help ('' by default).
 *                                                  Syntax is: For a wiki page: EN:EnglishPage|FR:FrenchPage|ES:SpanishPage|DE:GermanPage
 *                                                  For other external page: http://server/url
 *  @param  string		$notused             		Deprecated. Used in past to add content into left menu. Hooks can be used now.
 *  @param  array<array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,showtopmenuinframe:int,level?:int,prefix:string}>	$menu_array_after           Table of menu entries to show after entries of menu handler
 *  @param  int			$leftmenuwithoutmainarea    Must be set to 1. 0 by default for backward compatibility with old modules.
 *  @param  string		$title                      Title of web page
 *  @param  int<0,1>	$acceptdelayedhtml          1 if caller request to have html delayed content not returned but saved into global $delayedhtmlcontent (so caller can show it at end of page to avoid flash FOUC effect)
 *  @return	void
 */
function left_menu($menu_array_before, $helppagename = '', $notused = '', $menu_array_after = array(), $leftmenuwithoutmainarea = 0, $title = '', $acceptdelayedhtml = 0)
{
}
/**
 *  Begin main area
 *
 *  @param	string	$title		Title
 *  @return	void
 */
function main_area($title = '')
{
}
/**
 *  Return helpbaseurl, helppage and mode
 *
 *  @param	string		$helppagename		Page name ('EN:xxx,ES:eee,FR:fff,DE:ddd...' or 'http://localpage')
 *  @param  Translate	$langs				Language
 *  @return	array{helpbaseurl:string,helppage:string,mode:string}	Array of help urls
 */
function getHelpParamFor($helppagename, $langs)
{
}
/**
 *  Show a search area.
 *  Used when the javascript quick search is not used.
 *
 *  @param  string	$urlaction          Url post
 *  @param  string	$urlobject          Url of the link under the search box
 *  @param  string	$title              Title search area
 *  @param  string	$htmlmorecss        Add more css
 *  @param  string	$htmlinputname      Field Name input form
 *  @param	string	$accesskey			Accesskey
 *  @param  string  $prefhtmlinputname  Complement for id to avoid multiple same id in the page
 *  @param	string	$img				Image to use
 *  @param	int		$showtitlebefore	Show title before input text instead of into placeholder. This can be set when output is dedicated for text browsers.
 *  @param	int		$autofocus			Set autofocus on field
 *  @return	string
 */
function printSearchForm($urlaction, $urlobject, $title, $htmlmorecss, $htmlinputname, $accesskey = '', $prefhtmlinputname = '', $img = '', $showtitlebefore = 0, $autofocus = 0)
{
}
/**
 * Show HTML footer
 * Close div /DIV class=fiche + /DIV id-right + /DIV id-container + /BODY + /HTML.
 * If global var $delayedhtmlcontent was filled, we output it just before closing the body.
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param	string	$comment    				A text to add as HTML comment into HTML generated page
 * @param	string	$zone						'private' (for private pages) or 'public' (for public pages)
 * @param	int		$disabledoutputofmessages	Clear all messages stored into session without displaying them
 * @return	void
 * @phan-suppress PhanRedefineFunction
 */
function llxFooter($comment = '', $zone = 'private', $disabledoutputofmessages = 0)
{
}