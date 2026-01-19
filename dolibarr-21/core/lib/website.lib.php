<?php

/* Copyright (C) 2017 Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 * @see dolStripPhpCode(), checkPHPCode()
 */
function dolKeepOnlyPhpCode($str)
{
}
/**
 * Convert a page content to have correct links (based on DOL_URL_ROOT) into an html content. It replaces also dynamic content with '...php...'
 * Used to output the page on the Preview from backoffice.
 *
 * @param	Website		$website			Web site object
 * @param	string		$content			Content to replace
 * @param	int			$removephppart		0=Replace PHP sections with a PHP badge. 1=Remove completely PHP sections.
 * @param	string		$contenttype		Content type
 * @param	int			$containerid 		Contenair id
 * @return	string							html content
 * @see dolWebsiteOutput() for function used to replace content in a web server context
 */
function dolWebsiteReplacementOfLinks($website, $content, $removephppart = 0, $contenttype = 'html', $containerid = 0)
{
}
/**
 * Converts smiley string into the utf8 sequence.
 * @param	string		$content			Content to replace
 * @return	string							Replacement of all smiley strings with their utf8 code
 * @see dolWebsiteOutput()
 */
function dolReplaceSmileyCodeWithUTF8($content)
{
}
/**
 * Render a string of an HTML content and output it.
 * Used to output the page when viewed from a server (Dolibarr or Apache).
 *
 * @param   string  $content    	Content string
 * @param	string	$contenttype	Content type
 * @param	int		$containerid 	Contenair id
 * @return  void
 * @see	dolWebsiteReplacementOfLinks()  for function used to replace content in the backoffice context.
 */
function dolWebsiteOutput($content, $contenttype = 'html', $containerid = 0)
{
}
/**
 * Increase the website counter of page access.
 *
 * @param   int		$websiteid			ID of website
 * @param	string	$websitepagetype	Type of page ('blogpost', 'page', ...)
 * @param	int		$websitepageid		ID of page
 * @return  int							Return integer <0 if KO, >0 if OK
 */
function dolWebsiteIncrementCounter($websiteid, $websitepagetype, $websitepageid)
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
 * @param 	string		$containerref			Ref of container to redirect to (Example: 'mypage' or 'mypage.php').
 * @param 	string		$containeraliasalt		Ref of alternative aliases to redirect to.
 * @param 	int			$containerid			Id of container.
 * @param	int<0,1>	$permanent				0=Use temporary redirect 302 (default), 1=Use permanent redirect 301
 * @param 	array<string,mixed>	$parameters		Array of parameters to append to the URL.
 * @param	int<0,1>	$parampropagation		0=Do not propagate query parameter in URL when doing the redirect, 1=Keep parameters (default)
 * @return  void
 */
function redirectToContainer($containerref, $containeraliasalt = '', $containerid = 0, $permanent = 0, $parameters = array(), $parampropagation = 1)
{
}
/**
 * Execute content of a php page and report result to be included into another page.
 * It outputs content of file where the html and body part have been removed.
 *
 * @param 	string	$containerref		Path to file to include (must be a page from website root. Example: 'mypage.php' means 'mywebsite/mypage.php')
 * @param 	int		$once				If set to 1, we use include_once.
 * @param	int		$cachedelay			A cache delay in seconds.
 * @param	string	$cachekey			Add a key into the name of the cache so the includeContainer can use different cache content for the same page.
 * @return  void
 */
function includeContainer($containerref, $once = 0, $cachedelay = 0, $cachekey = '')
{
}
/**
 * Return HTML content to add structured data for an article, news or Blog Post. Use the json-ld format.
 * Example:
 * <?php getStructureData('blogpost'); ?>
 * <?php getStructureData('software', array('name'=>'Name', 'os'=>'Windows', 'price'=>10)); ?>
 *
 * @param 	string		$type				'blogpost', 'product', 'software', 'organization', 'qa',  ...
 * @param	array<string,mixed>	$data				Array of data parameters for structured data
 * @return  string							HTML content
 */
function getStructuredData($type, $data = array())
{
}
/**
 * Return HTML content to add as header card for an article, news or Blog Post or home page.
 *
 * @param	?array<string,mixed>	$params	Array of parameters
 * @return  string							HTML content
 */
function getSocialNetworkHeaderCards($params = \null)
{
}
/**
 * Return HTML content to add structured data for an article, news or Blog Post.
 *
 * @param	string	$socialnetworks			'' or list of social networks
 * @return  string							HTML content
 */
