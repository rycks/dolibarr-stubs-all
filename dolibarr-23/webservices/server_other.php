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
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array with authentication information
 * @return	array{result:array{result_code:string,result_label:string},dolibarr?:string,os?:string,php?:string,webserver?:string}	Array of data
 */
function getVersions($authentication)
{
}
/**
 * Method to get a document by webservice
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array with authentication information
 * @param 	string	$modulepart		 	Properties of document
 * @param	string	$file				Relative path
 * @param	string	$refname			Ref of object to check permission for external users (autodetect if not provided)
 * @return	array{result:array{result_code:string,result_label:string},document?:array{filename:string,mimetype:string,content:string,length:int}}	Array of data
 */
function getDocument($authentication, $modulepart, $file, $refname = '')
{
}