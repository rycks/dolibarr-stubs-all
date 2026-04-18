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
$contact_fields = array('id' => array('name' => 'id', 'type' => 'xsd:string'), 'ref_ext' => array('name' => 'ref_ext', 'type' => 'xsd:string'), 'lastname' => array('name' => 'lastname', 'type' => 'xsd:string'), 'firstname' => array('name' => 'firstname', 'type' => 'xsd:string'), 'address' => array('name' => 'address', 'type' => 'xsd:string'), 'zip' => array('name' => 'zip', 'type' => 'xsd:string'), 'town' => array('name' => 'town', 'type' => 'xsd:string'), 'state_id' => array('name' => 'state_id', 'type' => 'xsd:string'), 'state_code' => array('name' => 'state_code', 'type' => 'xsd:string'), 'state' => array('name' => 'state', 'type' => 'xsd:string'), 'country_id' => array('name' => 'country_id', 'type' => 'xsd:string'), 'country_code' => array('name' => 'country_code', 'type' => 'xsd:string'), 'country' => array('name' => 'country', 'type' => 'xsd:string'), 'socid' => array('name' => 'socid', 'type' => 'xsd:string'), 'status' => array('name' => 'status', 'type' => 'xsd:string'), 'phone_pro' => array('name' => 'phone_pro', 'type' => 'xsd:string'), 'fax' => array('name' => 'fax', 'type' => 'xsd:string'), 'phone_perso' => array('name' => 'phone_perso', 'type' => 'xsd:string'), 'phone_mobile' => array('name' => 'phone_mobile', 'type' => 'xsd:string'), 'code' => array('name' => 'code', 'type' => 'xsd:string'), 'email' => array('name' => 'email', 'type' => 'xsd:string'), 'birthday' => array('name' => 'birthday', 'type' => 'xsd:string'), 'default_lang' => array('name' => 'default_lang', 'type' => 'xsd:string'), 'note' => array('name' => 'note', 'type' => 'xsd:string'), 'ref_facturation' => array('name' => 'ref_facturation', 'type' => 'xsd:string'), 'ref_contrat' => array('name' => 'ref_contrat', 'type' => 'xsd:string'), 'ref_commande' => array('name' => 'ref_commande', 'type' => 'xsd:string'), 'ref_propal' => array('name' => 'ref_propal', 'type' => 'xsd:string'), 'user_id' => array('name' => 'user_id', 'type' => 'xsd:string'), 'user_login' => array('name' => 'user_login', 'type' => 'xsd:string'), 'civility_id' => array('name' => 'civility_id', 'type' => 'xsd:string'), 'poste' => array('name' => 'poste', 'type' => 'xsd:string'));
$elementtype = 'socpeople';
//Retrieve all extrafield for contact
// fetch optionals attributes and labels
$extrafields = new \ExtraFields($db);
$extrafield_array = \null;
// 5 styles: RPC/encoded, RPC/literal, Document/encoded (not WS-I compliant), Document/literal, Document/literal wrapped
// Style merely dictates how to translate a WSDL binding to a SOAP message. Nothing more. You can use either style with any programming model.
// http://www.ibm.com/developerworks/webservices/library/ws-whichwsdl/
$styledoc = 'rpc';
// rpc/document (document is an extend into SOAP 1.0 to support unstructured messages)
$styleuse = 'encoded';
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