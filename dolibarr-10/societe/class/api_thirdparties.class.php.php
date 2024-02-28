<?php

/**
 * API class for thirdparties
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 *
 */
class Thirdparties extends \DolibarrApi
{
    /**
     *
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('name');
    /**
     * @var Societe $company {@type Societe}
     */
    public $company;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a thirdparty object
     *
     * Return an array with thirdparty informations
     *
     * @param 	int 	$id ID of thirdparty
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List thirdparties
     *
     * Get a list of thirdparties
     *
     * @param   string  $sortfield  Sort field
     * @param   string  $sortorder  Sort order
     * @param   int     $limit      Limit for list
     * @param   int     $page       Page number
     * @param   int     $mode       Set to 1 to show only customers
     *                              Set to 2 to show only prospects
     *                              Set to 3 to show only those are not customer neither prospect
     * @param   string  $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.nom:like:'TheCompany%') and (t.date_creation:<:'20160101')"
     * @return  array               Array of thirdparty objects
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $mode = 0, $sqlfilters = '')
    {
    }
    /**
     * Create thirdparty object
     *
     * @param array $request_data   Request datas
     * @return int  ID of thirdparty
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update thirdparty
     *
     * @param int   $id             Id of thirdparty to update
     * @param array $request_data   Datas
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Merge a thirdparty into another one.
     *
     * Merge content (properties, notes) and objects (like invoices, events, orders, proposals, ...) of a thirdparty into a target thirdparty,
     * then delete the merged thirdparty.
     * If a property has a defined value both in thirdparty to delete and thirdparty to keep, the value into the thirdparty to
     * delete will be ignored, the value of target thirdparty will remain, except for notes (content is concatenated).
     *
     * @param int   $id             ID of thirdparty to keep (the target thirdparty)
     * @param int   $idtodelete     ID of thirdparty to remove (the thirdparty to delete), once data has been merged into the target thirdparty.
     * @return int
     *
     * @url PUT {id}/merge/{idtodelete}
     */
    public function merge($id, $idtodelete)
    {
    }
    /**
     * Delete thirdparty
     *
     * @param int $id   Thirparty ID
     * @return integer
     */
    public function delete($id)
    {
    }
    /**
     * Get customer categories for a thirdparty
     *
     * @param int		$id         ID of thirdparty
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     *
     * @return mixed
     *
     * @url GET {id}/categories
     */
    public function getCategories($id, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    /**
     * Add a customer category to a thirdparty
     *
     * @param int		$id				Id of thirdparty
     * @param int       $category_id	Id of category
     *
     * @return mixed
     *
     * @url POST {id}/categories/{category_id}
     */
    public function addCategory($id, $category_id)
    {
    }
    /**
     * Remove the link between a customer category and the thirdparty
     *
     * @param int		$id				Id of thirdparty
     * @param int		$category_id	Id of category
     *
     * @return mixed
     *
     * @url DELETE {id}/categories/{category_id}
     */
    public function deleteCategory($id, $category_id)
    {
    }
    /**
     * Get supplier categories for a thirdparty
     *
     * @param int		$id         ID of thirdparty
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     *
     * @return mixed
     *
     * @url GET {id}/supplier_categories
     */
    public function getSupplierCategories($id, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    /**
     * Add a supplier category to a thirdparty
     *
     * @param int		$id				Id of thirdparty
     * @param int       $category_id	Id of category
     *
     * @return mixed
     *
     * @url POST {id}/supplier_categories/{category_id}
     */
    public function addSupplierCategory($id, $category_id)
    {
    }
    /**
     * Remove the link between a category and the thirdparty
     *
     * @param int		$id				Id of thirdparty
     * @param int		$category_id	Id of category
     *
     * @return mixed
     *
     * @url DELETE {id}/supplier_categories/{category_id}
     */
    public function deleteSupplierCategory($id, $category_id)
    {
    }
    /**
     * Get outstanding proposals of thirdparty
     *
     * @param 	int 	$id			ID of the thirdparty
     * @param 	string 	$mode		'customer' or 'supplier'
     *
     * @url     GET {id}/outstandingproposals
     *
     * @return array  				List of outstandings proposals of thirdparty
     *
     * @throws 400
     * @throws 401
     * @throws 404
     */
    public function getOutStandingProposals($id, $mode = 'customer')
    {
    }
    /**
     * Get outstanding orders of thirdparty
     *
     * @param 	int 	$id			ID of the thirdparty
     * @param 	string 	$mode		'customer' or 'supplier'
     *
     * @url     GET {id}/outstandingorders
     *
     * @return array  				List of outstandings orders of thirdparty
     *
     * @throws 400
     * @throws 401
     * @throws 404
     */
    public function getOutStandingOrder($id, $mode = 'customer')
    {
    }
    /**
     * Get outstanding invoices of thirdparty
     *
     * @param 	int 	$id			ID of the thirdparty
     * @param 	string 	$mode		'customer' or 'supplier'
     *
     * @url     GET {id}/outstandinginvoices
     *
     * @return array  				List of outstandings invoices of thirdparty
     *
     * @throws 400
     * @throws 401
     * @throws 404
     */
    public function getOutStandingInvoices($id, $mode = 'customer')
    {
    }
    /**
     * Get fixed amount discount of a thirdparty (all sources: deposit, credit note, commercial offers...)
     *
     * @param 	int 	$id             ID of the thirdparty
     * @param 	string 	$filter    	Filter exceptional discount. "none" will return every discount, "available" returns unapplied discounts, "used" returns applied discounts   {@choice none,available,used}
     * @param   string  $sortfield  	Sort field
     * @param   string  $sortorder  	Sort order
     *
     * @url     GET {id}/fixedamountdiscounts
     *
     * @return array  List of fixed discount of thirdparty
     *
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 503
     */
    public function getFixedAmountDiscounts($id, $filter = "none", $sortfield = "f.type", $sortorder = 'ASC')
    {
    }
    /**
     * Return list of invoices qualified to be replaced by another invoice.
     *
     * @param int   $id             Id of thirdparty
     *
     * @url     GET {id}/getinvoicesqualifiedforreplacement
     *
     * @return array
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 405
     */
    public function getInvoicesQualifiedForReplacement($id)
    {
    }
    /**
     * Return list of invoices qualified to be corrected by a credit note.
     * Invoices matching the following rules are returned
     * (validated + payment on process) or classified (payed completely or payed partialy) + not already replaced + not already a credit note
     *
     * @param int   $id             Id of thirdparty
     *
     * @url     GET {id}/getinvoicesqualifiedforcreditnote
     *
     * @return array
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 405
     */
    public function getInvoicesQualifiedForCreditNote($id)
    {
    }
    /**
     * Get CompanyBankAccount objects for thirdparty
     *
     * @param int $id ID of thirdparty
     *
     * @return array
     *
     * @url GET {id}/bankaccounts
     */
    public function getCompanyBankAccount($id)
    {
    }
    /**
     * Create CompanyBankAccount object for thirdparty
     * @param int  $id ID of thirdparty
     * @param array $request_data Request data
     *
     * @return object  ID of thirdparty
     *
     * @url POST {id}/bankaccounts
     */
    public function createCompanyBankAccount($id, $request_data = \null)
    {
    }
    /**
     * Update CompanyBankAccount object for thirdparty
     *
     * @param int $id ID of thirdparty
     * @param int  $bankaccount_id ID of CompanyBankAccount
     * @param array $request_data Request data
     *
     * @return object  ID of thirdparty
     *
     * @url PUT {id}/bankaccounts/{bankaccount_id}
     */
    public function updateCompanyBankAccount($id, $bankaccount_id, $request_data = \null)
    {
    }
    /**
     * Delete a bank account attached to a thirdparty
     *
     * @param int $id ID of thirdparty
     * @param int $bankaccount_id ID of CompanyBankAccount
     *
     * @return int -1 if error 1 if correct deletion
     *
     * @url DELETE {id}/bankaccounts/{bankaccount_id}
     */
    public function deleteCompanyBankAccount($id, $bankaccount_id)
    {
    }
    /**
     * Generate a Document from a bank account record (like SEPA mandate)
     *
     * @param int 		$id 			Thirdparty id
     * @param int 		$companybankid 	Companybank id
     * @param string 	$model 			Model of document to generate
     * @return void
     *
     * @url GET {id}/generateBankAccountDocument/{companybankid}/{model}
     */
    public function generateBankAccountDocument($id, $companybankid = \null, $model = 'sepamandate')
    {
    }
    /**
     * Get a specific gateway attached to a thirdparty (by specifying the site key)
     *
     * @param int $id ID of thirdparty
     * @param string $site Site key
     *
     * @return SocieteAccount[]
     * @throws 401 Unauthorized: User does not have permission to read thirdparties
     * @throws 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     *
     * @url GET {id}/gateways/
     */
    public function getSocieteAccounts($id, $site = \null)
    {
    }
    /**
     * Create and attach a new gateway to an existing thirdparty
     *
     * Possible fields for request_data (request body) are specified in <code>llx_societe_account</code> table.<br>
     * See <a href="https://wiki.dolibarr.org/index.php/Table_llx_societe_account">Table llx_societe_account</a> wiki page for more information<br><br>
     * <u>Example body payload :</u> <pre>{"key_account": "cus_DAVkLSs1LYyYI", "site": "stripe"}</pre>
     *
     * @param int $id ID of thirdparty
     * @param array $request_data Request data
     *
     * @return SocieteAccount
     * @throws 401 Unauthorized: User does not have permission to read thirdparties
     * @throws 409 Conflict: A SocieteAccount entity (gateway) already exists for this company and site.
     * @throws 422 Unprocessable Entity: You must pass the site attribute in your request data !
     * @throws 500 Internal Server Error: Error creating SocieteAccount account
     * @status 201
     *
     * @url POST {id}/gateways
     */
    public function createSocieteAccount($id, $request_data = \null)
    {
    }
    /**
     * Create and attach a new (or replace an existing) specific site gateway to a thirdparty
     *
     * You <strong>MUST</strong> pass all values to keep (otherwise, they will be deleted) !<br>
     * If you just need to update specific fields prefer <code>PATCH /thirdparties/{id}/gateways/{site}</code> endpoint.<br><br>
     * When a <strong>SocieteAccount</strong> entity does not exist for the <code>id</code> and <code>site</code>
     * supplied, a new one will be created. In that case <code>fk_soc</code> and <code>site</code> members form
     * request body payload will be ignored and <code>id</code> and <code>site</code> query strings parameters
     * will be used instead.
     *
     * @param int $id ID of thirdparty
     * @param string $site Site key
     * @param array $request_data Request data
     *
     * @return SocieteAccount
     * @throws 401 Unauthorized: User does not have permission to read thirdparties
     * @throws 422 Unprocessable Entity: You must pass the site attribute in your request data !
     * @throws 500 Internal Server Error: Error updating SocieteAccount entity
     *
     * @throws RestException
     * @url PUT {id}/gateways/{site}
     */
    public function putSocieteAccount($id, $site, $request_data = \null)
    {
    }
    /**
     * Update specified values of a specific site gateway attached to a thirdparty
     *
     * @param int $id Id of thirdparty
     * @param string  $site Site key
     * @param array $request_data Request data
     *
     * @return SocieteAccount
     * @throws 401 Unauthorized: User does not have permission to read thirdparties
     * @throws 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     * @throws 409 Conflict: Another SocieteAccount entity already exists for this thirdparty with this site key.
     * @throws 500 Internal Server Error: Error updating SocieteAccount entity
     *
     * @url PATCH {id}/gateways/{site}
     */
    public function patchSocieteAccount($id, $site, $request_data = \null)
    {
    }
    /**
     * Delete a specific site gateway attached to a thirdparty (by gateway id)
     *
     * @param int $id ID of thirdparty
     * @param int $site Site key
     *
     * @return void
     * @throws 401 Unauthorized: User does not have permission to delete thirdparties gateways
     * @throws 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     * @throws 500 Internal Server Error: Error deleting SocieteAccount entity
     *
     * @url DELETE {id}/gateways/{site}
     */
    public function deleteSocieteAccount($id, $site)
    {
    }
    /**
     * Delete all gateways attached to a thirdparty
     *
     * @param int $id ID of thirdparty
     *
     * @return void
     * @throws RestException(401) Unauthorized: User does not have permission to delete thirdparties gateways
     * @throws RestException(404) Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     * @throws RestException(500) Internal Server Error: Error deleting SocieteAccount entity
     *
     * @url DELETE {id}/gateways
     */
    public function deleteSocieteAccounts($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   object  $object    Object to clean
     * @return    array    Array of cleaned object properties
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