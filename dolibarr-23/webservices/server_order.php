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
$line_fields = array(
    'id' => array('name' => 'id', 'type' => 'xsd:string'),
    'type' => array('name' => 'type', 'type' => 'xsd:int'),
    'fk_commande' => array('name' => 'fk_commande', 'type' => 'xsd:int'),
    'fk_parent_line' => array('name' => 'fk_parent_line', 'type' => 'xsd:int'),
    'desc' => array('name' => 'desc', 'type' => 'xsd:string'),
    'qty' => array('name' => 'qty', 'type' => 'xsd:double'),
    'price' => array('name' => 'price', 'type' => 'xsd:double'),
    'unitprice' => array('name' => 'unitprice', 'type' => 'xsd:double'),
    'vat_rate' => array('name' => 'vat_rate', 'type' => 'xsd:double'),
    'remise' => array('name' => 'remise', 'type' => 'xsd:double'),
    'remise_percent' => array('name' => 'remise_percent', 'type' => 'xsd:double'),
    'total_net' => array('name' => 'total_net', 'type' => 'xsd:double'),
    'total_vat' => array('name' => 'total_vat', 'type' => 'xsd:double'),
    'total' => array('name' => 'total', 'type' => 'xsd:double'),
    'date_start' => array('name' => 'date_start', 'type' => 'xsd:date'),
    'date_end' => array('name' => 'date_end', 'type' => 'xsd:date'),
    // From product
    'product_id' => array('name' => 'product_id', 'type' => 'xsd:int'),
    'product_ref' => array('name' => 'product_ref', 'type' => 'xsd:string'),
    'product_label' => array('name' => 'product_label', 'type' => 'xsd:string'),
    'product_desc' => array('name' => 'product_desc', 'type' => 'xsd:string'),
);
$elementtype = 'commandedet';
//Retrieve all extrafield for thirdsparty
// fetch optionals attributes and labels
$extrafields = new \ExtraFields($db);
$extrafield_line_array = \null;
$order_fields = array('id' => array('name' => 'id', 'type' => 'xsd:string'), 'ref' => array('name' => 'ref', 'type' => 'xsd:string'), 'ref_client' => array('name' => 'ref_client', 'type' => 'xsd:string'), 'ref_ext' => array('name' => 'ref_ext', 'type' => 'xsd:string'), 'thirdparty_id' => array('name' => 'thirdparty_id', 'type' => 'xsd:int'), 'status' => array('name' => 'status', 'type' => 'xsd:int'), 'billed' => array('name' => 'billed', 'type' => 'xsd:string'), 'total_net' => array('name' => 'total_net', 'type' => 'xsd:double'), 'total_vat' => array('name' => 'total_vat', 'type' => 'xsd:double'), 'total_localtax1' => array('name' => 'total_localtax1', 'type' => 'xsd:double'), 'total_localtax2' => array('name' => 'total_localtax2', 'type' => 'xsd:double'), 'total' => array('name' => 'total', 'type' => 'xsd:double'), 'date' => array('name' => 'date', 'type' => 'xsd:date'), 'date_due' => array('name' => 'date_due', 'type' => 'xsd:date'), 'date_creation' => array('name' => 'date_creation', 'type' => 'xsd:dateTime'), 'date_validation' => array('name' => 'date_validation', 'type' => 'xsd:dateTime'), 'date_modification' => array('name' => 'date_modification', 'type' => 'xsd:dateTime'), 'source' => array('name' => 'source', 'type' => 'xsd:string'), 'note_private' => array('name' => 'note_private', 'type' => 'xsd:string'), 'note_public' => array('name' => 'note_public', 'type' => 'xsd:string'), 'project_id' => array('name' => 'project_id', 'type' => 'xsd:string'), 'mode_reglement_id' => array('name' => 'mode_reglement_id', 'type' => 'xsd:string'), 'mode_reglement_code' => array('name' => 'mode_reglement_code', 'type' => 'xsd:string'), 'mode_reglement' => array('name' => 'mode_reglement', 'type' => 'xsd:string'), 'cond_reglement_id' => array('name' => 'cond_reglement_id', 'type' => 'xsd:string'), 'cond_reglement_code' => array('name' => 'cond_reglement_code', 'type' => 'xsd:string'), 'cond_reglement' => array('name' => 'cond_reglement', 'type' => 'xsd:string'), 'cond_reglement_doc' => array('name' => 'cond_reglement_doc', 'type' => 'xsd:string'), 'date_livraison' => array('name' => 'date_livraison', 'type' => 'xsd:date'), 'demand_reason_id' => array('name' => 'demand_reason_id', 'type' => 'xsd:string'), 'lines' => array('name' => 'lines', 'type' => 'tns:LinesArray2'));
$elementtype = 'commande';
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
/**
 * Get order from id, ref or ref_ext.
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$id					Id
 * @param	string		$ref				Ref
 * @param	string		$ref_ext			Ref_ext
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getOrder($authentication, $id = 0, $ref = '', $ref_ext = '')
{
}
/**
 * Get list of orders for third party
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$idthirdparty		Id of thirdparty
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getOrdersForThirdParty($authentication, $idthirdparty)
{
}
/**
 * Create order
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param 	array{id:string,ref:string,ref_client:string,ref_ext:string,thirdparty_id:int,status:int,billed:string,total_net:float,total_vat:float,total_localtax1:float,total_localtax2:float,total:float,date:string,date_due:string,date_creation:string,date_validation:string,date_modification:string,source:string,note_private:string,note_public:string,project_id:string,mode_reglement_id:string,mode_reglement_code:string,mode_reglement:string,cond_reglement_id:string,cond_reglement_code:string,cond_reglement:string,cond_reglement_doc:string,date_livraison:int,demand_reason_id:string,lines:array<array{line:mixed,id:string,type:int,fk_commande:int,fk_parent_line:int,desc:string,qty:float,price:float,unitprice:float,vat_rate:float,remise:float,remise_percent:float,total_net:float,total_vat:float,total:float,date_start:string,date_end:string,product_id:int,product_ref:string,product_label:string,product_desc:string}>}		$order		Order info
 * @return 	array{result:array{result_code:string,result_label:string}} Array result
 */
function createOrder($authentication, $order)
{
}
/**
 * Valid an order
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$id					Id of order to validate
 * @param	int			$id_warehouse		Id of warehouse to use for stock decrease
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function validOrder($authentication, $id = 0, $id_warehouse = 0)
{
}
/**
 * Update an order
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,refext:string}	$order	Order info
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function updateOrder($authentication, $order)
{
}