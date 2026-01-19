<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
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