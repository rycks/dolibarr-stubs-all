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
$thirdpartywithuser_fields = array(
    // For thirdparty and contact
    'name' => array('name' => 'name', 'type' => 'xsd:string'),
    'firstname' => array('name' => 'firstname', 'type' => 'xsd:string'),
    'name_thirdparty' => array('name' => 'name_thirdparty', 'type' => 'xsd:string'),
    'ref_ext' => array('name' => 'ref_ext', 'type' => 'xsd:string'),
    'client' => array('name' => 'client', 'type' => 'xsd:string'),
    'fournisseur' => array('name' => 'fournisseur', 'type' => 'xsd:string'),
    'address' => array('name' => 'address', 'type' => 'xsd:string'),
    'zip' => array('name' => 'zip', 'type' => 'xsd:string'),
    'town' => array('name' => 'town', 'type' => 'xsd:string'),
    'country_id' => array('name' => 'country_id', 'type' => 'xsd:string'),
    'country_code' => array('name' => 'country_code', 'type' => 'xsd:string'),
    'phone' => array('name' => 'phone', 'type' => 'xsd:string'),
    'phone_mobile' => array('name' => 'phone_mobile', 'type' => 'xsd:string'),
    'fax' => array('name' => 'fax', 'type' => 'xsd:string'),
    'email' => array('name' => 'email', 'type' => 'xsd:string'),
    'url' => array('name' => 'url', 'type' => 'xsd:string'),
    'profid1' => array('name' => 'profid1', 'type' => 'xsd:string'),
    'profid2' => array('name' => 'profid2', 'type' => 'xsd:string'),
    'profid3' => array('name' => 'profid3', 'type' => 'xsd:string'),
    'profid4' => array('name' => 'profid4', 'type' => 'xsd:string'),
    'profid5' => array('name' => 'profid5', 'type' => 'xsd:string'),
    'profid6' => array('name' => 'profid6', 'type' => 'xsd:string'),
    'capital' => array('name' => 'capital', 'type' => 'xsd:string'),
    'tva_assuj' => array('name' => 'tva_assuj', 'type' => 'xsd:string'),
    'tva_intra' => array('name' => 'tva_intra', 'type' => 'xsd:string'),
    // 	For user
    'login' => array('name' => 'login', 'type' => 'xsd:string'),
    'password' => array('name' => 'password', 'type' => 'xsd:string'),
    'group_id' => array('name' => 'group_id', 'type' => 'xsd:string'),
);
$elementtype = 'socpeople';
// Retrieve all extrafield for contact
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
 * Get produt or service
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param	int			$id					Id of object
 * @param	string		$ref				Ref of object
 * @param	string		$ref_ext			Ref external of object
 * @return	mixed
 */
function getUser($authentication, $id, $ref = '', $ref_ext = '')
{
}
/**
 * getListOfGroups
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getListOfGroups($authentication)
{
}
/**
 * Create an external user with thirdparty and contact
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param array{name:string,firstname:string,name_thirdparty:string,ref_ext:string,client:string,fournisseur:string,address:string,zip:string,town:string,country_id:string,country_code:string,phone:string,phone_mobile:string,fax:string,email:string,url:string,profid1:string,profid2:string,profid3:string,profid4:string,profid5:string,profid6:string,capital:string,tva_assuj:string,tva_intra:string,login:string,password:string,group_id:string}		$thirdpartywithuser Datas
 * @return array{id?:int,result:array{result_code:string,result_label:string}} Array result
 */
function createUserFromThirdparty($authentication, $thirdpartywithuser)
{
}
/**
 * Set password of an user
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param	array{login:string,password:string}		$shortuser			Array of login/password info
 * @return	mixed
 */
function setUserPassword($authentication, $shortuser)
{
}