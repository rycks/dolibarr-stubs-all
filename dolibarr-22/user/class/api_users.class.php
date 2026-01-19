<?php

/**
 * API class for users
 *
 * @since	5.0.0	Initial implementation
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Users extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('login');
    /**
     * @var User {@type User}
     */
    public $useraccount;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * List users
     *
     * Get a list of Users
     *
     * @since	5.0.0	Initial implementation
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string	$user_ids   User ids filter field. Example: '1' or '1,2,3'          {@pattern /^[0-9,]*$/i}
     * @param int       $category   Use this param to filter list by category
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return  array               Array of User objects
     * @phan-return Object[]
     * @phpstan-return Object[]
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $user_ids = '0', $category = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Get a user
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int		$id						ID of user
     * @param	int		$includepermissions		Set this to 1 to have the array of permissions loaded (not done by default for performance purpose)
     * @return	array|mixed						data without useless information
     * @phan-return Object
     * @phpstan-return Object
     *
     * @throws RestException 401 Insufficient rights
     * @throws RestException 404 User or group not found
     */
    public function get($id, $includepermissions = 0)
    {
    }
    /**
     * Get a user by login
     *
     * @since	13.0.0	Initial implementation
     *
     * @param	string	$login					Login of user
     * @param	int		$includepermissions		Set this to 1 to have the array of permissions loaded (not done by default for performance purpose)
     * @return	array|mixed						Data without useless information
     * @phan-return Object
     * @phpstan-return Object
     *
     * @url GET login/{login}
     *
     * @throws RestException 400    Bad request
     * @throws RestException 401	Insufficient rights
     * @throws RestException 404	User or group not found
     */
    public function getByLogin($login, $includepermissions = 0)
    {
    }
    /**
     * Get a user by email
     *
     * @since	13.0.0	Initial implementation
     *
     * @param	string	$email					Email of user
     * @param	int		$includepermissions		Set this to 1 to have the array of permissions loaded (not done by default for performance purpose)
     * @return	array|mixed						Data without useless information
     * @phan-return Object
     * @phpstan-return Object
     *
     * @url GET email/{email}
     *
     * @throws RestException 400     Bad request
     * @throws RestException 401     Insufficient rights
     * @throws RestException 404     User or group not found
     */
    public function getByEmail($email, $includepermissions = 0)
    {
    }
    /**
     * Get more properties of a user
     *
     * @since	11.0.0	Initial implementation
     *
     * @url	GET /info
     *
     * @param	int			$includepermissions		Set this to 1 to have the array of permissions loaded (not done by default for performance purpose)
     * @return  array|mixed							Data without useless information
     *
     * @throws RestException 401     Insufficient rights
     * @throws RestException 404     User or group not found
     */
    public function getInfo($includepermissions = 0)
    {
    }
    /**
     * Create a user
     *
     * @since	5.0.0	Initial implementation
     *
     * @param array $request_data New user data
     * @phan-param ?array<string,mixed> $request_data
     * @phpstan-param ?array<string,mixed> $request_data
     * @return int
     *
     * @throws RestException 401 Not allowed
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update a user
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int			$id					Id of account to update
     * @param	array		$request_data		Datas
     * @phan-param ?array<string,mixed> $request_data
     * @phpstan-param ?array<string,mixed> $request_data
     * @return 	Object							Updated object
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 500 System error
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Update a user password
     *
     * @since	21.0.0	Initial implementation
     *
     * @param   int     $id        			User ID
     * @param	bool	$send_password		Only if set to true, the new password will send to the user
     * @return  int                			1 if password changed, 2 if password changed and sent
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 User not found
     * @throws RestException 500 System error
     *
     * @url	GET {id}/setPassword
     */
    public function setPassword($id, $send_password = \false)
    {
    }
    /**
     * List the groups of a user
     *
     * @since	10.0.0	Initial implementation
     *
     * @param int $id     Id of user
     * @return array      Array of group objects
     * @phan-return Object[]
     * @phpstan-return Object[]
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     *
     * @url GET {id}/groups
     */
    public function getGroups($id)
    {
    }
    /**
     * Add a user to a group
     *
     * @since	5.0.0	Initial implementation
     *
     * @param   int     $id        User ID
     * @param   int     $group     Group ID
     * @param   int     $entity    Entity ID (valid only for superadmin in multicompany transverse mode)
     * @return  int                1 if success
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 User not found
     * @throws RestException 500 System error
     *
     * @url	GET {id}/setGroup/{group}
     */
    public function setGroup($id, $group, $entity = 1)
    {
    }
    /**
     * List groups
     *
     * Return an array with a list of Groups
     *
     * @since	11.0.0	Initial implementation
     *
     * @url	GET /groups
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string	$group_ids   Groups ids filter field. Example: '1' or '1,2,3'          {@pattern /^[0-9,]*$/i}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return  array               Array of User objects
     * @phan-return Object[]
     * @phpstan-return Object[]
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 User not found
     * @throws RestException 503 Error
     */
    public function listGroups($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $group_ids = '0', $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Get properties of a user group
     *
     * Return an array with group information
     *
     * @since	11.0.0	Initial implementation
     *
     * @url	GET /groups/{group}
     *
     * @param	int		$group				ID of group
     * @param	int     $load_members		Load members list or not {@min 0} {@max 1}
     * @return  Object				        object of User objects
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 User not found
     */
    public function infoGroups($group, $load_members = 0)
    {
    }
    /**
     * Delete a user
     *
     * @since	5.0.0	Initial implementation
     *
     * @param   int     $id Account ID
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 User not found
     */
    public function delete($id)
    {
    }
    /**
     * Get notifications for a user
     *
     * @since	22.0.0	Initial implementation
     *
     * @param	int		$id		ID of the user
     *
     * @return	array
     * @phan-return array<array{id:int,socid:int,event:string,contact_id:int,datec:int,tms:string,type:string}>
     * @phpstan-return array<array{id:int,socid:int,event:string,contact_id:int,datec:int,tms:string,type:string}>
     *
     * @url		GET		{id}/notifications
     *
     * @throws RestException
     */
    public function getUserNotification($id)
    {
    }
    /**
     * Create a notification for a user
     *
     * @since	22.0.0	Initial implementation
     *
     * @param	int		$id				ID of the user
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @return	array|mixed				Notification of the user
     *
     * @url		POST	{id}/notifications
     *
     * @throws RestException
     */
    public function createUserNotification($id, $request_data = \null)
    {
    }
    /**
     * Create a notification for a user using action trigger code
     *
     * @since	22.0.0	Initial implementation
     *
     * @param	int		$id				ID of the user
     * @param	string	$code			Action Trigger code
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @return	array|mixed				Notification for the user
     * @phan-return Notify
     *
     * @url		POST	{id}/notificationsbycode/{code}
     *
     * @throws RestException
     */
    public function createUserNotificationByCode($id, $code, $request_data = \null)
    {
    }
    /**
     * Delete a notification attached to a user
     *
     * @since	22.0.0	Initial implementation
     *
     * @param	int		$id					ID of the user
     * @param	int		$notification_id	ID of UserNotification
     *
     * @return	int							-1 if error, 1 if correct deletion
     *
     * @url		DELETE	{id}/notifications/{notification_id}
     *
     * @throws RestException
     */
    public function deleteUserNotification($id, $notification_id)
    {
    }
    /**
     * Update a notification for a user
     *
     * @since	22.0.0	Initial implementation
     *
     * @param	int		$id					ID of the User
     * @param	int		$notification_id	ID of UserNotification
     * @param	array	$request_data		Request data
     * @return	array|mixed					Notification for the user
     *
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url		PUT		{id}/notifications/{notification_id}
     *
     * @throws RestException
     */
    public function updateUserNotification($id, $notification_id, $request_data = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object	$object		Object to clean
     * @return  Object				Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Clean sensible user group list datas
     *
     * @param   array<UserGroup>  $objectList   Array of object to clean
     * @return  array<UserGroup>                Array of cleaned object properties
     */
    private function _cleanUserGroupListDatas($objectList)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param   ?array<string,mixed>     $data   Data to validate
     * @return  array<string,mixed>
     * @throws RestException
     */
    private function _validate($data)
    {
    }
}