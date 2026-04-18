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
$thirdparty_fields = array('id' => array('name' => 'id', 'type' => 'xsd:string'), 'ref' => array('name' => 'name', 'type' => 'xsd:string'), 'ref_ext' => array('name' => 'ref_ext', 'type' => 'xsd:string'), 'fk_user_author' => array('name' => 'fk_user_author', 'type' => 'xsd:string'), 'status' => array('name' => 'status', 'type' => 'xsd:string'), 'client' => array('name' => 'client', 'type' => 'xsd:string'), 'supplier' => array('name' => 'supplier', 'type' => 'xsd:string'), 'customer_code' => array('name' => 'customer_code', 'type' => 'xsd:string'), 'supplier_code' => array('name' => 'supplier_code', 'type' => 'xsd:string'), 'customer_code_accountancy' => array('name' => 'customer_code_accountancy', 'type' => 'xsd:string'), 'supplier_code_accountancy' => array('name' => 'supplier_code_accountancy', 'type' => 'xsd:string'), 'date_creation' => array('name' => 'date_creation', 'type' => 'xsd:dateTime'), 'date_modification' => array('name' => 'date_modification', 'type' => 'xsd:dateTime'), 'note_private' => array('name' => 'note_private', 'type' => 'xsd:string'), 'note_public' => array('name' => 'note_public', 'type' => 'xsd:string'), 'address' => array('name' => 'address', 'type' => 'xsd:string'), 'zip' => array('name' => 'zip', 'type' => 'xsd:string'), 'town' => array('name' => 'town', 'type' => 'xsd:string'), 'region_code' => array('name' => 'region_code', 'type' => 'xsd:string'), 'country_id' => array('name' => 'country_id', 'type' => 'xsd:string'), 'country_code' => array('name' => 'country_code', 'type' => 'xsd:string'), 'country' => array('name' => 'country', 'type' => 'xsd:string'), 'phone' => array('name' => 'phone', 'type' => 'xsd:string'), 'fax' => array('name' => 'fax', 'type' => 'xsd:string'), 'email' => array('name' => 'email', 'type' => 'xsd:string'), 'url' => array('name' => 'url', 'type' => 'xsd:string'), 'profid1' => array('name' => 'profid1', 'type' => 'xsd:string'), 'profid2' => array('name' => 'profid2', 'type' => 'xsd:string'), 'profid3' => array('name' => 'profid3', 'type' => 'xsd:string'), 'profid4' => array('name' => 'profid4', 'type' => 'xsd:string'), 'profid5' => array('name' => 'profid5', 'type' => 'xsd:string'), 'profid6' => array('name' => 'profid6', 'type' => 'xsd:string'), 'capital' => array('name' => 'capital', 'type' => 'xsd:string'), 'vat_used' => array('name' => 'vat_used', 'type' => 'xsd:string'), 'vat_number' => array('name' => 'vat_number', 'type' => 'xsd:string'));
$elementtype = 'societe';
// Retrieve all extrafields for thirdparties
// fetch optionals attributes and labels
$extrafields = new \ExtraFields($db);
$extrafield_array = \null;
// 5 styles: RPC/encoded, RPC/literal, Document/encoded (not WS-I compliant), Document/literal, Document/literal wrapped
// Style merely dictates how to translate a WSDL binding to a SOAP message. Nothing more. You can use either style with any programming model.
// http://www.ibm.com/developerworks/webservices/library/ws-whichwsdl/
$styledoc = 'rpc';
// rpc/document (document is an extend into SOAP 1.0 to support unstructured messages)
$styleuse = 'encoded';
// Full methods code
/**
 * Get a thirdparty
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	string		$id		    		internal id
 * @param	string		$ref		    	internal reference
 * @param	string		$ref_ext	   		external reference
 * @param	string		$barcode	   		barcode
 * @param	string		$profid1	   		profid1
 * @param	string		$profid2	   		profid2
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getThirdParty($authentication, $id = '', $ref = '', $ref_ext = '', $barcode = '', $profid1 = '', $profid2 = '')
{
}
/**
 * Create a thirdparty
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,fk_user_author:string,status:string,client:string,supplier:string,customer_code:string,supplier_code:string,customer_code_accountancy:string,supplier_code_accountancy:string,date_creation:string,date_modification:string,note_private:string,note_public:string,address:string,zip:string,town:string,region_code:string,country_id:string,country_code:string,country:string,phone:string,fax:string,email:string,url:string,profid1:string,profid2:string,profid3:string,profid4:string,profid5:string,profid6:string,capital:string,vat_used:string,vat_number:string}		$thirdparty		    Thirdparty
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function createThirdParty($authentication, $thirdparty)
{
}
/**
 * Update a thirdparty
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,fk_user_author:string,status:string,client:string,supplier:string,customer_code:string,supplier_code:string,customer_code_accountancy:string,supplier_code_accountancy:string,date_creation:string,date_modification:string,note_private:string,note_public:string,address:string,zip:string,town:string,region_code:string,country_id:string,country_code:string,country:string,phone:string,fax:string,email:string,url:string,profid1:string,profid2:string,profid3:string,profid4:string,profid5:string,profid6:string,capital:string,vat_used:string,vat_number:string}		$thirdparty		    Thirdparty
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function updateThirdParty($authentication, $thirdparty)
{
}
/**
 * getListOfThirdParties
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array<string,mixed>		$filterthirdparty	Filter fields (key=>value to filer on. For example 'client'=>2, 'supplier'=>1, 'category'=>idcateg, 'name'=>'searchstring', ...)
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getListOfThirdParties($authentication, $filterthirdparty)
{
}
/**
 * Delete a thirdparty
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	string		$id		    		internal id
 * @param	string		$ref		    	internal reference
 * @param	string		$ref_ext	   		external reference
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function deleteThirdParty($authentication, $id = '', $ref = '', $ref_ext = '')
{
}