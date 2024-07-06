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
 * @param	array		$authentication		Array of authentication information
 * @param	int			$id					Id
 * @param	string		$ref				Ref
 * @param	string		$ref_ext			Ref_ext
 * @return	array							Array result
 */
function getInvoice($authentication, $id = 0, $ref = '', $ref_ext = '')
{
}
/**
 * Get list of invoices for third party
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$idthirdparty		Id thirdparty
 * @return	array							Array result
 */
function getInvoicesForThirdParty($authentication, $idthirdparty)
{
}
/**
 * Create an invoice
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$invoice			Invoice
 * @return	array							Array result
 */
function createInvoice($authentication, $invoice)
{
}
/**
 * Create an invoice from an order
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param	string      $id_order			id of order to copy invoice from
 * @param	string      $ref_order			ref of order to copy invoice from
 * @param	string      $ref_ext_order		ref_ext of order to copy invoice from
 * @return	array{result:array{result_code:string,result_label:string},id?:int,ref?:string,ref_ext?:string}	Array result
 */
function createInvoiceFromOrder($authentication, $id_order = '', $ref_order = '', $ref_ext_order = '')
{
}
/**
 * Update an invoice, only change the state of an invoice
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,status?:string}			$invoice			Invoice
 * @return	array{result:array{result_code:string,result_label:string},id?:int,ref?:string,ref_ext?:string}	Array result
 */
function updateInvoice($authentication, $invoice)
{
}