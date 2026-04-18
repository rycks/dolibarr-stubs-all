<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
// Create the soap Object
$server = new \nusoap_server();
$ns = 'http://www.dolibarr.org/ns/';
// Define other specific objects
// None
// 5 styles: RPC/encoded, RPC/literal, Document/encoded (not WS-I compliant), Document/literal, Document/literal wrapped
// Style merely dictates how to translate a WSDL binding to a SOAP message. Nothing more. You can use either style with any programming model.
// http://www.ibm.com/developerworks/webservices/library/ws-whichwsdl/
$styledoc = 'rpc';
// rpc/document (document is an extend into SOAP 1.0 to support unstructured messages)
$styleuse = 'encoded';
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