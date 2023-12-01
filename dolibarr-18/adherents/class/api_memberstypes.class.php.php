<?php

/**
 * API class for members types
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class MembersTypes extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('label');
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a member type object
     *
     * Return an array with member type informations
     *
     * @param   int     $id 			ID of member type
     * @return  Object              	Object with cleaned properties
     *
     * @throws  RestException
     */
    public function get($id)
    {
    }
    /**
     * List members types
     *
     * Get a list of members types
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Limit for list
     * @param int       $page       Page number
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.libelle:like:'SO-%') and (t.subscription:=:'1')"
     * @return array                Array of member type objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '')
    {
    }
    /**
     * Create member type object
     *
     * @param array $request_data   Request data
     * @return int  ID of member type
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update member type
     *
     * @param int   $id             ID of member type to update
     * @param array $request_data   Datas
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete member type
     *
     * @param int $id   member type ID
     * @return array
     */
    public function delete($id)
    {
    }
    /**
     * Validate fields before creating an object
     *
     * @param array|null    $data   Data to validate
     * @return array
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
     * @param   Object  $object    Object to clean
     * @return    Object    Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
}