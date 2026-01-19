<?php

/* Copyright (C) 2008-2020	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2025       Frédéric France         <frederic.france@free.fr>
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
 * Support Dolibarr setup for timeout (MAIN_USE_*_TIMEOUT) and proxy (MAIN_PROXY_*)
 * Enhancement of CURL to add an anti SSRF protection:
 * - you can set MAIN_SECURITY_ANTI_SSRF_SERVER_IP to set static ip of server
 * - common local lookup ips like 127.*.*.* are automatically added
 *
 * @param	string	  	$url 			    URL to call.
 * @param	'POST'|'GET'|'HEAD'|'PUT'|'PATCH'|'PUTALREADYFORMATED'|'POSTALREADYFORMATED'|'PATCHALREADYFORMATED'|'DELETE'	$postorget		    'POST', 'GET', 'HEAD', 'PUT', 'PATCH', 'PUTALREADYFORMATED', 'POSTALREADYFORMATED', 'PATCHALREADYFORMATED', 'DELETE'
 * @param	string    	$param			    Parameters of URL (x=value1&y=value2) or may be a formatted content with $postorget='PUTALREADYFORMATED'
 * @param	int<0,1>  	$followlocation		0=Do not follow, 1=Follow location.
 * @param	string[]  	$addheaders			Array of string to add into header. Example: ('Accept: application/xrds+xml', ....)
 * @param	string[]  	$allowedschemes		List of schemes that are allowed ('http' + 'https' only by default)
 * @param	int<0,2>  	$localurl			0=Only external URL are possible, 1=Only local URL, 2=Both external and local URL are allowed.
 * @param	int<-1,1>  	$ssl_verifypeer		-1=Auto (no ssl check on dev, check on prod), 0=No ssl check, 1=Always ssl check
 * @param	int			$timeoutconnect		Timeout connect
 * @param	int			$timeoutresponse	Timeout response
 * @return	array{http_code:int,content:string,curl_error_no:int,curl_error_msg:string}    Returns an associative array containing the response from the server array('http_code'=>http response code, 'content'=>response, 'curl_error_no'=>errno, 'curl_error_msg'=>errmsg...)
 */
function getURLContent($url, $postorget = 'GET', $param = '', $followlocation = 1, $addheaders = array(), $allowedschemes = array('http', 'https'), $localurl = 0, $ssl_verifypeer = -1, $timeoutconnect = 0, $timeoutresponse = 0)
{
}
/**
 * Is IP allowed
 *
 * @param 	string	$iptocheck		IP to check
 * @param 	int		$localurl		0=external url only, 1=internal url only
 * @return	string					Error message or ''
 */
function isIPAllowed($iptocheck, $localurl)
{
}
/**
 * Function get second level domain name.
 * For example: https://www.abc.mydomain.com/dir/page.html returns 'mydomain' with mode 0, 'mydomain.om' with mode 1, 'abc.mydomain.com' with mode 2.
 * For example: part1@mydomain.com returns 'mydomain.com' with mode 1
 *
 * @param	string	  $url 				    Full URL or Email.
 * @param	int	 	  $mode					0=return 'mydomain', 1=return 'mydomain.com', 2=return 'abc.mydomain.com'
 * @return	string						    Returns domaine name
 */
function getDomainFromURL($url, $mode = 0)
{
}
/**
 * Function root url from a long url
 * For example: https://www.abc.mydomain.com/dir/page.html return 'https://www.abc.mydomain.com'
 * For example: https://www.abc.mydomain.com/ return 'https://www.abc.mydomain.com'
 * For example: http://www.abc.mydomain.com/ return 'http://www.abc.mydomain.com'
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