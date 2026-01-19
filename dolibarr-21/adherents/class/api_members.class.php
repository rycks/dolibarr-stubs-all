<?php

/**
 * API class for members
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Members extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('morphy', 'typeid');
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a member object
     *
     * Return an array with member information
     *
     * @param   int     $id				ID of member
     * @return  Object					Object with cleaned properties
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Member not found
     */
    public function get($id)
    {
    }
    /**
     * Get properties of a member object by linked thirdparty
     *
     * Return an array with member information
     *
     * @param     int     $thirdparty	ID of third party
     *
     * @return Object					Data without useless information
     *
     * @url GET thirdparty/{thirdparty}
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Member not found
     */
    public function getByThirdparty($thirdparty)
    {
    }
    /**
     * Get properties of a member object by linked thirdparty account
     *
     * @param string $site Site key
     * @param string $key_account Key of account
     *
     * @return array|mixed
     * @throws RestException 401 Unauthorized: User does not have permission to read thirdparties
     * @throws RestException 404 Not Found: Specified thirdparty ID does not belongs to an existing thirdparty
     *
     * @url GET thirdparty/accounts/{site}/{key_account}
     */
    public function getByThirdpartyAccounts($site, $key_account)
    {
    }
    /**
     * Get properties of a member object by linked thirdparty email
     *
     * Return an array with member information
     *
     * @param  string $email            Email of third party
     *
     * @return Object					Data without useless information
     *
     * @url GET thirdparty/email/{email}
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Member or ThirdParty not found
     */
    public function getByThirdpartyEmail($email)
    {
    }
    /**
     * Get properties of a member object by linked thirdparty barcode
     *
     * Return an array with member information
     *
     * @param  string $barcode			Barcode of third party
     *
     * @return Object					Data without useless information
     *
     * @url GET thirdparty/barcode/{barcode}
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Member or ThirdParty not found
     */
    public function getByThirdpartyBarcode($barcode)
    {
    }
    /**
     * List members
     *
     * Get a list of members
     *
     * @param string    $sortfield  		Sort field
     * @param string    $sortorder  		Sort order
     * @param int       $limit      		Limit for list
     * @param int       $page       		Page number
     * @param string    $typeid     		ID of the type of member
     * @param int		$category   		Use this param to filter list by category
     * @param string    $sqlfilters 		Other criteria to filter answers separated by a comma.
     *                              		Example: "(t.ref:like:'SO-%') and ((t.date_creation:<:'20160101') or (t.nature:is:NULL))"
     * @param string	$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool      $pagination_data    If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return array    					Array of member objects
     * @phan-return array<array<string,null|int|float|string>>
     * @phpstan-return array<array<string,null|int|float|string>>
     *
     * @throws	RestException	400		Error on SQL filters
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		No Member found
     * @throws	RestException	503		Error when retrieving Member list
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $typeid = '', $category = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create member object
     *
     * @param array<string,string> $request_data   Request data
     * @phan-param ?array<string,string>	$request_data
     * @phpstan-param ?array<string,string>	$request_data
     * @return int  ID of member
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	500		Error when creating Member
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update member
     *
     * @param 	int   		$id             ID of member to update
     * @param 	array 		$request_data   Datas
     * @phan-param ?array<string,string>	$request_data
     * @phpstan-param ?array<string,string>	$request_data
     * @return 	Object						Updated object
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Member not found
     * @throws	RestException	500		Error when resiliating, validating, excluding, updating a Member
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete member
     *
     * @param int $id   member ID
     * @return array
     * @phan-return array<string,array{code:int,message:string}>
     * @phpstan-return array<string,array{code:int,message:string}>
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Member not found
     * @throws	RestException	500		Error when deleting a Member
     */
    public function delete($id)
    {
    }
    /**
     * Validate fields before creating an object
     *
     * @param array<string,null|int|float|string>	$data   Data to validate
     * @return array<string,null|int|float|string>			Return array with validated mandatory fields and their value
     * @phan-return array<string,?int|?float|?string>			Return array with validated mandatory fields and their value
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object    	Object to clean
     * @return  Object    			Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * List subscriptions of a member
     *
     * Get a list of subscriptions
     *
     * @param int $id ID of member
     * @return array Array of subscription objects
     * @phan-return Object[]
     * @phpstan-return Object[]
     *
     * @url GET {id}/subscriptions
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Member not found
     */
    public function getSubscriptions($id)
    {
    }
    /**
     * Add a subscription for a member
     *
     * @param int		$id             ID of member
     * @param string	$start_date     Start date {@from body} {@type timestamp}
     * @param string	$end_date       End date {@from body} {@type timestamp}
     * @param float		$amount         Amount (may be 0) {@from body}
     * @param string	$label			Label {@from body}
     * @return int  ID of subscription
     *
     * @url POST {id}/subscriptions
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Member not found
     */
    public function createSubscription($id, $start_date, $end_date, $amount, $label = '')
    {
    }
    /**
     * Get categories for a member
     *
     * @param int		$id         ID of member
     * @param string		$sortfield	Sort field
     * @param string		$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     *
     * @return mixed
     *
     * @url GET {id}/categories
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		Category not found
     * @throws	RestException	503		Error when retrieving Category list
     */
    public function getCategories($id, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    /**
     * Get properties of a member type object
     *
     * Return an array with member type information
     *
     * @param   int     $id				ID of member type
     * @return  Object					Object with cleaned properties
     *
     * @url GET /types/{id}
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		No Member Type found
     */
    public function getType($id)
    {
    }
    /**
     * List members types
     *
     * Get a list of members types
     *
     * @param string    $sortfield  		Sort field
     * @param string    $sortorder  		Sort order
     * @param int       $limit      		Limit for list
     * @param int       $page       		Page number
     * @param string    $sqlfilters 		Other criteria to filter answers separated by a comma. Syntax example "(t.libelle:like:'SO-%') and (t.subscription:=:'1')"
     * @param string	$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool      $pagination_data    If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return array                		Array of member type objects
     * @phan-return array<array<string,null|int|float|string>>
     * @phpstan-return array<array<string,null|int|float|string>>
     *
     * @url GET /types/
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		No Member Type found
     * @throws	RestException	503		Error when retrieving Member list
     */
    public function indexType($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create member type object
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,string>	$request_data
     * @phpstan-param ?array<string,string>	$request_data
     * @return int  ID of member type
     *
     * @url POST /types/
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	500		Error when creating Member Type
     */
    public function postType($request_data = \null)
    {
    }
    /**
     * Update member type
     *
     * @param 	int   		$id             ID of member type to update
     * @param 	array 		$request_data   Datas
     * @phan-param ?array<string,string>	$request_data
     * @phpstan-param ?array<string,string>	$request_data
     * @return 	Object						Updated object
     *
     * @url PUT /types/{id}
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		No Member Type found
     * @throws	RestException	500		Error when updating Member Type
     */
    public function putType($id, $request_data = \null)
    {
    }
    /**
     * Delete member type
     *
     * @param int $id   member type ID
     * @return array
     * @phan-return array<string,array{code:int,message:string}>
     * @phpstan-return array<string,array{code:int,message:string}>
     *
     * @url DELETE /types/{id}
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		No Member Type found
     * @throws	RestException	500		Error when deleting Member Type
     */
    public function deleteType($id)
    {
    }
    /**
     * Validate fields before creating an object
     *
     * @param ?array<string,null|int|float|string>	$data   Data to validate
     * @return array<string,null|int|float|string>
     *
     * @throws RestException
     */
    private function _validateType($data)
    {
    }
}