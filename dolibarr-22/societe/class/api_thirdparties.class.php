<?php

/**
 * API class for thirdparties
 *
 * @since	3.8.0	Initial implementation
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Thirdparties extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when we create and update the object
     */
    public static $FIELDS = array('name');
    /**
     * @var Societe {@type Societe}
     */
    public $company;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get a third party
     *
     * Return the third party object
     *
     * @since	3.8.0	Initial implementation
     *
     * @param	int		$id				ID of the third party to load
     * @return	Object					Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * Get properties of a third party by email.
     *
     * Return an array with third party information
     *
     * @since	11.0.0		Initial implementation
     *
     * @param	string		$email		Email of the third party to load
     * @return	array|mixed				Cleaned Societe object
     * @phan-return Societe
     * @phpstan-return Societe
     *
     * @url		GET			email/{email}
     *
     * @throws RestException
     */
    public function getByEmail($email)
    {
    }
    /**
     * Get a third party by barcode.
     *
     * Return an array with third party information
     *
     * @since	13.0.0			Initial implementation
     *
     * @param	string		$barcode	Barcode of the third party
     * @return	array|mixed				Cleaned Societe object
     *
     * @url		GET			barcode/{barcode}
     *
     * @throws RestException
     */
    public function getByBarcode($barcode)
    {
    }
    /**
     * List third parties
     *
     * Get a list of third parties
     *
     * @since	3.8.0	Initial implementation
     *
     * @param	string	$sortfield		S	ort field
     * @param	string	$sortorder			Sort order
     * @param	int		$limit				List limit
     * @param	int		$page				Page number
     * @param	int		$mode				Set to 0 to show all third parties, Set to 1 to show only customers, 2 for prospects, 3 for neither customer or prospect, 4 for suppliers
     * @param	int		$category			Use this param to filter the list by category
     * @param	string	$sqlfilters			Other criteria to filter answers separated by a comma. Syntax example "((t.nom:like:'TheCompany%') or (t.name_alias:like:'TheCompany%')) and (t.datec:<:'20160101')"
     * @param	string	$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param	bool	$pagination_data	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return	array						Array of thirdparty objects
     * @phan-return Societe[]|array{data:Societe[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return Societe[]|array{data:Societe[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $mode = 0, $category = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create a third party
     *
     * @since	3.8.0	Initial implementation
     *
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	int		ID of third party
     *
     * @throws RestException
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update third party
     *
     * @since	3.8.0	Initial implementation
     *
     * @param	int				$id				ID of thirdparty to update
     * @param	array 			$request_data	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object							Updated object
     * @phan-return Societe
     * @phpstan-return Societe
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Merge a third party into another third party
     *
     * Merge content (properties, notes) and objects (like invoices, events, orders, proposals, ...) of a third party into a target third party,
     * then delete the merged third party.
     * If a property has a defined value both in the third party to delete and the third party to keep, the value of the third party to
     * delete will be ignored, the value of the target third party will remain, except for notes (content is concatenated).
     *
     * @since	7.0.0	Initial implementation
     *
     * @param 	int   	$id             ID of thirdparty to keep (the target third party)
     * @param 	int   	$idtodelete     ID of thirdparty to remove (the third party to delete), once data has been merged into the target third party.
     * @return 	Object					Return the resulted third party.
     *
     * @phan-return Societe
     * @phpstan-return Societe
     *
     * @url		PUT		{id}/merge/{idtodelete}
     *
     * @throws RestException
     */
    public function merge($id, $idtodelete)
    {
    }
    /**
     * Delete a third party
     *
     * @since	3.8.0	Initial implementation
     *
     * @param	int		$id		ID of the third party
     * @return	array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException
     */
    public function delete($id)
    {
    }
    /**
     * Set a new price level for the given third party
     *
     * @since	13.0.0	Initial implementation
     *
     * @param	int		$id				ID of thirdparty
     * @param	int		$priceLevel		Price level to apply to thirdparty
     * @return	Object					Thirdparty data without useless information
     *
     * @url		PUT		{id}/setpricelevel/{priceLevel}
     *
     * @throws RestException 400 Price level out of bounds
     * @throws RestException 401 Access not allowed for your login
     * @throws RestException 404 Third party not found
     * @throws RestException 500 Error fetching/setting price level
     * @throws RestException 501 Request needs modules "Thirdparties" and "Products" and setting Multiprices activated
     */
    public function setThirdpartyPriceLevel($id, $priceLevel)
    {
    }
    /**
     * Add a customer representative to a third party
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	int		$id					ID of the third party
     * @param	int		$representative_id	ID of representative
     * @return	int							Return integer <=0 if KO, >0 if OK
     *
     * @url		POST	{id}/representative/{representative_id}
     *
     * @throws RestException 401 Access not allowed for your login
     * @throws RestException 404 User or Third party not found
     */
    public function addRepresentative($id, $representative_id)
    {
    }
    /**
     * Remove the link between a customer representative and a third party
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	int		$id					ID of the third party
     * @param	int		$representative_id	ID of representative
     * @return	int							Return integer <=0 if KO, >0 if OK
     *
     * @url		DELETE	{id}/representative/{representative_id}
     *
     * @throws RestException 401 Access not allowed for your login
     * @throws RestException 404 User or Third party not found
     */
    public function deleteRepresentative($id, $representative_id)
    {
    }
    /**
     * Get customer categories for a third party
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int		$id			ID of the third party
     * @param	string	$sortfield	Sort field
     * @param	string	$sortorder	Sort order
     * @param	int		$limit		List limit
     * @param	int		$page		Page number
     * @return	array
     * @phan-return array<int,array{id:int,fk_parent:int,label:string,description:string,color:string,position:int,socid:int,type:string,entity:int,array_options:array<string,mixed>,visible:int,ref_ext:string,multilangs?:array<string,array{label:string,description:string,note?:string}>}>
     * @phpstan-return array<int,array{id:int,fk_parent:int,label:string,description:string,color:string,position:int,socid:int,type:string,entity:int,array_options:array<string,mixed>,visible:int,ref_ext:string,multilangs?:array<string,array{label:string,description:string,note?:string}>}>
     *
     * @url		GET		{id}/categories
     *
     * @throws RestException
     */
    public function getCategories($id, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    /**
     * Add a customer category to a third party
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	int		$category_id	ID of category
     * @return	Object
     *
     * @phan-return Societe
     * @phpstan-return Societe
     *
     * @url		PUT		{id}/categories/{category_id}
     *
     * @throws RestException
     */
    public function addCategory($id, $category_id)
    {
    }
    /**
     * Remove the link between a customer category and the third party
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	int		$category_id	ID of category
     *
     * @return	Object
     * @phan-return Societe
     * @phpstan-return Societe
     *
     * @url		DELETE	{id}/categories/{category_id}
     *
     * @throws RestException
     */
    public function deleteCategory($id, $category_id)
    {
    }
    /**
     * Get supplier categories for a third party
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id			ID of the third party
     * @param	string	$sortfield	Sort field
     * @param	string	$sortorder	Sort order
     * @param	int		$limit		List limit
     * @param	int		$page		Page number
     *
     * @return	array
     * @phan-return array<int,array{id:int,fk_parent:int,label:string,description:string,color:string,position:int,socid:int,type:string,entity:int,array_options:array<string,mixed>,visible:int,ref_ext:string,multilangs?:array<string,array{label:string,description:string,note?:string}>}>
     * @phpstan-return array<int,array{id:int,fk_parent:int,label:string,description:string,color:string,position:int,socid:int,type:string,entity:int,array_options:array<string,mixed>,visible:int,ref_ext:string,multilangs?:array<string,array{label:string,description:string,note?:string}>}>
     *
     * @url		GET		{id}/supplier_categories
     *
     * @throws RestException
     */
    public function getSupplierCategories($id, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    /**
     * Add a supplier category to a third party
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	int		$category_id	ID of category
     * @return	mixed
     *
     * @phan-return Societe
     * @phpstan-return Societe
     *
     * @url		PUT		{id}/supplier_categories/{category_id}
     *
     * @throws RestException
     */
    public function addSupplierCategory($id, $category_id)
    {
    }
    /**
     * Remove the link between a category and the third party
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	int		$category_id	ID of category
     *
     * @return	mixed
     * @phan-return Societe
     * @phpstan-return Societe
     *
     * @url		DELETE	{id}/supplier_categories/{category_id}
     *
     * @throws RestException
     */
    public function deleteSupplierCategory($id, $category_id)
    {
    }
    /**
     * Get outstanding proposals for a third party
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id			ID of the third party
     * @param	string	$mode		'customer' or 'supplier'
     *
     * @url		GET		{id}/outstandingproposals
     *
     * @return	array				List of outstandings proposals of thirdparty
     * @phan-return array{opened?:float}
     * @phpstan-return array{opened?:float}
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getOutStandingProposals($id, $mode = 'customer')
    {
    }
    /**
     * Get outstanding orders for a third party
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id			ID of the third party
     * @param	string	$mode		'customer' or 'supplier'
     *
     * @url		GET		{id}/outstandingorders
     *
     * @return	array				List of outstandings orders of the third party
     * @phan-return array{opened?:float}
     * @phpstan-return array{opened?:float}
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getOutStandingOrder($id, $mode = 'customer')
    {
    }
    /**
     * Get outstanding invoices for a third party
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id			ID of the third party
     * @param	string	$mode		'customer' or 'supplier'
     *
     * @url		GET		{id}/outstandinginvoices
     *
     * @return	array				List of outstanding invoices of the third party
     * @phan-return array{opened?:float}
     * @phpstan-return array{opened?:float}
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getOutStandingInvoices($id, $mode = 'customer')
    {
    }
    /**
     * Get representatives of a third party
     *
     * @since	11.0.0	Initial implementation
     *
     * @param	int		$id			ID of the third party
     * @param	int 	$mode		0=Array with properties, 1=Array of id.
     *
     * @url		GET		{id}/representatives
     *
     * @return	array				List of representatives of the third party
     * @phan-return int[]|array<array{id:int,lastname:string,firstname:string,email:string,phone:string,office_phone:string,office_fax:string,user_mobile:string,personal_mobile:string,job:string,statut:int,status:int,entity:int,login:string,photo:string,gender:string}>
     * @phpstan-return int[]|array<array{id:int,lastname:string,firstname:string,email:string,phone:string,office_phone:string,office_fax:string,user_mobile:string,personal_mobile:string,job:string,statut:int,status:int,entity:int,login:string,photo:string,gender:string}>
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getSalesRepresentatives($id, $mode = 0)
    {
    }
    /**
     * Get fixed amount discount of a third party
     *
     * all sources: deposit, credit note, commercial offers, etc.
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	string	$filter			Filter exceptional discount. "none" will return every discount, "available" returns unapplied discounts, "used" returns applied discounts   {@choice none,available,used}
     * @param	string	$sortfield		Sort field
     * @param	string	$sortorder		Sort order
     *
     * @url		GET		{id}/fixedamountdiscounts
     *
     * @return	array					List of fixed discount of the third party
     * @phan-return stdClass[]
     * @phpstan-return stdClass[]
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
     * Return invoices qualified to be replaced by another invoice
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id		ID of a third party
     *
     * @url		GET		{id}/getinvoicesqualifiedforreplacement
     *
     * @return	array
     * @phan-return array<int,array{id:int,ref:string,status:int,paid:int,alreadypaid:int}>|int
     * @phpstan-return array<int,array{id:int,ref:string,status:int,paid:int,alreadypaid:int}>|int
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function getInvoicesQualifiedForReplacement($id)
    {
    }
    /**
     * Return invoices qualified to be corrected by a credit note
     *
     * Invoices matching the following rules are returned
     * (validated + payment on process) or classified (paid completely or paid partially) + not already replaced + not already a credit note
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id		ID of a third party
     *
     * @url		GET		{id}/getinvoicesqualifiedforcreditnote
     *
     * @return	array
     * @phan-return array<int,array{ref:string,status:int,type:int,paye:int,paymentornot:int}>|int
     * @phpstan-return array<int,array{ref:string,status:int,type:int,paye:int,paymentornot:int}>|int
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
     * Get company notifications for a third party
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	int		$id		ID of the third party
     *
     * @return	array
     * @phan-return array<array{id:int,socid:int,event:string,contact_id:int,datec:int,tms:string,type:string}>
     * @phpstan-return array<array{id:int,socid:int,event:string,contact_id:int,datec:int,tms:string,type:string}>
     *
     * @url		GET		{id}/notifications
     *
     * @throws RestException
     */
    public function getCompanyNotification($id)
    {
    }
    /**
     * Create a company notification for a third party
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @return	array|mixed				Notification of the third party
     *
     * @url		POST	{id}/notifications
     *
     * @throws RestException
     */
    public function createCompanyNotification($id, $request_data = \null)
    {
    }
    /**
     * Create a company notification for a third party using action trigger code
     *
     * @since	21.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	string	$code			Action Trigger code
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @return	array|mixed				Notification for the third party
     * @phan-return Notify
     *
     * @url		POST	{id}/notificationsbycode/{code}
     *
     * @throws RestException
     */
    public function createCompanyNotificationByCode($id, $code, $request_data = \null)
    {
    }
    /**
     * Delete a company notification attached to a third party
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	int		$id					ID of the third party
     * @param	int		$notification_id	ID of CompanyNotification
     *
     * @return	int							-1 if error, 1 if correct deletion
     *
     * @url		DELETE	{id}/notifications/{notification_id}
     *
     * @throws RestException
     */
    public function deleteCompanyNotification($id, $notification_id)
    {
    }
    /**
     * Update a company notification for a third party
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	int		$id					ID of the third party
     * @param	int		$notification_id	ID of CompanyNotification
     * @param	array	$request_data		Request data
     * @return	array|mixed					Notification for the third party
     *
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url		PUT		{id}/notifications/{notification_id}
     *
     * @throws RestException
     */
    public function updateCompanyNotification($id, $notification_id, $request_data = \null)
    {
    }
    /**
     * Get company bank accounts of a third party
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id		ID of the third party
     *
     * @return	array
     * @phan-return array<array{socid?:int,default_rib?:string,frstrecur?:string,1000110000001?:string,datec:string,datem:string,label:string,bank:string,bic:string,iban:string,id:int,rum:string}>
     * @phpstan-return array<array{socid?:int,default_rib?:string,frstrecur?:string,1000110000001?:string,datec:string,datem:string,label:string,bank:string,bic:string,iban:string,id:int,rum:string}>
     *
     * @url		GET		{id}/bankaccounts
     *
     * @throws RestException
     */
    public function getCompanyBankAccount($id)
    {
    }
    /**
     * Create a company bank account for a third party
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @return	array|mixed				BankAccount of the third party
     *
     * @url POST {id}/bankaccounts
     *
     * @throws RestException
     */
    public function createCompanyBankAccount($id, $request_data = \null)
    {
    }
    /**
     * Update a company bank account of a third party
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id					ID of the third party
     * @param	int		$bankaccount_id		ID of CompanyBankAccount
     * @param	array	$request_data		Request data
     * @return	array|mixed					BankAccount of the third party
     *
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url		PUT		{id}/bankaccounts/{bankaccount_id}
     *
     * @throws RestException
     */
    public function updateCompanyBankAccount($id, $bankaccount_id, $request_data = \null)
    {
    }
    /**
     * Delete a bank account attached to a third party
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id					ID of the third party
     * @param	int		$bankaccount_id		ID of CompanyBankAccount
     *
     * @return	int							-1 if error, 1 if correct deletion
     *
     * @url		DELETE	{id}/bankaccounts/{bankaccount_id}
     *
     * @throws RestException
     */
    public function deleteCompanyBankAccount($id, $bankaccount_id)
    {
    }
    /**
     * Generate a document from a bank account record
     *
     * Like SEPA mandate
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	int		$companybankid	ID of company bank
     * @param	string	$model			Model of document to generate
     * @return	array
     * @phan-return array{success:int<0,1>}
     * @phpstan-return array{success:int<0,1>}
     *
     * @url		GET		{id}/generateBankAccountDocument/{companybankid}/{model}
     *
     * @throws RestException
     */
    public function generateBankAccountDocument($id, $companybankid = \null, $model = 'sepamandate')
    {
    }
    /**
     * Get a specific account attached to a third party
     *
     * Specify the site key
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id		ID of the third party
     * @param	string	$site	Site key
     *
     * @return	array|mixed
     *
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     *
     * @url		GET		{id}/accounts/
     */
    public function getSocieteAccounts($id, $site = \null)
    {
    }
    /**
     * Get a specific third party by account
     *
     * @since	21.0.0	Initial implementation
     *
     * @param	string	$site			Site key
     * @param	string	$key_account	Key of the account
     *
     * @return	array|mixed
     *
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     *
     * @url		GET		/accounts/{site}/{key_account}
     *
     * @throws RestException
     */
    public function getSocieteByAccounts($site, $key_account)
    {
    }
    /**
     * Create and attach a new account to an existing third party
     *
     * Possible fields for request_data (request body) are specified in <code>llx_societe_account</code> table.<br>
     * See <a href="https://wiki.dolibarr.org/index.php/Table_llx_societe_account">Table llx_societe_account</a> wiki page for more information<br><br>
     * <u>Example body payload :</u> <pre>{"key_account": "cus_DAVkLSs1LYyYI", "site": "stripe"}</pre>
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @return	array|mixed
     *
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 409 Conflict: An Account already exists for this company and site.
     * @throws RestException 422 Unprocessable Entity: You must pass the site attribute in your request data !
     * @throws RestException 500 Internal Server Error: Error creating SocieteAccount account
     *
     * @url		POST	{id}/accounts
     */
    public function createSocieteAccount($id, $request_data = \null)
    {
    }
    /**
     * Create and attach a new (or replace an existing) specific site account for a third party
     *
     * You <strong>MUST</strong> pass all values to keep (otherwise, they will be deleted) !<br>
     * If you just need to update specific fields prefer <code>PUT /thirdparties/{id}/accounts/{site}</code> endpoint.<br><br>
     * When a <strong>SocieteAccount</strong> entity does not exist for the <code>id</code> and <code>site</code>
     * supplied, a new one will be created. In that case <code>fk_soc</code> and <code>site</code> members form
     * request body payload will be ignored and <code>id</code> and <code>site</code> query strings parameters
     * will be used instead.
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	string	$site			Site key
     * @param	array	$request_data	Request data
     * @return	array|mixed
     *
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 422 Unprocessable Entity: You must pass the site attribute in your request data !
     * @throws RestException 500 Internal Server Error: Error updating SocieteAccount entity
     *
     * @url		POST		{id}/accounts/{site}
     */
    public function postSocieteAccount($id, $site, $request_data = \null)
    {
    }
    /**
     * Update specified values of a specific account attached to a third party
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id				ID of the third party
     * @param	string	$site			Site key
     * @param	array	$request_data	Request data
     * @return	array|mixed
     *
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     * @throws RestException 409 Conflict: Another SocieteAccount entity already exists for this thirdparty with this site key.
     * @throws RestException 500 Internal Server Error: Error updating SocieteAccount entity
     *
     * @url 	PUT 	{id}/accounts/{site}
     */
    public function putSocieteAccount($id, $site, $request_data = \null)
    {
    }
    /**
     * Delete a specific site account attached to a third party
     *
     * by account id
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id		ID of the third party
     * @param	string	$site	Site key
     *
     * @return	void
     *
     * @throws RestException 401 Unauthorized: User does not have permission to delete thirdparties accounts
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     * @throws RestException 500 Internal Server Error: Error deleting SocieteAccount entity
     *
     * @url		DELETE	{id}/accounts/{site}
     */
    public function deleteSocieteAccount($id, $site)
    {
    }
    /**
     * Delete all accounts attached to a third party
     *
     * @since	9.0.0	Initial implementation
     *
     * @param	int		$id		ID of the third party
     *
     * @return	void
     *
     * @throws RestException 401 Unauthorized: User does not have permission to delete thirdparties accounts
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     * @throws RestException 500 Internal Server Error: Error deleting SocieteAccount entity
     *
     * @url		DELETE	{id}/accounts
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
     * @param ?array<string,string> $data   Data to validate
     * @return array<string,string>
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
     * @param    ?int	$rowid      Id of third party to load (Use 0 to get a specimen record, use null to use other search criteria)
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
     * @phan-return Societe
     * @phpstan-return Societe
     *
     * @throws RestException
     */
    private function _fetch($rowid, $ref = '', $ref_ext = '', $barcode = '', $idprof1 = '', $idprof2 = '', $idprof3 = '', $idprof4 = '', $idprof5 = '', $idprof6 = '', $email = '', $ref_alias = '')
    {
    }
}