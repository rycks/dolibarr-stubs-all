<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Get Contact
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$id					Id of object
 * @param	string		$ref_ext			Ref external of object
 * @return	mixed
 */
function getContact($authentication, $id, $ref_ext)
{
}
/**
 * Create Contact
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$contact		    $contact
 * @return	array							Array result
 */
function createContact($authentication, $contact)
{
}
/**
 * Get list of contacts for third party
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$idthirdparty		Id thirdparty
 * @return	array							Array result
 */
function getContactsForThirdParty($authentication, $idthirdparty)
{
}
/**
 * Update a contact
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$contact		    Contact
 * @return	array							Array result
 */
function updateContact($authentication, $contact)
{
}