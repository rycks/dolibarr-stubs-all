<?php

\define("NOCSRFCHECK", '1');
/**
 * Get invoice from id, ref or ref_ext
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$id					Id
 * @param	string		$ref				Ref
 * @param	string		$ref_ext			Ref_ext
 * @return	array							Array result
 */
function getSupplierInvoice($authentication, $id = '', $ref = '', $ref_ext = '')
{
}
/**
 * Get list of invoices for third party
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$idthirdparty		Id thirdparty
 * @return	array							Array result
 */
function getSupplierInvoicesForThirdParty($authentication, $idthirdparty)
{
}