<?php

/**
 * API class for users
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Users extends \DolibarrApi
{
    /**
     *
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('login');
    /**
     * @var User $user {@type User}
     */
    public $useraccount;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * List Users
     *
     * Get a list of Users
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string   	$user_ids   User ids filter field. Example: '1' or '1,2,3'          {@pattern /^[0-9,]*$/i}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return  array               Array of User objects
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $user_ids = 0, $sqlfilters = '')
    {
    }
    /**
     * Get properties of an user object
     *
     * Return an array with user informations
     *
     * @param 	int 	$id ID of user
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * Create user account
     *
     * @param array $request_data New user data
     * @return int
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update account
     *
     * @param int   $id             Id of account to update
     * @param array $request_data   Datas
     * @return array
     *
     * @throws 	RestException
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * List the groups of a user
     *
     * @param int $id     Id of user
     * @return array      Array of group objects
     *
     * @throws RestException
     *
     * @url GET {id}/groups
     */
    public function getGroups($id)
    {
    }
    /**
     * Add a user into a group
     *
     * @param   int     $id        User ID
     * @param   int     $group     Group ID
     * @param   int     $entity    Entity ID (valid only for superadmin in multicompany transverse mode)
     * @return  int                1 if success
     *
     * @url	GET {id}/setGroup/{group}
     */
    public function setGroup($id, $group, $entity = 1)
    {
    }
    /**
     * Delete account
     *
     * @param   int     $id Account ID
     * @return  array
     */
    public function delete($id)
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
     * @param   array|null     $data   Data to validate
     * @return  array
     * @throws RestException
     */
    private function _validate($data)
    {
    }
}