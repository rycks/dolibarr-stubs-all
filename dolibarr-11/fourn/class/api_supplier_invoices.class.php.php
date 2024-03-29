<?php

/**
 * API class for supplier invoices
 *
 * @property DoliDB db
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class SupplierInvoices extends \DolibarrApi
{
    /**
     *
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('socid');
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
     * @param 	int 	$id ID of supplier invoice
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List invoices
     *
     * Get a list of supplier invoices
     *
     * @param string	$sortfield	      Sort field
     * @param string	$sortorder	      Sort order
     * @param int		$limit		      Limit for list
     * @param int		$page		      Page number
     * @param string   	$thirdparty_ids	  Thirdparty ids to filter invoices of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string	$status		      Filter by invoice status : draft | unpaid | paid | cancelled
     * @param string    $sqlfilters       Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.datec:<:'20160101')"
     * @return array                      Array of invoice objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $status = '', $sqlfilters = '')
    {
    }
    /**
     * Create supplier invoice object
     *
     * @param array $request_data Request datas
     *
     * @return int  ID of supplier invoice
     *
     * @throws 401
     * @throws 500
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update supplier invoice
     *
     * @param int   $id             Id of supplier invoice to update
     * @param array $request_data   Datas
     *
     * @return int
     *
     * @throws 401
     * @throws 404
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
     * @throws 401
     * @throws 404
     * @throws 500
     */
    public function delete($id)
    {
    }
    /**
     * Validate an order
     *
     * @param   int $id             Order ID
     * @param   int $idwarehouse    Warehouse ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @return  array
     *
     * @throws 304
     * @throws 401
     * @throws 404
     * @throws 405
     * @throws 500
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
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 405
     */
    public function getPayments($id)
    {
    }
    /**
     * Add payment line to a specific supplier invoice with the remain to pay as amount.
     *
     * @param int     $id                               Id of invoice
     * @param string  $datepaye           {@from body}  Payment date        {@type timestamp}
     * @param int     $paiementid         {@from body}  Payment mode Id {@min 1}
     * @param string  $closepaidinvoices  {@from body}  Close paid invoices {@choice yes,no}
     * @param int     $accountid          {@from body}  Account Id {@min 1}
     * @param string  $num_paiement       {@from body}  Payment number (optional)
     * @param string  $comment            {@from body}  Note (optional)
     * @param string  $chqemetteur        {@from body}  Payment issuer (mandatory if paiementcode = 'CHQ')
     * @param string  $chqbank            {@from body}  Issuer bank name (optional)
     *
     * @url     POST {id}/payments
     *
     * @return int  Payment ID
     * @throws 400
     * @throws 401
     * @throws 404
     */
    public function addPayment($id, $datepaye, $paiementid, $closepaidinvoices, $accountid, $num_paiement = '', $comment = '', $chqemetteur = '', $chqbank = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object    Object to clean
     * @return  array              Array of cleaned object properties
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