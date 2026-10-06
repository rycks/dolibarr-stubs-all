<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Get invoice from id, ref or ref_ext
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$id					Id
 * @param	string		$ref				Ref
 * @param	string		$ref_ext			Ref_ext
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getSupplierInvoice($authentication, $id = 0, $ref = '', $ref_ext = '')
{
}
/**
 * Get list of invoices for third party
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$idthirdparty		Id thirdparty
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getSupplierInvoicesForThirdParty($authentication, $idthirdparty)
{
}