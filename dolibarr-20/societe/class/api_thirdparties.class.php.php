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
     * @var array   $FIELDS     Mandatory fields, checked when we create and update the object
     */
    public static $FIELDS = array('name');
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
     * Return an array with thirdparty information
     *
     * @param	int		$id				Id of third party to load
     * @return  Object					Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * Get properties of a thirdparty object by email.
     *
     * Return an array with thirdparty information
     *
     * @param string    $email  Email of third party to load
     * @return array|mixed Cleaned Societe object
     *
     * @url     GET email/{email}
     *
     * @throws RestException
     */
    public function getByEmail($email)
    {
    }
    /**
     * Get properties of a thirdparty object by barcode.
     *
     * Return an array with thirdparty information
     *
     * @param string    $barcode  Barcode of third party to load
     * @return array|mixed Cleaned Societe object
     *
     * @url     GET barcode/{barcode}
     *
     * @throws RestException
     */
    public function getByBarcode($barcode)
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
     *								Set to 4 to show only suppliers
     * @param	int		$category   Use this param to filter list by category
     * @param   string  $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "((t.nom:like:'TheCompany%') or (t.name_alias:like:'TheCompany%')) and (t.datec:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return  array               Array of thirdparty objects
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $mode = 0, $category = 0, $sqlfilters = '', $properties = '')
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
     * @param 	int   			$id             Id of thirdparty to update
     * @param 	array 			$request_data   Datas
     * @return 	Object|false					Updated object
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Merge a third party into another one.
     *
     * Merge content (properties, notes) and objects (like invoices, events, orders, proposals, ...) of a thirdparty into a target third party,
     * then delete the merged third party.
     * If a property has a defined value both in third party to delete and third party to keep, the value into the third party to
     * delete will be ignored, the value of target thirdparty will remain, except for notes (content is concatenated).
     *
     * @param int   $id             ID of thirdparty to keep (the target third party)
     * @param int   $idtodelete     ID of thirdparty to remove (the thirdparty to delete), once data has been merged into the target third party.
     * @return Object				Return the resulted third party.
     *
     * @url PUT {id}/merge/{idtodelete}
     */
    public function merge($id, $idtodelete)
    {
    }
    /**
     * Delete thirdparty
     *
     * @param int $id   Thirdparty ID
     * @return array
     */
    public function delete($id)
    {
    }
    /**
     * Set new price level for the given thirdparty
     *
     * @param	int		$id				ID of thirdparty
     * @param	int		$priceLevel		Price level to apply to thirdparty
     * @return	Object					Thirdparty data without useless information
     *
     * @url PUT {id}/setpricelevel/{priceLevel}
     *
     * @throws RestException 400 Price level out of bounds
     * @throws RestException 401 Access not allowed for your login
     * @throws RestException 404 Thirdparty not found
     * @throws RestException 500 Error fetching/setting price level
     * @throws RestException 501 Request needs modules "Thirdparties" and "Products" and setting Multiprices activated
     */
    public function setThirdpartyPriceLevel($id, $priceLevel)
    {
    }
    /**
     * Add a customer representative to a thirdparty
     *
     * @param int		$id					Id of thirdparty
     * @param int       $representative_id	Id of representative
     * @return int							Return integer <=0 if KO, >0 if OK
     *
     * @url POST {id}/representative/{representative_id}
     *
     * @throws RestException 401 Access not allowed for your login
     * @throws RestException 404 User or Thirdparty not found
     */
    public function addRepresentative($id, $representative_id)
    {
    }
    /**
     * Delete a customer representative to a thirdparty
     *
     * @param int		$id					Id of thirdparty
     * @param int       $representative_id	Id of representative
     * @return int							Return integer <=0 if KO, >0 if OK
     *
     * @url DELETE {id}/representative/{representative_id}
     *
     * @throws RestException 401 Access not allowed for your login
     * @throws RestException 404 User or Thirdparty not found
     */
    public function deleteRepresentative($id, $representative_id)
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
     * @return array|void
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
     * @return Object|void
     *
     * @url PUT {id}/categories/{category_id}
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
     * @return Object|void
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
     * @url PUT {id}/supplier_categories/{category_id}
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
     * @param	int		$id			ID of the thirdparty
     * @param	string	$mode		'customer' or 'supplier'
     *
     * @url     GET {id}/outstandingproposals
     *
     * @return array				List of outstandings proposals of thirdparty
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getOutStandingProposals($id, $mode = 'customer')
    {
    }
    /**
     * Get outstanding orders of thirdparty
     *
     * @param	int		$id			ID of the thirdparty
     * @param	string	$mode		'customer' or 'supplier'
     *
     * @url     GET {id}/outstandingorders
     *
     * @return array				List of outstandings orders of thirdparty
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getOutStandingOrder($id, $mode = 'customer')
    {
    }
    /**
     * Get outstanding invoices of thirdparty
     *
     * @param	int		$id			ID of the thirdparty
     * @param	string	$mode		'customer' or 'supplier'
     *
     * @url     GET {id}/outstandinginvoices
     *
     * @return array				List of outstandings invoices of thirdparty
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getOutStandingInvoices($id, $mode = 'customer')
    {
    }
    /**
     * Get representatives of thirdparty
     *
     * @param	int		$id			ID of the thirdparty
     * @param	int 	$mode		0=Array with properties, 1=Array of id.
     *
     * @url     GET {id}/representatives
     *
     * @return array				List of representatives of thirdparty
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getSalesRepresentatives($id, $mode = 0)
    {
    }
    /**
     * Get fixed amount discount of a thirdparty (all sources: deposit, credit note, commercial offers...)
     *
     * @param	int		$id             ID of the thirdparty
     * @param	string	$filter		Filter exceptional discount. "none" will return every discount, "available" returns unapplied discounts, "used" returns applied discounts   {@choice none,available,used}
     * @param   string  $sortfield		Sort field
     * @param   string  $sortorder		Sort order
     *
     * @url     GET {id}/fixedamountdiscounts
     *
     * @return array  List of fixed discount of thirdparty
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 503
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
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function getInvoicesQualifiedForReplacement($id)
    {
    }
    /**
     * Return list of invoices qualified to be corrected by a credit note.
     * Invoices matching the following rules are returned
     * (validated + payment on process) or classified (paid completely or paid partially) + not already replaced + not already a credit note
     *
     * @param int   $id             Id of thirdparty
     *
     * @url     GET {id}/getinvoicesqualifiedforcreditnote
     *
     * @return array
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function getInvoicesQualifiedForCreditNote($id)
    {
    }
    /**
     * Get CompanyNotification objects for thirdparty
     *
     * @param int $id ID of thirdparty
     *
     * @return array
     *
     * @url GET {id}/notifications
     */
    public function getCompanyNotification($id)
    {
    }
    /**
     * Create CompanyNotification object for thirdparty
     * @param int  $id ID of thirdparty
     * @param array $request_data Request data
     *
     * @return array|mixed  Notification of thirdparty
     *
     * @url POST {id}/notifications
     */
    public function createCompanyNotification($id, $request_data = \null)
    {
    }
    /**
     * Delete a CompanyNotification attached to a thirdparty
     *
     * @param int $id ID of thirdparty
     * @param int $notification_id ID of CompanyNotification
     *
     * @return int -1 if error 1 if correct deletion
     *
     * @url DELETE {id}/notifications/{notification_id}
     */
    public function deleteCompanyNotification($id, $notification_id)
    {
    }
    /**
     * Update CompanyNotification object for thirdparty
     *
     * @param int $id ID of thirdparty
     * @param int  $notification_id ID of CompanyNotification
     * @param array $request_data Request data
     *
     * @return array|mixed  Notification of thirdparty
     *
     * @url PUT {id}/notifications/{notification_id}
     */
    public function updateCompanyNotification($id, $notification_id, $request_data = \null)
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
     * @return array|mixed  BankAccount of thirdparty
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
     * @return array|mixed  BankAccount of thirdparty
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
     * @param int		$id				Thirdparty id
     * @param int		$companybankid	Companybank id
     * @param string	$model			Model of document to generate
     * @return array
     *
     * @url GET {id}/generateBankAccountDocument/{companybankid}/{model}
     */
    public function generateBankAccountDocument($id, $companybankid = \null, $model = 'sepamandate')
    {
    }
    /**
     * Get a specific account attached to a thirdparty (by specifying the site key)
     *
     * @param int $id ID of thirdparty
     * @param string $site Site key
     *
     * @return array|mixed
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     *
     * @url GET {id}/accounts/
     */
    public function getSocieteAccounts($id, $site = \null)
    {
    }
    /**
     * Create and attach a new account to an existing thirdparty
     *
     * Possible fields for request_data (request body) are specified in <code>llx_societe_account</code> table.<br>
     * See <a href="https://wiki.dolibarr.org/index.php/Table_llx_societe_account">Table llx_societe_account</a> wiki page for more information<br><br>
     * <u>Example body payload :</u> <pre>{"key_account": "cus_DAVkLSs1LYyYI", "site": "stripe"}</pre>
     *
     * @param int $id ID of thirdparty
     * @param array $request_data Request data
     *
     * @return array|mixed
     *
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 409 Conflict: An Account already exists for this company and site.
     * @throws RestException 422 Unprocessable Entity: You must pass the site attribute in your request data !
     * @throws RestException 500 Internal Server Error: Error creating SocieteAccount account
     *
     * @url POST {id}/accounts
     */
    public function createSocieteAccount($id, $request_data = \null)
    {
    }
    /**
     * Create and attach a new (or replace an existing) specific site account to a thirdparty
     *
     * You <strong>MUST</strong> pass all values to keep (otherwise, they will be deleted) !<br>
     * If you just need to update specific fields prefer <code>PATCH /thirdparties/{id}/accounts/{site}</code> endpoint.<br><br>
     * When a <strong>SocieteAccount</strong> entity does not exist for the <code>id</code> and <code>site</code>
     * supplied, a new one will be created. In that case <code>fk_soc</code> and <code>site</code> members form
     * request body payload will be ignored and <code>id</code> and <code>site</code> query strings parameters
     * will be used instead.
     *
     * @param int $id ID of thirdparty
     * @param string $site Site key
     * @param array $request_data Request data
     *
     * @return array|mixed
     *
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 422 Unprocessable Entity: You must pass the site attribute in your request data !
     * @throws RestException 500 Internal Server Error: Error updating SocieteAccount entity
     *
     * @url PUT {id}/accounts/{site}
     */
    public function putSocieteAccount($id, $site, $request_data = \null)
    {
    }
    /**
     * Update specified values of a specific account attached to a thirdparty
     *
     * @param int		$id				Id of thirdparty
     * @param string	$site			Site key
     * @param array		$request_data	Request data
     *
     * @return array|mixed
     *
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     * @throws RestException 409 Conflict: Another SocieteAccount entity already exists for this thirdparty with this site key.
     * @throws RestException 500 Internal Server Error: Error updating SocieteAccount entity
     *
     * @url PATCH {id}/accounts/{site}
     */
    public function patchSocieteAccount($id, $site, $request_data = \null)
    {
    }
    /**
     * Delete a specific site account attached to a thirdparty (by account id)
     *
     * @param int $id ID of thirdparty
     * @param int $site Site key
     *
     * @return void
     * @throws RestException 401 Unauthorized: User does not have permission to delete thirdparties accounts
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     * @throws RestException 500 Internal Server Error: Error deleting SocieteAccount entity
     *
     * @url DELETE {id}/accounts/{site}
     */
    public function deleteSocieteAccount($id, $site)
    {
    }
    /**
     * Delete all accounts attached to a thirdparty
     *
     * @param int $id ID of thirdparty
     *
     * @return void
     * @throws RestException 401 Unauthorized: User does not have permission to delete thirdparties accounts
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     * @throws RestException 500 Internal Server Error: Error deleting SocieteAccount entity
     *
     * @url DELETE {id}/accounts
     */
    public function deleteSocieteAccounts($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object     Object to clean
     * @return  Object				Object with cleaned properties
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
    /**
     * Fetch properties of a thirdparty object.
     *
     * Return an array with thirdparty information
     *
     * @param    int	$rowid      Id of third party to load (Use 0 to get a specimen record, use null to use other search criteria)
     * @param    string	$ref        Reference of third party, name (Warning, this can return several records)
     * @param    string	$ref_ext    External reference of third party (Warning, this information is a free field not provided by Dolibarr)
     * @param    string	$barcode    Barcode of third party to load
     * @param    string	$idprof1		Prof id 1 of third party (Warning, this can return several records)
     * @param    string	$idprof2		Prof id 2 of third party (Warning, this can return several records)
     * @param    string	$idprof3		Prof id 3 of third party (Warning, this can return several records)
     * @param    string	$idprof4		Prof id 4 of third party (Warning, this can return several records)
     * @param    string	$idprof5		Prof id 5 of third party (Warning, this can return several records)
     * @param    string	$idprof6		Prof id 6 of third party (Warning, this can return several records)
     * @param    string	$email			Email of third party (Warning, this can return several records)
     * @param    string	$ref_alias  Name_alias of third party (Warning, this can return several records)
     * @return object cleaned Societe object
     *
     * @throws RestException
     */
    private function _fetch($rowid, $ref = '', $ref_ext = '', $barcode = '', $idprof1 = '', $idprof2 = '', $idprof3 = '', $idprof4 = '', $idprof5 = '', $idprof6 = '', $email = '', $ref_alias = '')
    {
    }
}