<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Get invoice from id, ref or ref_ext.
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$id					Id
 * @param	string		$ref				Ref
 * @param	string		$ref_ext			Ref_ext
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getInvoice($authentication, $id = 0, $ref = '', $ref_ext = '')
{
}
/**
 * Get list of invoices for third party
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$idthirdparty		Id thirdparty
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getInvoicesForThirdParty($authentication, $idthirdparty)
{
}
/**
 * Create an invoice
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,thirdparty_id:int,fk_user_author:string,fk_user_valid:string,date:string,date_due:string,date_creation:string,date_validation:string,date_modification:string,payment_mode_id:string,type:int,total_net:float,total_vat:float,total:float,note_private:string,note_public:string,status:int,close_code:string,close_note:string,project_id:string,lines?:array<array{id:string,type:int,desc:string,vat_rate:float,qty:float,unitprice:float,total_net:float,total_vat:float,total:float,date_start:string,date_end:string,product_id:int,product_ref:string,product_label:string,product_desc:string}>}		$invoice			Invoice
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function createInvoice($authentication, $invoice)
{
}
/**
 * Create an invoice from an order
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param	int         $id_order			id of order to copy invoice from
 * @param	string      $ref_order			ref of order to copy invoice from
 * @param	string      $ref_ext_order		ref_ext of order to copy invoice from
 * @return	array{result:array{result_code:string,result_label:string},id?:int,ref?:string,ref_ext?:string}	Array result
 */
function createInvoiceFromOrder($authentication, $id_order = 0, $ref_order = '', $ref_ext_order = '')
{
}
/**
 * Update an invoice, only change the state of an invoice
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,status?:string,close_code?:int,close_note?:int}	$invoice			Invoice
 * @return	array{result:array{result_code:string,result_label:string},id?:int,ref?:string,ref_ext?:string}	Array result
 */
function updateInvoice($authentication, $invoice)
{
}