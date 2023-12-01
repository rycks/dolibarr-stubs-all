<?php

/* Copyright (C) 2008-2011  Laurent Destailleur         <eldy@users.sourceforge.net>
 * Copyright (C) 2008-2012  Regis Houssin               <regis.houssin@inodbox.com>
 * Copyright (C) 2008       Raphael Bertrand (Resultic) <raphael.bertrand@resultic.fr>
 * Copyright (C) 2014-2016  Marcos García               <marcosgdf@gmail.com>
 * Copyright (C) 2015       Ferran Marcet               <fmarcet@2byte.es>
 * Copyright (C) 2015-2016  Raphaël Doursenaud          <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2017       Juanjo Menent               <jmenent@2byte.es>
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
 *	\file			htdocs/core/lib/functions2.lib.php
 *	\brief			A set of functions for Dolibarr
 *					This file contains all rare functions.
 */
// Enable this line to trace path when function is called.
//print xdebug_print_function_stack('Functions2.lib was called');exit;
/**
 * Same function than javascript unescape() function but in PHP.
 *
 * @param 	string	$source		String to decode
 * @return	string				Unescaped string
 */
function jsUnEscape($source)
{
}
/**
 * Return list of modules directories. We detect directories that contains a subdirectory /core/modules
 * We discard directory modules that contains 'disabled' into their name.
 *
 * @param	string	$subdir		Sub directory (Example: '/mailings')
 * @return	array				Array of directories that can contains module descriptors
 */
function dolGetModulesDirs($subdir = '')
{
}
/**
 *  Try to guess default paper format according to language into $langs
 *
 *	@param		Translate	$outputlangs		Output lang to use to autodetect output format if setup not done
 *	@return		string							Default paper format code
 */
function dol_getDefaultFormat(\Translate $outputlangs = \null)
{
}
/**
 *  Output content of a file $filename in version of current language (otherwise may use an alternate language)
 *
 *  @param	Translate	$langs          Object language to use for output
 *  @param  string		$filename       Relative filename to output
 *  @param  int			$searchalt      1=Search also in alternative languages
 *	@return	boolean						true if OK, false if KO
 */
function dol_print_file($langs, $filename, $searchalt = 0)
{
}
/**
 *	Show informations on an object
 *  TODO Move this into html.formother
 *
 *	@param	object	$object			Objet to show
 *  @param  int     $usetable       Output into a table
 *	@return	void
 */
function dol_print_object_info($object, $usetable = 0)
{
}
/**
 *	Return an email formatted to include a tracking id
 *  For example  myemail@example.com becom myemail+trackingid@example.com
 *
 *	@param	string	$email       	Email address (Ex: "toto@example.com", "John Do <johndo@example.com>")
 *	@param	string	$trackingid    	Tracking id (Ex: thi123 for thirdparty with id 123)
 *	@return string     			    Return email tracker string
 */
function dolAddEmailTrackId($email, $trackingid)
{
}
/**
 *	Return true if email has a domain name that can be resolved to MX type.
 *
 *	@param	string	$mail       Email address (Ex: "toto@example.com", "John Do <johndo@example.com>")
 *	@return int     			-1 if error (function not available), 0=Not valid, 1=Valid
 */
function isValidMailDomain($mail)
{
}
/**
 *	Url string validation
 *  <http[s]> :// [user[:pass]@] hostname [port] [/path] [?getquery] [anchor]
 *
 *	@param	string	$url		Url
 *  @param  int		$http		1: verify http is provided, 0: not verify http
 *  @param  int		$pass		1: verify user and pass is provided, 0: not verify user and pass
 *  @param  int		$port		1: verify port is provided, 0: not verify port
 *  @param  int		$path		1: verify a path is provided "/" or "/..." or "/.../", 0: not verify path
 *  @param  int		$query		1: verify query is provided, 0: not verify query
 *  @param  int		$anchor		1: verify anchor is provided, 0: not verify anchor
 *	@return int					1=Check is OK, 0=Check is KO
 */
function isValidUrl($url, $http = 0, $pass = 0, $port = 0, $path = 0, $query = 0, $anchor = 0)
{
}
/**
 *	Check if VAT numero is valid (check done on syntax only, no database or remote access)
 *
 *	@param	Societe   $company       VAT number
 *	@return int					     1=Check is OK, 0=Check is KO
 */
