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
 * Copyright (C) 2020       Charlene Benke          <charlie@patas-monkey.com>
 * Copyright (C) 2021       Frédéric France         <frederic.france@netlogic.fr>
 * Copyright (C) 2021       Alexandre Spangaro      <aspangaro@open-dsi.fr>
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
/**
 * Return the real char for a numeric entities.
 * WARNING: This function is required by testSqlAndScriptInject() and the GETPOST 'restricthtml'. Regex calling must be similar.
 *
 * @param	string		$matches			String of numeric entity
 * @return	string							New value
 */
function realCharForNumericEntities($matches)
{
}
/**
 * Security: WAF layer for SQL Injection and XSS Injection (scripts) protection (Filters on GET, POST, PHP_SELF).
 * Warning: Such a protection can't be enough. It is not reliable as it will always be possible to bypass this. Good protection can
 * only be guaranted by escaping data during output.
 *
 * @param		string		$val		Brut value found into $_GET, $_POST or PHP_SELF
 * @param		string		$type		0=POST, 1=GET, 2=PHP_SELF, 3=GET without sql reserved keywords (the less tolerant test)
 * @return		int						>0 if there is an injection, 0 if none
 */
function testSqlAndScriptInject($val, $type)
{
}
/**
 * Return true if security check on parameters are OK, false otherwise.
 *
 * @param		string			$var		Variable name
 * @param		string			$type		1=GET, 0=POST, 2=PHP_SELF
 * @return		boolean|null				true if there is no injection. Stop code if injection found.
 */
function analyseVarsForSqlAndScriptsInjection(&$var, $type)
{
}
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
 * @param 	string 			$head				Optionnal head lines
 * @param 	string 			$title				HTML title
 * @param	string			$help_url			Url links to help page
 * 		                            			Syntax is: For a wiki page: EN:EnglishPage|FR:FrenchPage|ES:SpanishPage
 *                                  			For other external page: http://server/url
 * @param	string			$target				Target to use on links
 * @param 	int    			$disablejs			More content into html header
 * @param 	int    			$disablehead		More content into html header
 * @param 	array|string  	$arrayofjs			Array of complementary js files
 * @param 	array|string  	$arrayofcss			Array of complementary css files
 * @param	string			$morequerystring	Query string to add to the link "print" to get same parameters (use only if autodetect fails)
 * @param   string  		$morecssonbody      More CSS on body tag. For example 'classforhorizontalscrolloftabs'.
 * @param	string			$replacemainareaby	Replace call to main_area() by a print of this string
 * @param	int				$disablenofollow	Disable the "nofollow" on meta robot header
 * @param	int				$disablenoindex		Disable the "noindex" on meta robot header
 * @return	void
 */
function llxHeader($head = '', $title = '', $help_url = '', $target = '', $disablejs = 0, $disablehead = 0, $arrayofjs = '', $arrayofcss = '', $morequerystring = '', $morecssonbody = '', $replacemainareaby = '', $disablenofollow = 0, $disablenoindex = 0)
{
}
/**
 *  Show HTTP header. Called by top_htmlhead().
 *
 *  @param  string  $contenttype    Content type. For example, 'text/html'
 *  @param	int		$forcenocache	Force disabling of cache for the page
 *  @return	void
 */
function top_httphead($contenttype = 'text/html', $forcenocache = 0)
{
}
/**
 * Ouput html header of a page. It calls also top_httphead()
 * This code is also duplicated into security2.lib.php::dol_loginfunction
 *
 * @param 	string 	$head			 Optionnal head lines
 * @param 	string 	$title			 HTML title
 * @param 	int    	$disablejs		 Disable js output
 * @param 	int    	$disablehead	 Disable head output
 * @param 	array  	$arrayofjs		 Array of complementary js files
 * @param 	array  	$arrayofcss		 Array of complementary css files
 * @param 	int    	$disableforlogin Do not load heavy js and css for login pages
 * @param   int     $disablenofollow Disable nofollow tag for meta robots
 * @param   int     $disablenoindex  Disable noindex tag for meta robots
 * @return	void
 */
