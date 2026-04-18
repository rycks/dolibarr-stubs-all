<?php

/* Copyright (C) 2004-2007 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2013 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005      Simon Tosser         <simon@kornog-computing.com>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2010	   Pierre Morin         <pierre.morin@auguria.net>
 * Copyright (C) 2010	   Juanjo Menent        <jmenent@2byte.es>
 * Copyright (C) 2022	    Ferran Marcet           <fmarcet@2byte.es>
 * Copyright (C) 2024-2025  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2025		MDW						<mdeweerd@users.noreply.github.com>
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
 *	\file       htdocs/document.php
 *  \brief      Wrapper to download data files
 *  \remarks    Call of this wrapper is made with URL:
 * 				DOL_URL_ROOT.'/document.php?modulepart=repfichierconcerne&file=relativepathoffile'
 * 				DOL_URL_ROOT.'/document.php?modulepart=logs&file=dolibarr.log'
 * 				DOL_URL_ROOT.'/document.php?hashp=sharekey'
 */
\define('MAIN_SECURITY_FORCECSP', "default-src 'none'");
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
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
 * @phan-suppress PhanRedefineFunction
 */
function llxHeader($head = '', $title = '', $help_url = '', $target = '', $disablejs = 0, $disablehead = 0, $arrayofjs = '', $arrayofcss = '', $morequerystring = '', $morecssonbody = '', $replacemainareaby = '', $disablenofollow = 0, $disablenoindex = 0)
{
}
/**
 * Footer empty
 *
 * Note: also called by functions.lib:recordNotFound
 *
 * @ignore
 * @param	string	$comment    				A text to add as HTML comment into HTML generated page
 * @param	string	$zone						'private' (for private pages) or 'public' (for public pages)
 * @param	int		$disabledoutputofmessages	Clear all messages stored into session without displaying them
 * @return	void
 * @phan-suppress PhanRedefineFunction
 */
function llxFooter($comment = '', $zone = 'private', $disabledoutputofmessages = 0)
{
}
$encoding = '';
$action = \GETPOST('action', 'aZ09');
$original_file = \GETPOST('file', 'alphanohtml');
$hashp = \GETPOST('hashp', 'aZ09');
$modulepart = \GETPOST('modulepart', 'alpha');
$urlsource = \GETPOST('urlsource', 'alpha');
$entity = \GETPOSTISSET('entity') ? \GETPOSTINT('entity') : $conf->entity;
$socid = 0;
/*
 * Actions
 */
// None
/*
 * View
 */
// If we have a hash public (hashp), we guess the original_file.
$ecmfile = '';
// Define attachment (attachment=true to force choice popup 'open'/'save as')
$attachment = \true;
// Define mime type
$type = 'application/octet-stream';
// Security: Delete string ../ or ..\ into $original_file
$original_file = \preg_replace('/\\.\\.+/', '..', $original_file);
// Replace '... or more' with '..'
$original_file = \str_replace('../', '/', $original_file);
$original_file = \str_replace('..\\', '/', $original_file);
// Check security and set return info with full path of file
$check_access = \dol_check_secure_access_document($modulepart, $original_file, (int) $entity, $user, '', 'read');
$accessallowed = $check_access['accessallowed'];
$sqlprotectagainstexternals = $check_access['sqlprotectagainstexternals'];
$fullpath_original_file = $check_access['original_file'];
$filename = \basename($fullpath_original_file);
$filename = \preg_replace('/\\.noexe$/i', '', $filename);
$fullpath_original_file_osencoded = \dol_osencode($fullpath_original_file);
$parameters = array('ecmfile' => $ecmfile, 'modulepart' => $modulepart, 'original_file' => $original_file, 'entity' => $entity, 'fullpath_original_file' => $fullpath_original_file, 'filename' => $filename, 'fullpath_original_file_osencoded' => $fullpath_original_file_osencoded);
$object = new \stdClass();
$reshook = $hookmanager->executeHooks('downloadDocument', $parameters, $object, $action);
$readfile = \true;