function getSocialNetworkSharingLinks($socialnetworks = '')
{
}
/**
 * Return nb of images known into inde files for an object;
 *
 * @param	Object	$object		Object
 * @return  int					HTML img content or '' if no image found
 * @see getImagePublicURLOfObject()
 */
function getNbOfImagePublicURLOfObject($object)
{
}
/**
 * Return the public image URL of an object.
 * For example, you can get the public image URL of a product (image that is shared).
 *
 * @param	Object	$object			Object
 * @param	int		$no				Numero of image (if there is several images. 1st one by default)
 * @param   string  $extName        Extension to differentiate thumb file name ('', '_small', '_mini')
 * @param	int		$cover			1=Sort with cover then position, -1=Filter on cover last then position, 0=Exclude cover and filter on position first
 * @return  string					HTML img content or '' if no image found
 * @see getNbOfImagePublicURLOfObject(), getPublicFilesOfObject(), getImageFromHtmlContent()
 */
function getImagePublicURLOfObject($object, $no = 1, $extName = '', $cover = 1)
{
}
/**
 * Return array with list of all public files of a given object.
 *
 * @param	Object	$object			Object
 * @return array<array{filename:string,position:int,url:string}>	List of public files of object
 * @see getImagePublicURLOfObject()
 */
function getPublicFilesOfObject($object)
{
}
/**
 * Return list of containers object that match a criteria.
 * WARNING: This function can be used by websites.
 *
 * @param 	string		$type				Type of container to search into (Example: '', 'page', 'blogpost', 'page,blogpost', ...)
 * @param 	string		$algo				Algorithm used for search (Example: 'meta' is searching into meta information like title and description, 'content', 'sitefiles', or any combination 'meta,content,sitefiles')
 * @param	string		$searchstring		Search string
 * @param	int			$max				Max number of answers
 * @param	string		$sortfield			Sort Fields
 * @param	'DESC'|'ASC'	$sortorder			Sort order ('DESC' or 'ASC')
 * @param	string		$langcode			Language code ('' or 'en', 'fr', 'es', ...)
 * @param	array<string,mixed>	$otherfilters		Other filters
 * @param	int<-1,1>	$status				0 or 1, or -1 for both
 * @return  array{list?:WebsitePage[],code?:string,message?:string}	Array with results of search
 */
function getPagesFromSearchCriterias($type, $algo, $searchstring, $max = 25, $sortfield = 'date_creation', $sortorder = 'DESC', $langcode = '', $otherfilters = [], $status = 1)
{
}
/**
 * Return the URL of an image found into a HTML content.
 * To get image from an external URL to download first, see getAllImages()
 *
 * @param	string		$htmlContent	HTML content
 * @param	int			$imageNumber	The position of image. 1 by default = first image found
 * @return	string						URL of image or '' if not foud
 * @see getImagePublicURLOfObject()
 */
function getImageFromHtmlContent($htmlContent, $imageNumber = 1)
{
}
/**
 * Download all images found into an external URL.
 * It using a text regex parsing solution, not a DOM analysis.
 * If $modifylinks is set, links to images will be replace with a link to viewimage wrapper.
 * To extract an URL from a HTML text content, see instead getImageFromHtmlContent().
 *
 * @param 	Website	 	$object			Object website
 * @param 	WebsitePage	$objectpage		Object website page
 * @param 	string		$urltograb		URL to grab (example: https://www.nltechno.com/ or s://www.nltechno.com/dir1/ or https://www.nltechno.com/dir1/mapage1)
 * @param 	string		$tmp			Content to parse
 * @param 	string		$action			Var $action
 * @param	int<0,1>	$modifylinks	0=Do not modify content, 1=Replace links with a link to viewimage
 * @param	int<0,1>	$grabimages		0=Do not grab images, 1=Grab images
 * @param	'root'|'subpage'	$grabimagesinto	'root' or 'subpage'
 * @return	void
 */
function getAllImages($object, $objectpage, $urltograb, &$tmp, &$action, $modifylinks = 0, $grabimages = 1, $grabimagesinto = 'subpage')
{
}
/**
 * Retrieves the details of a news post by its ID.
 *
 * @param string $postId  The ID of the news post to retrieve.
 * @return array<string,mixed>|int<-1,-1>   Return array if OK, -1 if KO
 */
function getNewsDetailsById($postId)
{
}