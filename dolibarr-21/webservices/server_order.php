<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
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
 * @param array{id:string,ref:string,ref_client:string,ref_ext:string,thirdparty_id:int,status:int,billed:string,total_net:float,total_vat:float,total_localtax1:float,total_localtax2:float,total:float,date:string,date_creation:string,date_validation:string,date_modification:string,source:string,note_private:string,note_public:string,project_id:string,mode_reglement_id:string,mode_reglement_code:string,mode_reglement:string,cond_reglement_id:string,cond_reglement_code:string,cond_reglement:string,cond_reglement_doc:string,date_livraison:int,demand_reason_id:string,lines:array<array{id:string,type:int,fk_commande:int,fk_parent_line:int,desc:string,qty:float,price:float,unitprice:float,vat_rate:float,remise:float,remise_percent:float,total_net:float,total_vat:float,total:float,date_start:int,date_end:int,product_id:int,product_ref:string,product_label:string,product_desc:string}>}		$order		Order info
 * @return array{result:array{result_code:string,result_label:string}} Array result
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