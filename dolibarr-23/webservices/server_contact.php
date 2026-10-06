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
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$id					Id of object
 * @param	string		$ref_ext			Ref external of object
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getContact($authentication, $id, $ref_ext)
{
}
/**
 * Create Contact
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param array{id:string,ref_ext:string,lastname:string,firstname:string,address:string,zip:string,town:string,state_id:string,state_code:string,state:string,country_id:string,country_code:string,country:string,socid:string,status:string,phone_pro:string,fax:string,phone_perso:string,phone_mobile:string,code:string,email:string,birthday:string,default_lang:string,note:string,ref_facturation:string,ref_contrat:string,ref_commande:string,ref_propal:string,user_id:string,user_login:string,civility_id:string,poste:string}	$contact		    $contact
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function createContact($authentication, $contact)
{
}
/**
 * Get list of contacts for third party
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$idthirdparty		Id thirdparty
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getContactsForThirdParty($authentication, $idthirdparty)
{
}
/**
 * Update a contact
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param array{id:string,ref_ext:string,lastname:string,firstname:string,address:string,zip:string,town:string,state_id:string,state_code:string,state:string,country_id:string,country_code:string,country:string,socid:string,status:string,phone_pro:string,fax:string,phone_perso:string,phone_mobile:string,code:string,email:string,birthday:string,default_lang:string,note:string,ref_facturation:string,ref_contrat:string,ref_commande:string,ref_propal:string,user_id:string,user_login:string,civility_id:string,poste:string}	$contact		    Contact
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function updateContact($authentication, $contact)
{
}