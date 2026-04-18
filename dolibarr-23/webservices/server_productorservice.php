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
$productorservice_fields = array(
    'id' => array('name' => 'id', 'type' => 'xsd:string'),
    'ref' => array('name' => 'ref', 'type' => 'xsd:string'),
    'ref_ext' => array('name' => 'ref_ext', 'type' => 'xsd:string'),
    'type' => array('name' => 'type', 'type' => 'xsd:string'),
    'label' => array('name' => 'label', 'type' => 'xsd:string'),
    'description' => array('name' => 'description', 'type' => 'xsd:string'),
    'date_creation' => array('name' => 'date_creation', 'type' => 'xsd:dateTime'),
    'date_modification' => array('name' => 'date_modification', 'type' => 'xsd:dateTime'),
    'note' => array('name' => 'note', 'type' => 'xsd:string'),
    'status_tobuy' => array('name' => 'status_tobuy', 'type' => 'xsd:string'),
    'status_tosell' => array('name' => 'status_tosell', 'type' => 'xsd:string'),
    'barcode' => array('name' => 'barcode', 'type' => 'xsd:string'),
    'barcode_type' => array('name' => 'barcode_type', 'type' => 'xsd:string'),
    'country_id' => array('name' => 'country_id', 'type' => 'xsd:string'),
    'country_code' => array('name' => 'country_code', 'type' => 'xsd:string'),
    'customcode' => array('name' => 'customcode', 'type' => 'xsd:string'),
    'price_net' => array('name' => 'price_net', 'type' => 'xsd:string'),
    'price' => array('name' => 'price', 'type' => 'xsd:string'),
    'price_min_net' => array('name' => 'price_min_net', 'type' => 'xsd:string'),
    'price_min' => array('name' => 'price_min', 'type' => 'xsd:string'),
    'price_base_type' => array('name' => 'price_base_type', 'type' => 'xsd:string'),
    'vat_rate' => array('name' => 'vat_rate', 'type' => 'xsd:string'),
    'vat_npr' => array('name' => 'vat_npr', 'type' => 'xsd:string'),
    'localtax1_tx' => array('name' => 'localtax1_tx', 'type' => 'xsd:string'),
    'localtax2_tx' => array('name' => 'localtax2_tx', 'type' => 'xsd:string'),
    'stock_alert' => array('name' => 'stock_alert', 'type' => 'xsd:string'),
    'stock_real' => array('name' => 'stock_real', 'type' => 'xsd:string'),
    'stock_pmp' => array('name' => 'stock_pmp', 'type' => 'xsd:string'),
    'warehouse_ref' => array('name' => 'warehouse_ref', 'type' => 'xsd:string'),
    // Used only for create or update to set which warehouse to use for stock correction if stock_real differs from database
    'canvas' => array('name' => 'canvas', 'type' => 'xsd:string'),
    'import_key' => array('name' => 'import_key', 'type' => 'xsd:string'),
    'dir' => array('name' => 'dir', 'type' => 'xsd:string'),
    'images' => array('name' => 'images', 'type' => 'tns:ImagesArray'),
);
$elementtype = 'product';
//Retrieve all extrafield for product
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
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$id					Id of object
 * @param	string		$ref				Ref of object
 * @param	string		$ref_ext			Ref external of object
 * @param   string      $lang               Lang to force
 * @return array{product?:mixed[],result:array{result_code:string,result_label:string}} Array result
 */
function getProductOrService($authentication, $id = 0, $ref = '', $ref_ext = '', $lang = '')
{
}
/**
 * Create an invoice
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,type:string,label:string,description:string,date_creation:string,date_modification:string,note:string,status_tobuy:string,status_tosell:string,barcode:string,barcode_type:string,country_id:string,country_code:string,customcode:string,price_net:string,price:string,price_min_net:string,price_min:string,price_base_type:string,vat_rate:string,vat_npr:string,localtax1_tx:string,localtax2_tx:string,stock_alert:string,stock_real:string,stock_pmp:string,warehouse_ref:string,canvas:string,import_key:string,dir:string,images:array<array{photo:string,photo_vignette:string,imgWidth:string,imgHeight:string}>}		$product			Product
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function createProductOrService($authentication, $product)
{
}
/**
 * Update a product or service
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,type:string,label:string,description:string,date_creation:string,date_modification:string,note:string,status_tobuy:string,status_tosell:string,barcode:string,barcode_type:string,country_id:string,country_code:string,customcode:string,price_net:string,price:string,price_min_net:string,price_min:string,price_base_type:string,vat_rate:string,vat_npr:string,localtax1_tx:string,localtax2_tx:string,stock_alert:string,stock_real:string,stock_pmp:string,warehouse_ref:string,canvas:string,import_key:string,dir:string,images:array<array{photo:string,photo_vignette:string,imgWidth:string,imgHeight:string}>}		$product			Product
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function updateProductOrService($authentication, $product)
{
}
/**
 * Delete a product or service
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	string		$listofidstring		List of id with comma
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function deleteProductOrService($authentication, $listofidstring)
{
}
/**
 * getListOfProductsOrServices
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array<string,mixed>		$filterproduct		Filter fields
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getListOfProductsOrServices($authentication, $filterproduct)
{
}
/**
 * Get list of products for a category
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$id					Category id
 * @param	string		$lang				Force lang
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getProductsForCategory($authentication, $id, $lang = '')
{
}