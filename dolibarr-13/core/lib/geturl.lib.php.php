<?php

/* Copyright (C) 2008-2020	Laurent Destailleur			<eldy@users.sourceforge.net>
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
 * or see https://www.gnu.org/
 */
/**
 *	\file			htdocs/core/lib/geturl.lib.php
 *	\brief			This file contains functions dedicated to get URLs.
 */
/**
 * Function to get a content from an URL (use proxy if proxy defined).
 * Support Dolibarr setup for timeout and proxy.
 * Enhancement of CURL to add an anti SSRF protection.
 *
 * @param	string	  $url 				    URL to call.
 * @param	string    $postorget		    'POST', 'GET', 'HEAD', 'PUT', 'PUTALREADYFORMATED', 'POSTALREADYFORMATED', 'DELETE'
 * @param	string    $param			    Parameters of URL (x=value1&y=value2) or may be a formated content with $postorget='PUTALREADYFORMATED'
 * @param	integer   $followlocation		0=Do not follow, 1=Follow location.
 * @param	string[]  $addheaders			Array of string to add into header. Example: ('Accept: application/xrds+xml', ....)
 * @param	string[]  $allowedschemes		List of schemes that are allowed ('http' + 'https' only by default)
 * @param	int		  $localurl				0=Only external URL are possible, 1=Only local URL, 2=Both external and local URL are allowed.
 * @return	array						    Returns an associative array containing the response from the server array('content'=>response, 'curl_error_no'=>errno, 'curl_error_msg'=>errmsg...)
 */
function getURLContent($url, $postorget = 'GET', $param = '', $followlocation = 1, $addheaders = array(), $allowedschemes = array('http', 'https'), $localurl = 0)
{
}
/**
 * Function get second level domain name.
 * For example: https://www.abc.mydomain.com/dir/page.html return 'mydomain'
 *
 * @param	string	  $url 				    Full URL.
 * @param	int	 	  $mode					0=return 'mydomain', 1=return 'mydomain.com', 2=return 'abc.mydomain.com'
 * @return	string						    Returns domaine name
 */
function getDomainFromURL($url, $mode = 0)
{
}
/**
 * Function root url from a long url
 * For example: https://www.abc.mydomain.com/dir/page.html return 'https://www.abc.mydomain.com'
 * For example: http://www.abc.mydomain.com/ return 'https://www.abc.mydomain.com'
 *
 * @param	string	  $url 				    Full URL.
 * @return	string						    Returns root url
 */
function getRootURLFromURL($url)
{
}
/**
 * Function to remove comments into HTML content
 *
 * @param	string	  $content 				Text content
 * @return	string						    Returns text without HTML comments
 */
function removeHtmlComment($content)
{
}