function isValidVATID($company)
{
}
/**
 *	Clean an url string
 *
 *	@param	string	$url		Url
 *	@param  integer	$http		1 = keep both http:// and https://, 0: remove http:// but not https://
 *	@return string				Cleaned url
 */
function clean_url($url, $http = 1)
{
}
/**
 * 	Returns an email value with obfuscated parts.
 *
 * 	@param 		string		$mail				Email
 * 	@param 		string		$replace			Replacement character (defaul: *)
 * 	@param 		int			$nbreplace			Number of replacement character (default: 8)
 * 	@param 		int			$nbdisplaymail		Number of character unchanged (default: 4)
 * 	@param 		int			$nbdisplaydomain	Number of character unchanged of domain (default: 3)
 * 	@param 		bool		$displaytld			Display tld (default: true)
 * 	@return		string							Return email with hidden parts or '';
 */
function dolObfuscateEmail($mail, $replace = "*", $nbreplace = 8, $nbdisplaymail = 4, $nbdisplaydomain = 3, $displaytld = \true)
{
}
/**
 * 	Return lines of an html table from an array
 * 	Used by array2table function only
 *
 * 	@param	array	$data		Array of data
 * 	@param	string	$troptions	Options for tr
 * 	@param	string	$tdoptions	Options for td
 * 	@return	string
 */
function array2tr($data, $troptions = '', $tdoptions = '')
{
}
/**
 * 	Return an html table from an array
 *
 * 	@param	array	$data			Array of data
 * 	@param	int		$tableMarkup	Table markup
 * 	@param	string	$tableoptions	Options for table
 * 	@param	string	$troptions		Options for tr
 * 	@param	string	$tdoptions		Options for td
 * 	@return	string
 */
function array2table($data, $tableMarkup = 1, $tableoptions = '', $troptions = '', $tdoptions = '')
{
}
/**
 * Return last or next value for a mask (according to area we should not reset)
 *
 * @param   DoliDB		$db				Database handler
 * @param   string		$mask			Mask to use
 * @param   string		$table			Table containing field with counter
 * @param   string		$field			Field containing already used values of counter
 * @param   string		$where			To add a filter on selection (for exemple to filter on invoice types)
 * @param   Societe		$objsoc			The company that own the object we need a counter for
 * @param   string		$date			Date to use for the {y},{m},{d} tags.
 * @param   string		$mode			'next' for next value or 'last' for last value
 * @param   bool		$bentityon		Activate the entity filter. Default is true (for modules not compatible with multicompany)
 * @param	User		$objuser		Object user we need data from.
 * @param	int			$forceentity	Entity id to force
 * @return 	string						New value (numeric) or error message
 */
function get_next_value($db, $mask, $table, $field, $where = '', $objsoc = '', $date = '', $mode = 'next', $bentityon = \true, $objuser = \null, $forceentity = \null)
{
}
/**
 * Get string between
 *
 * @param   string  $string     String to test
 * @param   int     $start      Value for start
 * @param   int     $end        Value for end
 * @return  string              Return part of string
 */
function get_string_between($string, $start, $end)
{
}
/**
 * Check value
 *
 * @param 	string	$mask		Mask to use
 * @param 	string	$value		Value
 * @return	int|string		    <0 or error string if KO, 0 if OK
 */
function check_value($mask, $value)
{
}
/**
 *	Convert a binary data to string that represent hexadecimal value
 *
 *	@param   string		$bin		Value to convert
 *	@param   boolean	$pad      	Add 0
 *	@param   boolean	$upper		Convert to tupper
 *	@return  string					x
 */
function binhex($bin, $pad = \false, $upper = \false)
{
}
/**
 *	Convert an hexadecimal string into a binary string
 *
 *	@param	string	$hexa		Hexadecimal string to convert (example: 'FF')
 *	@return string	    		bin
 */
function hexbin($hexa)
{
}
/**
 *	Retourne le numero de la semaine par rapport a une date
 *
 *	@param	string	$time   	Date au format 'timestamp'
 *	@return string					Number of week
 */
function numero_semaine($time)
{
}
/**
 *	Convertit une masse d'une unite vers une autre unite
 *
 *	@param	float	$weight    		Masse a convertir
 *	@param  int		$from_unit 		Unite originale en puissance de 10
 *	@param  int		$to_unit   		Nouvelle unite  en puissance de 10
 *	@return float	        		Masse convertie
 */
