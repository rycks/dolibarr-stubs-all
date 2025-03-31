<?php

//require_once DOL_DOCUMENT_ROOT.'/contact/class/contact.class.php';
//require_once DOL_DOCUMENT_ROOT.'/categories/class/categorie.class.php';
/**
 * API class for contacts
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Contacts extends \DolibarrApi
{
    /**
     *
     * @var string[]   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('lastname');
    /**
     * @var Contact $contact {@type Contact}
     */
    public $contact;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a contact object
     *
     * Return an array with contact information
     *
     * @param	int    $id                  ID of contact
     * @param   int    $includecount        Count and return also number of elements the contact is used as a link for
     * @param   int    $includeroles        Includes roles of the contact
     * @return 	object 						data without useless information
     *
     * @throws	RestException
     */
    public function get($id, $includecount = 0, $includeroles = 0)
    {
    }
    /**
     * Get properties of a contact object by Email
     *
     * @param	string	$email					Email of contact
     * @param   int    $includecount        Count and return also number of elements the contact is used as a link for
     * @param   int    $includeroles        Includes roles of the contact
     * @return	array|mixed data without useless information
     *
     * @url GET email/{email}
     *
     * @throws RestException 401     Insufficient rights
     * @throws RestException 404     User or group not found
     */
    public function getByEmail($email, $includecount = 0, $includeroles = 0)
    {
    }
    /**
     * List contacts
     *
     * Get a list of contacts
     *
     * @param string	$sortfield			Sort field
     * @param string	$sortorder			Sort order
     * @param int		$limit				Limit for list
     * @param int		$page				Page number
     * @param string	$thirdparty_ids		Thirdparty ids to filter contacts of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param int		$category   Use this param to filter list by category
     * @param string    $sqlfilters         Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param int       $includecount       Count and return also number of elements the contact is used as a link for
     * @param int		$includeroles        Includes roles of the contact
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool      $pagination_data     If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return Contact[]                        Array of contact objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $category = 0, $sqlfilters = '', $includecount = 0, $includeroles = 0, $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create contact object
     *
     * @param   array   $request_data   Request datas
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return  int     ID of contact
     *
     * @suppress PhanPluginUnknownArrayMethodParamType  Luracast limitation
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update contact
     *
     * @param 	int   	$id             	Id of contact to update
     * @param 	array 	$request_data   	Datas
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object|false				Updated object, false when issue toupdate
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete contact
     *
     * @param   int     $id Contact ID
     * @return  array[]
     * @phan-return array<string,array{code:int,message:string}>
     * @phpstan-return array<string,array{code:int,message:string}>
     */
    public function delete($id)
    {
    }
    /**
     * Create an user account object from contact (external user)
     *
     * @param   int		$id   Id of contact
     * @param   array   $request_data   Request datas
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return  int     ID of user
     *
     * @url	POST {id}/createUser
     * @suppress PhanPluginUnknownArrayMethodParamType  Luracast limitation
     */
    public function createUser($id, $request_data = \null)
    {
    }
    /**
     * Get categories for a contact
     *
     * @param int		$id         ID of contact
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
     * Add a category to a contact
     *
     * @url PUT {id}/categories/{category_id}
     *
     * @param   int		$id             Id of contact
     * @param   int     $category_id    Id of category
     *
     * @return  mixed
     *
     * @throws RestException 401 Insufficient rights
     * @throws RestException 404 Category or contact not found
     */
    public function addCategory($id, $category_id)
    {
    }
    /**
     * Remove the link between a category and a contact
     *
     * @url DELETE {id}/categories/{category_id}
     *
     * @param   int		$id				Id of contact
     * @param   int		$category_id	Id of category
     * @return  mixed
     *
     * @throws  RestException 401     Insufficient rights
     * @throws  RestException 404     Category or contact not found
     */
    public function deleteCategory($id, $category_id)
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
     * @param   string[]|null     $data   Data to validate
     * @return  string[]
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
}