function top_htmlhead($head, $title = '', $disablejs = 0, $disablehead = 0, $arrayofjs = '', $arrayofcss = '', $disableforlogin = 0, $disablenofollow = 0, $disablenoindex = 0)
{
}
/**
 *  Show an HTML header + a BODY + The top menu bar
 *
 *  @param      string	$head    			Lines in the HEAD
 *  @param      string	$title   			Title of web page
 *  @param      string	$target  			Target to use in menu links (Example: '' or '_top')
 *	@param		int		$disablejs			Do not output links to js (Ex: qd fonction utilisee par sous formulaire Ajax)
 *	@param		int		$disablehead		Do not output head section
 *	@param		array	$arrayofjs			Array of js files to add in header
 *	@param		array	$arrayofcss			Array of css files to add in header
 *  @param		string	$morequerystring	Query string to add to the link "print" to get same parameters (use only if autodetect fails)
 *  @param      string	$helppagename    	Name of wiki page for help ('' by default).
 * 				     		                Syntax is: For a wiki page: EN:EnglishPage|FR:FrenchPage|ES:SpanishPage
 * 						                    For other external page: http://server/url
 *  @return		void
 */
function top_menu($head, $title = '', $target = '', $disablejs = 0, $disablehead = 0, $arrayofjs = '', $arrayofcss = '', $morequerystring = '', $helppagename = '')
{
}
/**
 * Build the tooltip on user login
 *
 * @param	int			$hideloginname		Hide login name. Show only the image.
 * @param	string		$urllogout			URL for logout (Will use DOL_URL_ROOT.'/user/logout.php?token=...' if empty)
 * @return  string                  		HTML content
 */
function top_menu_user($hideloginname = 0, $urllogout = '')
{
}
/**
 * Build the tooltip on top menu quick add
 *
 * @return  string                  HTML content
 */
function top_menu_quickadd()
{
}
/**
 * Generate list of quickadd items
 *
 * @return string HTML output
 */
function printDropdownQuickadd()
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
 * Build the tooltip on top menu tsearch
 *
 * @return  string                  HTML content
 */
function top_menu_search()
{
}
/**
 *  Show left menu bar
 *
 *  @param  array	$menu_array_before 	       	Table of menu entries to show before entries of menu handler. This param is deprectaed and must be provided to ''.
 *  @param  string	$helppagename    	       	Name of wiki page for help ('' by default).
 * 				     		                   	Syntax is: For a wiki page: EN:EnglishPage|FR:FrenchPage|ES:SpanishPage
 * 									         	For other external page: http://server/url
 *  @param  string	$notused             		Deprecated. Used in past to add content into left menu. Hooks can be used now.
 *  @param  array	$menu_array_after           Table of menu entries to show after entries of menu handler
 *  @param  int		$leftmenuwithoutmainarea    Must be set to 1. 0 by default for backward compatibility with old modules.
 *  @param  string	$title                      Title of web page
 *  @param  string  $acceptdelayedhtml          1 if caller request to have html delayed content not returned but saved into global $delayedhtmlcontent (so caller can show it at end of page to avoid flash FOUC effect)
 *  @return	void
 */
function left_menu($menu_array_before, $helppagename = '', $notused = '', $menu_array_after = '', $leftmenuwithoutmainarea = 0, $title = '', $acceptdelayedhtml = 0)
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
 *  @param	string		$helppagename		Page name ('EN:xxx,ES:eee,FR:fff...' or 'http://localpage')
 *  @param  Translate	$langs				Language
 *  @return	array		Array of help urls
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
 *  @param	string	$showtitlebefore	Show title before input text instead of into placeholder. This can be set when output is dedicated for text browsers.
 *  @param	string	$autofocus			Set autofocus on field
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
 * @param	string	$comment    				A text to add as HTML comment into HTML generated page
 * @param	string	$zone						'private' (for private pages) or 'public' (for public pages)
 * @param	int		$disabledoutputofmessages	Clear all messages stored into session without diplaying them
 * @return	void
 */
function llxFooter($comment = '', $zone = 'private', $disabledoutputofmessages = 0)
{
}