function weight_convert($weight, &$from_unit, $to_unit)
{
}
/**
 *	Save personnal parameter
 *
 *	@param	DoliDB	$db         Handler database
 *	@param	Conf	$conf		Object conf
 *	@param	User	$user      	Object user
 *	@param	array	$tab        Array (key=>value) with all parameters to save
 *	@return int         		<0 if KO, >0 if OK
 *
 *	@see		dolibarr_get_const(), dolibarr_set_const(), dolibarr_del_const()
 */
function dol_set_user_param($db, $conf, &$user, $tab)
{
}
/**
 *	Returns formated reduction
 *
 *	@param	int			$reduction		Reduction percentage
 *	@param	Translate	$langs			Output language
 *	@return	string						Formated reduction
 */
function dol_print_reduction($reduction, $langs)
{
}
/**
 * 	Return OS version.
 *  Note that PHP_OS returns only OS (not version) and OS PHP was built on, not necessarly OS PHP runs on.
 *
 *  @param 		string		$option 	Option string
 * 	@return		string					OS version
 */
function version_os($option = '')
{
}
/**
 * 	Return PHP version
 *
 * 	@return		string			PHP version
 *  @see		versionphparray()
 */
function version_php()
{
}
/**
 * 	Return Dolibarr version
 *
 * 	@return		string			Dolibarr version
 *  @see		versiondolibarrarray()
 */
function version_dolibarr()
{
}
/**
 * 	Return web server version
 *
 * 	@return		string			Web server version
 */
function version_webserver()
{
}
/**
 * 	Return list of activated modules usable for document generation
 *
 * 	@param	DoliDB		$db				    Database handler
 * 	@param	string		$type			    Type of models (company, invoice, ...)
 *  @param  int		    $maxfilenamelength  Max length of value to show
 * 	@return	array|int			    		0 if no module is activated, or array(key=>label). For modules that need directory scan, key is completed with ":filename".
 */
function getListOfModels($db, $type, $maxfilenamelength = 0)
{
}
/**
 * This function evaluates a string that should be a valid IPv4
 * Note: For ip 169.254.0.0, it returns 0 with some PHP (5.6.24) and 2 with some minor patchs of PHP (5.6.25). See https://github.com/php/php-src/pull/1954.
 *
 * @param	string $ip IP Address
 * @return	int 0 if not valid or reserved range, 1 if valid and public IP, 2 if valid and private range IP
 */
function is_ip($ip)
{
}
/**
 *  Build a login from lastname, firstname
 *
 *  @param	string		$lastname		Lastname
 *  @param  string		$firstname		Firstname
 *	@return	string						Login
 */
function dol_buildlogin($lastname, $firstname)
{
}
/**
 *  Return array to use for SoapClient constructor
 *
 *  @return     array
 */
function getSoapParams()
{
}
/**
 * Return link url to an object
 *
 * @param 	int		$objectid		Id of record
 * @param 	string	$objecttype		Type of object ('invoice', 'order', 'expedition_bon', 'myobject@mymodule', ...)
 * @param 	int		$withpicto		Picto to show
 * @param 	string	$option			More options
 * @return	string					URL of link to object id/type
 */
function dolGetElementUrl($objectid, $objecttype, $withpicto = 0, $option = '')
{
}
/**
 * Clean corrupted tree (orphelins linked to a not existing parent), record linked to themself and child-parent loop
 *
 * @param	DoliDB	$db					Database handler
 * @param	string	$tabletocleantree	Table to clean
 * @param	string	$fieldfkparent		Field name that contains id of parent
 * @return	int							Nb of records fixed/deleted
 */
function cleanCorruptedTree($db, $tabletocleantree, $fieldfkparent)
{
}
/**
 *	Convert an array with RGB value into hex RGB value.
 *  This is the opposite function of colorStringToArray
 *
 *  @param	array	$arraycolor			Array
 *  @param	string	$colorifnotfound	Color code to return if entry not defined or not a RGB format
 *  @return	string						RGB hex value (without # before). For example: 'FF00FF', '01FF02'
 *  @see	colorStringToArray(), colorHexToRgb()
 */
