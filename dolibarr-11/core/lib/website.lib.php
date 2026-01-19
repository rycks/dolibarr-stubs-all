<?php

/* Copyright (C) 2017 Laurent Destailleur	<eldy@users.sourceforge.net>
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
 *      \file       htdocs/core/lib/website.lib.php
 *      \ingroup    website
 *      \brief      Library for website module
 */
/**
 * Remove PHP code part from a string.
 *
 * @param 	string	$str			String to clean
 * @param	string	$replacewith	String to use as replacement
 * @return 	string					Result string without php code
 * @see dolKeepOnlyPhpCode()
 */
function dolStripPhpCode($str, $replacewith = '')
{
}
/**
 * Keep only PHP code part from a HTML string page.
 *
 * @param 	string	$str			String to clean
 * @return 	string					Result string with php code only
 * @see dolStripPhpCode()
 */
function dolKeepOnlyPhpCode($str)
{
}
/**
 * Convert a page content to have correct links (based on DOL_URL_ROOT) into an html content. It replaces also dynamic content with '...php...'
 * Used to ouput the page on the Preview from backoffice.
 *
 * @param	Website		$website			Web site object
 * @param	string		$content			Content to replace
 * @param	int			$removephppart		0=Replace PHP sections with a PHP badge. 1=Remove completely PHP sections.
 * @param	string		$contenttype		Content type
 * @param	int			$containerid 		Contenair id
 * @return	boolean							True if OK
 * @see dolWebsiteOutput() for function used to replace content in a web server context
 */
function dolWebsiteReplacementOfLinks($website, $content, $removephppart = 0, $contenttype = 'html', $containerid = '')
{
}
/**
 * Render a string of an HTML content and output it.
 * Used to ouput the page when viewed from server (Dolibarr or Apache).
 *
 * @param   string  $content    	Content string
 * @param	string	$contenttype	Content type
 * @param	int		$containerid 	Contenair id
 * @return  void
 * @see	dolWebsiteReplacementOfLinks()  for function used to replace content in the backoffice context.
 */
function dolWebsiteOutput($content, $contenttype = 'html', $containerid = '')
{
}
/**
 * Format img tags to introduce viewimage on img src.
 *
 * @param   string  $content    Content string
 * @return  void
 * @see	dolWebsiteOutput()
 */
/*
function dolWebsiteSaveContent($content)
{
	global $db, $langs, $conf, $user;
	global $dolibarr_main_url_root, $dolibarr_main_data_root;

	//dol_syslog("dolWebsiteSaveContent start (mode=".(defined('USEDOLIBARRSERVER')?'USEDOLIBARRSERVER':'').')');

	// Define $urlwithroot
	$urlwithouturlroot=preg_replace('/'.preg_quote(DOL_URL_ROOT,'/').'$/i','',trim($dolibarr_main_url_root));
	$urlwithroot=$urlwithouturlroot.DOL_URL_ROOT;		// This is to use external domain name found into config file
	//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current

	//$content = preg_replace('/(<img.*src=")(?!(http|'.preg_quote(DOL_URL_ROOT,'/').'\/viewimage))/', '\1'.DOL_URL_ROOT.'/viewimage.php?modulepart=medias&file=', $content, -1, $nbrep);

	return $content;
}
*/
/**
 * Make a redirect to another container.
 *
 * @param 	string	$containerref		Ref of container to redirect to (Example: 'mypage' or 'mypage.php').
 * @param 	string	$containeraliasalt	Ref of alternative aliases to redirect to.
 * @param 	int		$containerid		Id of container.
 * @param	int		$permanent			0=Use temporary redirect 302, 1=Use permanent redirect 301
 * @return  void
 */
function redirectToContainer($containerref, $containeraliasalt = '', $containerid = 0, $permanent = 0)
{
}
/**
 * Clean an HTML page to report only content, so we can include it into another page.
 * It outputs content of file sanitized from html and body part.
 *
 * @param 	string	$containerref		Path to file to include (must be a page from website root. Example: 'mypage.php' means 'mywebsite/mypage.php')
 * @return  void
 */
function includeContainer($containerref)
{
}
/**
 * Return HTML content to add structured data for an article, news or Blog Post.
 *
 * @param 	string		$type				'blogpost', 'product', 'software'...
 * @param	array		$data				Array of data parameters for structured data
 * @return  string							HTML content
 */
function getStructuredData($type, $data = array())
{
}
/**
 * Return list of containers object that match a criteria.
 * WARNING: This function can be used by websites.
 *
 * @param 	string		$type				Type of container to search into (Example: 'page')
 * @param 	string		$algo				Algorithm used for search (Example: 'meta' is searching into meta information like title and description, 'content', 'sitefiles', or any combination, ...)
 * @param	string		$searchstring		Search string
 * @param	int			$max				Max number of answers
 * @return  string							HTML content
 */
function getPagesFromSearchCriterias($type, $algo, $searchstring, $max = 25)
{
}
/**
 * Download all images found into page content $tmp.
 * If $modifylinks is set, links to images will be replace with a link to viewimage wrapper.
 *
 * @param 	Website	 	$object			Object website
 * @param 	WebsitePage	$objectpage		Object website page
 * @param 	string		$urltograb		URL to grab (exemple: http://www.nltechno.com/ or http://www.nltechno.com/dir1/ or http://www.nltechno.com/dir1/mapage1)
 * @param 	string		$tmp			Content to parse
 * @param 	string		$action			Var $action
 * @param	string		$modifylinks	0=Do not modify content, 1=Replace links with a link to viewimage
 * @param	int			$grabimages		0=Do not grab images, 1=Grab images
 * @param	string		$grabimagesinto	'root' or 'subpage'
 * @return	void
 */
function getAllImages($object, $objectpage, $urltograb, &$tmp, &$action, $modifylinks = 0, $grabimages = 1, $grabimagesinto = 'subpage')
{
}