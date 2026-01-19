<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Full methods code
 *
 * @param	string		$authentication		Authentication string
 * @return	array							Array of data
 */
function getVersions($authentication)
{
}
/**
 * Method to get a document by webservice
 *
 * @param 	array	$authentication		Array with permissions
 * @param 	string	$modulepart		 	Properties of document
 * @param	string	$file				Relative path
 * @param	string	$refname			Ref of object to check permission for external users (autodetect if not provided)
 * @return	array
 */
function getDocument($authentication, $modulepart, $file, $refname = '')
{
}