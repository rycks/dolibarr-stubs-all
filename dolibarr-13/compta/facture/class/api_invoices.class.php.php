<?php

/**
 * API class for invoices
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Invoices extends \DolibarrApi
{
    /**
     *
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('socid');
    /**
     * @var Facture $invoice {@type Facture}
     */
    public $invoice;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a invoice object
     *
     * Return an array with invoice informations
     *
     * @param 	int 	$id           ID of invoice
     * @param   int     $contact_list 0:Return array contains all properties, 1:Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id, $contact_list = 1)
    {
    }
    /**
     * Get properties of an invoice object by ref
     *
     * Return an array with invoice informations
     *
     * @param       string		$ref			Ref of object
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @url GET    ref/{ref}
     *
     * @throws 	RestException
     */
    public function getByRef($ref, $contact_list = 1)
    {
    }
    /**
     * Get properties of an invoice object by ref_ext
     *
     * Return an array with invoice informations
     *
     * @param       string		$ref_ext			External reference of object
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @url GET    ref_ext/{ref_ext}
     *
     * @throws 	RestException
     */
    public function getByRefExt($ref_ext, $contact_list = 1)
    {
    }
    /**
     * Get properties of an invoice object
     *
     * Return an array with invoice informations
     *
     * @param       int         $id            ID of order
     * @param		string		$ref			Ref of object
     * @param		string		$ref_ext		External reference of object
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    private function _fetch($id, $ref = '', $ref_ext = '', $contact_list = 1)
    {
    }
    /**
     * List invoices
     *
     * Get a list of invoices
     *
     * @param string	$sortfield	      Sort field
     * @param string	$sortorder	      Sort order
     * @param int		$limit		      Limit for list
     * @param int		$page		      Page number
     * @param string   	$thirdparty_ids	  Thirdparty ids to filter orders of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string	$status		      Filter by invoice status : draft | unpaid | paid | cancelled
     * @param string    $sqlfilters       Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return array                      Array of invoice objects
     *
     * @throws RestException 404 Not found
     * @throws RestException 503 Error
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $status = '', $sqlfilters = '')
    {
    }
    /**
     * Create invoice object
     *
     * @param array $request_data   Request datas
     * @return int                  ID of invoice
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Create an invoice using an existing order.
     *
     *
     * @param int   $orderid       Id of the order
     *
     * @url     POST /createfromorder/{orderid}
     *
     * @return int
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function createInvoiceFromOrder($orderid)
    {
    }
    /**
     * Get lines of an invoice
     *
     * @param int   $id             Id of invoice
     *
     * @url	GET {id}/lines
     *
     * @return int
     */
    public function getLines($id)
    {
    }
    /**
     * Update a line to a given invoice
     *
     * @param int   $id             Id of invoice to update
     * @param int   $lineid         Id of line to update
     * @param array $request_data   InvoiceLine data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return array
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404 Invoice not found
     */
    public function putLine($id, $lineid, $request_data = \null)
    {
    }
    /**
     * Add a contact type of given invoice
     *
     * @param int    $id             Id of invoice to update
     * @param int    $contactid      Id of contact to add
     * @param string $type           Type of the contact (BILLING, SHIPPING, CUSTOMER)
     *
     * @url	POST {id}/contact/{contactid}/{type}
     *
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function postContact($id, $contactid, $type)
    {
    }
    /**
     * Delete a contact type of given invoice
     *
     * @param int    $id             Id of invoice to update
     * @param int    $contactid      Row key of the contact in the array contact_ids.
     * @param string $type           Type of the contact (BILLING, SHIPPING, CUSTOMER).
     *
     * @url	DELETE {id}/contact/{contactid}/{type}
     *
     * @return array
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     */
    public function deleteContact($id, $contactid, $type)
    {
    }
    /**
     * Deletes a line of a given invoice
     *
     * @param int   $id             Id of invoice
     * @param int   $lineid 		Id of the line to delete
     *
     * @url     DELETE {id}/lines/{lineid}
     *
     * @return array
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function deleteLine($id, $lineid)
    {
    }
    /**
     * Update invoice
     *
     * @param int   $id             Id of invoice to update
     * @param array $request_data   Datas
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete invoice
     *
     * @param int   $id 	Invoice ID
     * @return array
     */
    public function delete($id)
    {
    }
    /**
     * Add a line to a given invoice
     *
     * Exemple of POST query :
     * {
     *     "desc": "Desc", "subprice": "1.00000000", "qty": "1", "tva_tx": "20.000", "localtax1_tx": "0.000", "localtax2_tx": "0.000",
     *     "fk_product": "1", "remise_percent": "0", "date_start": "", "date_end": "", "fk_code_ventilation": 0,  "info_bits": "0",
     *     "fk_remise_except": null,  "product_type": "1", "rang": "-1", "special_code": "0", "fk_parent_line": null, "fk_fournprice": null,
     *     "pa_ht": "0.00000000", "label": "", "array_options": [], "situation_percent": "100", "fk_prev_id": null, "fk_unit": null
     * }
     *
     * @param int   $id             Id of invoice
     * @param array $request_data   InvoiceLine data
     *
     * @url     POST {id}/lines
     *
     * @return int
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 400
     */
    public function postLine($id, $request_data = \null)
    {
    }
    /**
     * Adds a contact to an invoice
     *
     * @param   int 	$id             	Order ID
     * @param   int 	$fk_socpeople       	Id of thirdparty contact (if source = 'external') or id of user (if souce = 'internal') to link
     * @param   string 	$type_contact           Type of contact (code). Must a code found into table llx_c_type_contact. For example: BILLING
     * @param   string  $source             	external=Contact extern (llx_socpeople), internal=Contact intern (llx_user)
     * @param   int     $notrigger              Disable all triggers
     *
     * @url POST    {id}/contacts
     *
     * @return  array
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     *
     */
    public function addContact($id, $fk_socpeople, $type_contact, $source, $notrigger = 0)
    {
    }
    /**
     * Sets an invoice as draft
     *
     * @param   int $id             Order ID
     * @param   int $idwarehouse    Warehouse ID
     *
     * @url POST    {id}/settodraft
     *
     * @return  array
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     *
     */
    public function settodraft($id, $idwarehouse = -1)
    {
    }
    /**
     * Validate an invoice
     *
     * If you get a bad value for param notrigger check that ou provide this in body
     * {
     *   "idwarehouse": 0,
     *   "notrigger": 0
     * }
     *
     * @param   int $id             Invoice ID
     * @param   int $idwarehouse    Warehouse ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @return  array
     */
    public function validate($id, $idwarehouse = 0, $notrigger = 0)
    {
    }
    /**
     * Sets an invoice as paid
     *
     * @param   int 	$id            Order ID
     * @param   string 	$close_code    Code filled if we classify to 'Paid completely' when payment is not complete (for escompte for example)
     * @param   string 	$close_note    Comment defined if we classify to 'Paid' when payment is not complete (for escompte for example)
     *
     * @url POST    {id}/settopaid
     *
     * @return  array 	An invoice object
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     */
    public function settopaid($id, $close_code = '', $close_note = '')
    {
    }
    /**
     * Sets an invoice as unpaid
     *
     * @param   int     $id            Order ID
     *
     * @url POST    {id}/settounpaid
     *
     * @return  array   An invoice object
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     */
    public function settounpaid($id)
    {
    }
    /**
     * Get discount from invoice
     *
     * @param int   $id             Id of invoice
     *
     * @url	GET {id}/discount
     *
     * @return mixed
     */
    public function getDiscount($id)
    {
    }
    /**
     * Create a discount (credit available) for a credit note or a deposit.
     *
     * @param   int 	$id            Invoice ID
     * @url POST    {id}/markAsCreditAvailable
     *
     * @return  array 	An invoice object
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     */
    public function markAsCreditAvailable($id)
    {
    }
    /**
     * Add a discount line into an invoice (as an invoice line) using an existing absolute discount
     *
     * Note that this consume the discount.
     *
     * @param int   $id             Id of invoice
     * @param int   $discountid     Id of discount
     *
     * @url     POST {id}/usediscount/{discountid}
     *
     * @return int
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function useDiscount($id, $discountid)
    {
    }
    /**
     * Add an available credit note discount to payments of an existing invoice.
     *
     *  Note that this consume the credit note.
     *
     * @param int   $id            Id of invoice
     * @param int   $discountid    Id of a discount coming from a credit note
     *
     * @url     POST {id}/usecreditnote/{discountid}
     *
     * @return int
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function useCreditNote($id, $discountid)
    {
    }
    /**
     * Get list of payments of a given invoice
     *
     * @param int   $id             Id of invoice
     *
     * @url     GET {id}/payments
     *
     * @return array
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function getPayments($id)
    {
    }
    /**
     * Add payment line to a specific invoice with the remain to pay as amount.
     *
     * @param int     $id                               Id of invoice
     * @param string  $datepaye           {@from body}  Payment date        {@type timestamp}
     * @param int     $paymentid          {@from body}  Payment mode Id {@min 1}
     * @param string  $closepaidinvoices  {@from body}  Close paid invoices {@choice yes,no}
     * @param int     $accountid          {@from body}  Account Id {@min 1}
     * @param string  $num_payment        {@from body}  Payment number (optional)
     * @param string  $comment            {@from body}  Note private (optional)
     * @param string  $chqemetteur        {@from body}  Payment issuer (mandatory if paymentcode = 'CHQ')
     * @param string  $chqbank            {@from body}  Issuer bank name (optional)
     *
     * @url     POST {id}/payments
     *
     * @return int  Payment ID
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     */
    public function addPayment($id, $datepaye, $paymentid, $closepaidinvoices, $accountid, $num_payment = '', $comment = '', $chqemetteur = '', $chqbank = '')
    {
    }
    /**
     * Add a payment to pay partially or completely one or several invoices.
     * Warning: Take care that all invoices are owned by the same customer.
     * Example of value for parameter arrayofamounts: {"1": {"amount": "99.99", "multicurrency_amount": ""}, "2": {"amount": "", "multicurrency_amount": "10"}}
     *
     * @param array   $arrayofamounts     {@from body}  Array with id of invoices with amount to pay for each invoice
     * @param string  $datepaye           {@from body}  Payment date        {@type timestamp}
     * @param int     $paymentid           {@from body}  Payment mode Id {@min 1}
     * @param string  $closepaidinvoices   {@from body}  Close paid invoices {@choice yes,no}
     * @param int     $accountid           {@from body}  Account Id {@min 1}
     * @param string  $num_payment         {@from body}  Payment number (optional)
     * @param string  $comment             {@from body}  Note private (optional)
     * @param string  $chqemetteur         {@from body}  Payment issuer (mandatory if paiementcode = 'CHQ')
     * @param string  $chqbank             {@from body}  Issuer bank name (optional)
     * @param string  $ref_ext             {@from body}  External reference (optional)
     * @param bool    $accepthigherpayment {@from body}  Accept higher payments that it remains to be paid (optional)
     *
     * @url     POST /paymentsdistributed
     *
     * @return int  Payment ID
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function addPaymentDistributed($arrayofamounts, $datepaye, $paymentid, $closepaidinvoices, $accountid, $num_payment = '', $comment = '', $chqemetteur = '', $chqbank = '', $ref_ext = '', $accepthigherpayment = \false)
    {
    }
    /**
     * Update a payment
     *
     * @param int       $id             Id of payment
     * @param string    $num_payment    Payment number
     *
     * @url     PUT payments/{id}
     *
     * @return array
     * @throws RestException 400 Bad parameters
     * @throws RestException 401 Not allowed
     * @throws RestException 404 Not found
     */
    public function putPayment($id, $num_payment = '')
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
     * @param array|null    $data       Datas to validate
     * @return array
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
}