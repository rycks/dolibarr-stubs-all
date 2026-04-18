<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
// Create associated types array, with each table
$listofreferent = array('propal' => 'propal', 'order' => 'commande', 'invoice' => 'facture', 'invoice_predefined' => 'facture_rec', 'proposal_supplier' => 'commande_fournisseur', 'order_supplier' => 'commande_fournisseur', 'invoice_supplier' => 'facture_fourn', 'contract' => 'contrat', 'intervention' => 'fichinter', 'trip' => 'deplacement', 'expensereport' => 'expensereport_det', 'donation' => 'don', 'agenda' => 'actioncomm', 'project_task' => 'projet_task');
// Create the soap Object
$server = new \nusoap_server();
$ns = 'http://www.dolibarr.org/ns/';
$project_elements = array();
// Define project
$project_fields = array('id' => array('name' => 'id', 'type' => 'xsd:string'), 'ref' => array('name' => 'ref', 'type' => 'xsd:string'), 'label' => array('name' => 'label', 'type' => 'xsd:string'), 'thirdparty_id' => array('name' => 'thirdparty_id', 'type' => 'xsd:int'), 'public' => array('name' => 'public', 'type' => 'xsd:int'), 'status' => array('name' => 'status', 'type' => 'xsd:int'), 'date_start' => array('name' => 'date_start', 'type' => 'xsd:date'), 'date_end' => array('name' => 'date_end', 'type' => 'xsd:date'), 'budget' => array('name' => 'budget', 'type' => 'xsd:int'), 'description' => array('name' => 'description', 'type' => 'xsd:string'), 'elements' => array('name' => 'elements', 'type' => 'tns:elements'));
$elementtype = 'project';
//Retrieve all extrafield for thirdsparty
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
 * Create project
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,label:string,thirdparty_id:int,public:int,status:int,date_start:string,date_end:string,budget:int,description:string,elements:array<array{id:int,user:int}>}		$project			Project info
 * @return array{id?:int,ref?:string,result:array{result_code:string,result_label:string}} Array result
 */
function createProject($authentication, $project)
{
}
/**
 * Get a project
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	string		$id		    		internal id
 * @param	string		$ref		    	internal reference
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getProject($authentication, $id = '', $ref = '')
{
}