function colorArrayToHex($arraycolor, $colorifnotfound = '888888')
{
}
/**
 *	Convert a string RGB value ('FFFFFF', '255,255,255') into an array RGB array(255,255,255).
 *  This is the opposite function of colorArrayToHex.
 *  If entry is already an array, return it.
 *
 *  @param	string	$stringcolor		String with hex (FFFFFF) or comma RGB ('255,255,255')
 *  @param	array	$colorifnotfound	Color code array to return if entry not defined
 *  @return	array   					RGB hex value (without # before). For example: FF00FF
 *  @see	colorArrayToHex(), colorHexToRgb()
 */
function colorStringToArray($stringcolor, $colorifnotfound = array(88, 88, 88))
{
}
/**
 * @param string 	$color 			the color you need to valid
 * @param boolean 	$allow_white 	in case of white isn't valid
 * @return boolean
 */
function colorValidateHex($color, $allow_white = \true)
{
}
/**
 * Change color to make it less aggressive (ratio is negative) or more aggressive (ratio is positive)
 *
 * @param 	string 		$hex			Color in hex ('#AA1122' or 'AA1122' or '#a12' or 'a12')
 * @param 	integer		$ratio			Default=-50. Note: 0=Component color is unchanged, -100=Component color become 88, +100=Component color become 00 or FF
 * @param	integer		$brightness 	Default=0. Adjust brightness. -100=Decrease brightness by 100%, +100=Increase of 100%.
 * @return string		New string of color
 * @see colorAdjustBrightness()
 */
function colorAgressiveness($hex, $ratio = -50, $brightness = 0)
{
}
/**
 * @param string 	$hex 		Color in hex ('#AA1122' or 'AA1122' or '#a12' or 'a12')
 * @param integer 	$steps 		Step/offset added to each color component. It should be between -255 and 255. Negative = darker, positive = lighter
 * @return string				New color with format '#AA1122'
 * @see colorAgressiveness()
 */
function colorAdjustBrightness($hex, $steps)
{
}
/**
 * @param string $hex color in hex
 * @param integer $percent 0 to 100
 * @return string
 */
function colorDarker($hex, $percent)
{
}
/**
 * @param string $hex color in hex
 * @param integer $percent 0 to 100
 * @return string
 */
function colorLighten($hex, $percent)
{
}
/**
 * @param string 	$hex 			color in hex
 * @param float 	$alpha 			0 to 1 to add alpha channel
 * @param bool 		$returnArray	true=return an array instead, false=return string
 * @return string|array				String or array
 */
function colorHexToRgb($hex, $alpha = \false, $returnArray = \false)
{
}
/**
 * Applies the Cartesian product algorithm to an array
 * Source: http://stackoverflow.com/a/15973172
 *
 * @param   array $input    Array of products
 * @return  array           Array of combinations
 */
function cartesianArray(array $input)
{
}
/**
 * Get name of directory where the api_...class.php file is stored
 *
 * @param   string  $moduleobject     Module object name
 * @return  string              	  Directory name
 */
function getModuleDirForApiClass($moduleobject)
{
}
/**
 * Return 2 hexa code randomly
 *
 * @param	int   $min	    Between 0 and 255
 * @param	int   $max	    Between 0 and 255
 * @return  string          A color string '12'
 */
function randomColorPart($min = 0, $max = 255)
{
}
/**
 * Return hexadecimal color randomly
 *
 * @param	int   $min	   Between 0 and 255
 * @param	int   $max	   Between 0 and 255
 * @return  string         A color string '123456'
 */
function randomColor($min = 0, $max = 255)
{
}
/**
 * Encode string for xml usage
 *
 * @param 	string	$string		String to encode
 * @return	string				String encoded
 */
function dolEscapeXML($string)
{
}
/**
 * Convert links to local wrapper to medias files into a string into a public external URL readable on internet
 *
 * @param   string      $notetoshow      Text to convert
 * @return  string                       String
 */
function convertBackOfficeMediasLinksToPublicLinks($notetoshow)
{
}
/**
 *		Function to format a value into a defined format for French administration (no thousand separator & decimal separator force to ',' with two decimals)
 *		Function used into accountancy FEC export
 *
 *		@param	float		$amount		Amount to format
 *		@return	string					Chain with formatted upright
 *		@see	price2num()				Format a numeric into a price for FEC files
 */
function price2fec($amount)
{
}
/**
 * Check the syntax of some PHP code.
 *
 * @param 	string 			$code 	PHP code to check.
 * @return 	boolean|array 			If false, then check was successful, otherwise an array(message,line) of errors is returned.
 */
function phpSyntaxError($code)
{
}