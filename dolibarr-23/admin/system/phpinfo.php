<?php

$title = 'InfoPHP';
// Check PHP setup is OK
$maxphp = @\ini_get('upload_max_filesize');
$maxphp2 = @\ini_get('post_max_size');
$arrayphpminversionerror = array(7, 1, 0);
$arrayphpminversionwarning = array(7, 1, 0);
$activatedExtensions = array();
$loadedExtensions = \array_map('strtolower', \get_loaded_extensions(\false));
$functions = ["mb_check_encoding"];
$name = "MBString";
$functions = ["json_decode"];
$name = "JSON";
$functions = ["imagecreate"];
$name = "GD";
$functions = ["curl_init"];
$name = "Curl";
$functions = ["easter_date"];
$name = "Calendar";
$functions = ["simplexml_load_string"];
$name = "Xml";
$functions = ["imap_open"];
$name = "IMAP";
$functions = array();
$name = "zip";
$functions = array();
$name = "bz2";
// bcmath is used only by swiftmailer for NTLM authentication that is not implemented by Dolibarr core for the moment, so i comment this.
/*
$functions = array();
$name = "bcmath";
print "<tr>";
print "<td>".$name."</td>";
print getResultColumn($name, $activatedExtensions, $loadedExtensions, $functions, $langs->trans("Optional").' (NTLM authentication of Swiftmailer)');
print "</tr>";
*/
$functions = array();
$name = "xDebug";
// Get php_info array
$phparray = \phpinfo_array();
/**
 * Return a result column with a translated result text
 *
 * @param 	string 		$name			The name of the PHP extension
 * @param 	string[] 	$activated		A list with all activated PHP extensions. Deprecated.
 * @param 	string[] 	$loaded			A list with all loaded PHP extensions
 * @param 	string[] 	$functions		A list with all PHP functions to check
 * @param	string		$optional		String with message when module is optional
 * @return 	string
 */
function getResultColumn($name, array $activated, array $loaded, array $functions, $optional = '')
{
}