<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
// Full methods code
/**
 * Get a thirdparty
 *
 * @param	array		$authentication		Array of authentication information
 * @param	string		$id		    		internal id
 * @param	string		$ref		    	internal reference
 * @param	string		$ref_ext	   		external reference
 * @param	string		$barcode	   		barcode
 * @param	string		$profid1	   		profid1
 * @param	string		$profid2	   		profid2
 * @return	array							Array result
 */
function getThirdParty($authentication, $id = '', $ref = '', $ref_ext = '', $barcode = '', $profid1 = '', $profid2 = '')
{
}
/**
 * Create a thirdparty
 *
 * @param	array		$authentication		Array of authentication information
 * @param	Societe		$thirdparty		    Thirdparty
 * @return	array							Array result
 */
function createThirdParty($authentication, $thirdparty)
{
}
/**
 * Update a thirdparty
 *
 * @param	array		$authentication		Array of authentication information
 * @param	Societe		$thirdparty		    Thirdparty
 * @return	array							Array result
 */
function updateThirdParty($authentication, $thirdparty)
{
}
/**
 * getListOfThirdParties
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$filterthirdparty	Filter fields (key=>value to filer on. For example 'client'=>2, 'supplier'=>1, 'category'=>idcateg, 'name'=>'searchstring', ...)
 * @return	array							Array result
 */
function getListOfThirdParties($authentication, $filterthirdparty)
{
}
/**
 * Delete a thirdparty
 *
 * @param	array		$authentication		Array of authentication information
 * @param	string		$id		    		internal id
 * @param	string		$ref		    	internal reference
 * @param	string		$ref_ext	   		external reference
 * @return	array							Array result
 */
function deleteThirdParty($authentication, $id = '', $ref = '', $ref_ext = '')
{
}