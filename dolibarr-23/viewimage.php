<?php

/* Copyright (C) 2004-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2005-2016 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2016 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2024-2025  Frédéric France      <frederic.france@free.fr>
 * Copyright (C) 2024-2025	MDW					<mdeweerd@users.noreply.github.com>
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
 *		\file       htdocs/viewimage.php
 *		\brief      Wrapper to show images into Dolibarr screens.
 *		\remarks    Call to wrapper is :
 *					DOL_URL_ROOT.'/viewimage.php?modulepart=diroffile&file=relativepathofofile&cache=0
 *					DOL_URL_ROOT.'/viewimage.php?hashp=sharekey
 */
\define('MAIN_SECURITY_FORCECSP', "default-src 'none'");
\define('NOREQUIRESOC', '1');
\define('NOREQUIRETRAN', '1');
\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
// Some value of modulepart can be used to get resources that are public so no login are required.
// Note that only directory logo is free to access without login.
$needlogin = 1;
// For MultiCompany module.
// Do not use GETPOST here, function is not defined and define must be done before including main.inc.php
// Because 2 entities can have the same ref.
$entity = !empty($_GET['entity']) ? (int) $_GET['entity'] : (!empty($_POST['entity']) ? (int) $_POST['entity'] : 1);
\define("DOLENTITY", $entity);
/**
 * Header empty
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param 	string 			$head				Optional head lines
 * @param 	string 			$title				HTML title
 * @param	string			$help_url			Url links to help page
 * 		                            			Syntax is: For a wiki page: EN:EnglishPage|FR:FrenchPage|ES:SpanishPage|DE:GermanPage
 *                                  			For other external page: http://server/url
 * @param	string			$target				Target to use on links
 * @param 	int    			$disablejs			More content into html header
 * @param 	int    			$disablehead		More content into html header
 * @param 	string[]|string	$arrayofjs			Array of complementary js files
 * @param 	string[]|string	$arrayofcss			Array of complementary css files
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
 * Footer empty
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @param	string	$comment    				A text to add as HTML comment into HTML generated page
 * @param	string	$zone						'private' (for private pages) or 'public' (for public pages)
 * @param	int		$disabledoutputofmessages	Clear all messages stored into session without displaying them
 * @return	void
 */
function llxFooter($comment = '', $zone = 'private', $disabledoutputofmessages = 0)
{
}
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
$original_file = \GETPOST('file', 'alphanohtml');
$hashp = \GETPOST('hashp', 'aZ09', 1);
$extname = \GETPOST('extname', 'alpha', 1);
$modulepart = \GETPOST('modulepart', 'alpha', 1);
$urlsource = \GETPOST('urlsource', 'alpha');
$entity = \GETPOSTINT('entity') ? \GETPOSTINT('entity') : $conf->entity;
/*
 * Actions
 */
// None
/*
 * View
 */
$cachestring = \GETPOST("cache", 'aZ09');
$ecmfile = new \EcmFiles($db);
$result = $ecmfile->fetch(0, '', '', '', $hashp);
// Define mime type
$type = 'application/octet-stream';
// Security: Delete string ../ or ..\ into $original_file
$original_file = \preg_replace('/\\.\\.+/', '..', $original_file);
// Replace '... or more' with '..'
$original_file = \str_replace('../', '/', $original_file);
$original_file = \str_replace('..\\', '/', $original_file);
// Find the subdirectory name as the reference
$refname = \basename(\dirname($original_file) . "/");
$check_access = \dol_check_secure_access_document($modulepart, $original_file, $entity, $user, $refname);
$accessallowed = $check_access['accessallowed'];
$sqlprotectagainstexternals = $check_access['sqlprotectagainstexternals'];
$fullpath_original_file = $check_access['original_file'];
$generator = \GETPOST("generator", "aZ09");
$encoding = \GETPOST("encoding", "aZ09");
$readable = \GETPOST("readable", 'aZ09') ? \GETPOST("readable", "aZ09") : "Y";
// If $code is virtualcard_xxx_999.vcf, it is a file to read to get code
$reg = array();
$dirbarcode = \array_merge(array("/core/modules/barcode/doc/"), $conf->modules_parts['barcode']);
$result = 0;
// Load barcode class
$classname = "mod" . \ucfirst($generator);
$module = new $classname($db);