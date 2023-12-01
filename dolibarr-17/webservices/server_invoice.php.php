<?php

\define("NOCSRFCHECK", '1');
/**
 * Get invoice from id, ref or ref_ext.
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$id					Id
 * @param	string		$ref				Ref
 * @param	string		$ref_ext			Ref_ext
 * @return	array							Array result
 */
function getInvoice($authentication, $id = '', $ref = '', $ref_ext = '')
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
 * @param	array		$authentication		Array of authentication information
 * @param	string      $id_order			id of order to copy invoice from
 * @param	string      $ref_order			ref of order to copy invoice from
 * @param	string      $ref_ext_order		ref_ext of order to copy invoice from
 * @return	array							Array result
 */
function createInvoiceFromOrder($authentication, $id_order = '', $ref_order = '', $ref_ext_order = '')
{
}
/**
 * Uddate an invoice, only change the state of an invoice
 *
 * @param	array		$authentication		Array of authentication information
 * @param	Facture		$invoice			Invoice
 * @return	array							Array result
 */
function updateInvoice($authentication, $invoice)
{
}