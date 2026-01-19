<?php

/**
 * API class for categories
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Categories extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('label', 'type');
    /**
     * @var Categorie {@type Categorie}
     */
    public $category;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a category object
     *
     * Return an array with category information
     *
     * @param	int		$id ID of category
     * @param	bool	$include_childs Include child categories list (true or false)
     * @return	array   Data without useless information
     * @phan-return Categorie
     * @phpstan-return Categorie
     *
     * @throws	RestException
     */
    public function get($id, $include_childs = \false)
    {
    }
    /**
     * List categories
     *
     * Get a list of categories according to filters
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string	$type		Type of category ('member', 'customer', 'supplier', 'product', 'contact', 'actioncomm')
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return array                Array of category objects
     * @phan-return Categorie[]
     * @phpstan-return Categorie[]
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $type = '', $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create category object
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int  ID of category
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update category
     *
     * @param 	int   		$id             Id of category to update
     * @param 	array 		$request_data   Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Updated object
     * @phan-return Categorie
     * @phpstan-return Categorie
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete category
     *
     * @param 	int 	$id   Category ID
     * @return 	array
     *
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     */
    public function delete($id)
    {
    }
    /**
     * List categories of an object
     *
     * Get the list of categories linked to an object
     *
     * @param int       $id         Object ID
     * @param string	$type		Type of category ('member', 'customer', 'supplier', 'product', 'contact', 'project', 'actioncomm')
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @return array                Array of category objects
     * @phan-return array<int,array{id:int,fk_parent:int,label:string,description:string,color:string,position:int,socid:int,type:string,entity:int,array_options:array<string,mixed>,visible:int,ref_ext:string,multilangs?:array<string,array{label:string,description:string,note?:string}>}>
     * @phpstan-return array<int,array{id:int,fk_parent:int,label:string,description:string,color:string,position:int,socid:int,type:string,entity:int,array_options:array<string,mixed>,visible:int,ref_ext:string,multilangs?:array<string,array{label:string,description:string,note?:string}>}>
     *
     * @throws RestException
     *
     * @url GET /object/{type}/{id}
     */
    public function getListForObject($id, $type, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    /**
     * Link an object to a category by id
     *
     * @param int $id  ID of category
     * @param string   $type Type of category ('member', 'customer', 'supplier', 'product', 'contact', 'actioncomm')
     * @param int      $object_id ID of object
     *
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     * @throws RestException
     *
     * @url POST {id}/objects/{type}/{object_id}
     */
    public function linkObjectById($id, $type, $object_id)
    {
    }
    /**
     * Link an object to a category by ref
     *
     * @param int 		$id  		ID of category
     * @param string   	$type 		Type of category ('member', 'customer', 'supplier', 'product', 'contact')
     * @param string   	$object_ref Reference of object (product, thirdparty, member, ...)
     *
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     * @throws RestException
     *
     * @url POST {id}/objects/{type}/ref/{object_ref}
     */
    public function linkObjectByRef($id, $type, $object_ref)
    {
    }
    /**
     * Unlink an object from a category by id
     *
     * @param int      $id        ID of category
     * @param string   $type      Type of category ('member', 'customer', 'supplier', 'product', 'contact', 'actioncomm')
     * @param int      $object_id ID of the object
     *
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     * @throws RestException
     *
     * @url DELETE {id}/objects/{type}/{object_id}
     */
    public function unlinkObjectById($id, $type, $object_id)
    {
    }
    /**
     * Unlink an object from a category by ref
     *
     * @param int      $id         	ID of category
     * @param string   $type 		Type  of category ('member', 'customer', 'supplier', 'product', 'contact', 'actioncomm')
     * @param string   $object_ref 	Reference of the object (product, thirdparty, member, ...)
     *
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     * @throws RestException
     *
     * @url DELETE {id}/objects/{type}/ref/{object_ref}
     */
    public function unlinkObjectByRef($id, $type, $object_ref)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Categorie  $object  Object to clean
     * @return  Object     			Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,string>    $data	Data to validate
     * @return array<string,string>				Return array with validated mandatory fields and their value
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
    /**
     * Get the list of objects in a category.
     *
     * @param int        $id         ID of category
     * @param string     $type       Type of category ('member', 'customer', 'supplier', 'product', 'contact', 'project')
     * @param int        $onlyids    Return only ids of objects (consume less memory)
     *
     * @return mixed
     *
     * @url GET {id}/objects
     */
    public function getObjects($id, $type, $onlyids = 0)
    {
    }
}