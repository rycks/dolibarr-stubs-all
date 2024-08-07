<?php

/**
 * API class for supplier invoices
 *
 * @property DoliDB $db
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class SupplierInvoices extends \DolibarrApi
{
    /**
     *
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('socid');
    /**
     * @var FactureFournisseur $invoice {@type FactureFournisseur}
     */
    public $invoice;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a supplier invoice object
     *
     * Return an array with supplier invoice information
     *
     * @param	int		$id				ID of supplier invoice
     * @return  Object					Object with cleaned properties
     *
     * @throws 	RestException 403
     * @throws 	RestException 404
     */
    public function get($id)
    {
    }
    /**
     * List invoices
     *
     * Get a list of supplier invoices
     *
     * @param string	$sortfield		  Sort field
     * @param string	$sortorder		  Sort order
     * @param int		$limit			  Limit for list
     * @param int		$page			  Page number
     * @param string	$thirdparty_ids	  Thirdparty ids to filter invoices of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string	$status			  Filter by invoice status : draft | unpaid | paid | cancelled
     * @param string    $sqlfilters       Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.datec:<:'20160101')"
     * @param string    $properties		  Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return array                      Array of invoice objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $status = '', $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create supplier invoice object
     *
     * Note: soc_id = dolibarr_order_id
     *
     * Example: {'ref': 'auto', 'ref_supplier': '7985630', 'socid': 1, 'note': 'Inserted with Python', 'order_supplier': 1, 'date': '2021-07-28'}
     *
     * @param array $request_data Request datas
     *
     * @return int  ID of supplier invoice
     *
     * @throws RestException 403
     * @throws RestException 500	System error
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update supplier invoice
     *
     * @param 	int   	$id             	Id of supplier invoice to update
     * @param 	array 	$request_data  		Datas
     * @return 	Object|false				Updated object
     *
     * @throws RestException 403
     * @throws RestException 404
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete supplier invoice
     *
     * @param int   $id Supplier invoice ID
     *
     * @return array
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500	System error
     */
    public function delete($id)
    {
    }
    /**
     * Validate an invoice
     *
     * @param   int $id             Invoice ID
     * @param   int $idwarehouse    Warehouse ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @return  array
     *
     * @throws RestException 304
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 405
     * @throws RestException 500	System error
     */
    public function validate($id, $idwarehouse = 0, $notrigger = 0)
    {
    }
    /**
     * Get list of payments of a given supplier invoice
     *
     * @param int   $id             Id of SupplierInvoice
     *
     * @url     GET {id}/payments
     *
     * @return array
     * @throws RestException 400
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 405
     */
    public function getPayments($id)
    {
    }
    /**
     * Add payment line to a specific supplier invoice with the remain to pay as amount.
     *
     * @param int     $id                               Id of invoice
     * @param int     $datepaye           {@from body}  Payment date        {@type timestamp}
     * @param int     $payment_mode_id    {@from body}  Payment mode ID (look it up via REST GET to /setup/dictionary/payment_types) {@min 1}
     * @param string  $closepaidinvoices  {@from body}  Close paid invoices {@choice yes,no}
     * @param int     $accountid          {@from body}  Bank account ID (look it up via REST GET to /bankaccounts) {@min 1}
     * @param string  $num_payment        {@from body}  Payment number (optional)
     * @param string  $comment            {@from body}  Note (optional)
     * @param string  $chqemetteur        {@from body}  Payment issuer (mandatory if payment_mode_id corresponds to 'CHQ'-payment type)
     * @param string  $chqbank            {@from body}  Issuer bank name (optional)
     * @param float   $amount			  {@from body}  Amount of payment if we don't want to use the remain to pay
     *
     * @url     POST {id}/payments
     *
     * @return int  Payment ID
     *
     * @throws RestException 400
     * @throws RestException 403
     * @throws RestException 404
     */
    public function addPayment($id, $datepaye, $payment_mode_id, $closepaidinvoices, $accountid, $num_payment = '', $comment = '', $chqemetteur = '', $chqbank = '', $amount = \null)
    {
    }
    /**
     * Get lines of a supplier invoice
     *
     * @param int   $id             Id of supplier invoice
     *
     * @url	GET {id}/lines
     *
     * @return array
     *
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getLines($id)
    {
    }
    /**
     * Add a line to given supplier invoice
     *
     * Note: socid = dolibarr_order_id, pu_ht = net price, remise = discount
     *
     * Example: {'socid': 1, 'qty': 1, 'pu_ht': 21.0, 'tva_tx': 25.0, 'fk_product': '1189', 'product_type': 0, 'remise_percent': 1.0, 'vat_src_code': None}
     *
     * @param int   $id             Id of supplier invoice to update
     * @param array $request_data   supplier invoice line data
     *
     * @url	POST {id}/lines
     *
     * @return int|bool
     *
     * @throws RestException 403
     * @throws RestException 404
     */
    public function postLine($id, $request_data = \null)
    {
    }
    /**
     * Update a line to a given supplier invoice
     *
     * @param int   $id             Id of supplier invoice to update
     * @param int   $lineid         Id of line to update
     * @param array $request_data   InvoiceLine data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return object
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 304 Error
     */
    public function putLine($id, $lineid, $request_data = \null)
    {
    }
    /**
     * Deletes a line of a given supplier invoice
     *
     * @param int   $id             Id of supplier invoice
     * @param int   $lineid			Id of the line to delete
     *
     * @url     DELETE {id}/lines/{lineid}
     *
     * @return array
     *
     * @throws RestException 400 Bad parameters
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 405 Error
     */
    public function deleteLine($id, $lineid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param array $data   Datas to validate
     * @return array
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
}