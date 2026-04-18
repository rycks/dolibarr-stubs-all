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
$actioncomm_fields = array('id' => array('name' => 'id', 'type' => 'xsd:string'), 'ref' => array('name' => 'ref', 'type' => 'xsd:string'), 'ref_ext' => array('name' => 'ref_ext', 'type' => 'xsd:string'), 'type_id' => array('name' => 'type_id', 'type' => 'xsd:string'), 'type_code' => array('name' => 'type_code', 'type' => 'xsd:string'), 'type' => array('name' => 'type', 'type' => 'xsd:string'), 'label' => array('name' => 'label', 'type' => 'xsd:string'), 'datep' => array('name' => 'datep', 'type' => 'xsd:dateTime'), 'datef' => array('name' => 'datef', 'type' => 'xsd:dateTime'), 'datec' => array('name' => 'datec', 'type' => 'xsd:dateTime'), 'datem' => array('name' => 'datem', 'type' => 'xsd:dateTime'), 'note' => array('name' => 'note', 'type' => 'xsd:string'), 'percentage' => array('name' => 'percentage', 'type' => 'xsd:string'), 'author' => array('name' => 'author', 'type' => 'xsd:string'), 'usermod' => array('name' => 'usermod', 'type' => 'xsd:string'), 'userownerid' => array('name' => 'userownerid', 'type' => 'xsd:string'), 'priority' => array('name' => 'priority', 'type' => 'xsd:string'), 'fulldayevent' => array('name' => 'fulldayevent', 'type' => 'xsd:string'), 'location' => array('name' => 'location', 'type' => 'xsd:string'), 'socid' => array('name' => 'socid', 'type' => 'xsd:string'), 'contactid' => array('name' => 'contactid', 'type' => 'xsd:string'), 'projectid' => array('name' => 'projectid', 'type' => 'xsd:string'), 'fk_element' => array('name' => 'fk_element', 'type' => 'xsd:string'), 'elementtype' => array('name' => 'elementtype', 'type' => 'xsd:string'));
$elementtype = 'actioncomm';
//Retrieve all extrafield for actioncomm
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
 * Get ActionComm
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param	int			$id					Id of object
 * @return	mixed
 */
function getActionComm($authentication, $id)
{
}
/**
 * Get getListActionCommType
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @return	mixed
 */
function getListActionCommType($authentication)
{
}
/**
 * Create ActionComm
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,type_id:string,type_code:string,type:string,label:string,datep:int,datef:int,datec:int,datem:int,note:string,percentage:string,author:string,usermod:string,userownerid:string,priority:string,fulldayevent:string,location:string,socid:string,contactid:string,projectid:string,fk_element:string,elementtype:string}	$actioncomm		    $actioncomm
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function createActionComm($authentication, $actioncomm)
{
}
/**
 * Create ActionComm
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,type_id:string,type_code:string,type:string,label:string,datep:int,datef:int,datec:int,datem:int,note:string,percentage:string,author:string,usermod:string,userownerid:string,priority:string,fulldayevent:string,location:string,socid:string,contactid:string,projectid:string,fk_element:string,elementtype:string}	$actioncomm		    $actioncomm
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function updateActionComm($authentication, $actioncomm)
{
}