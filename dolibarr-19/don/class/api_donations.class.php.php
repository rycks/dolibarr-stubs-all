<?php

/**
 * API class for donations
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Donations extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('amount');
    /**
     * @var Don $don {@type Don}
     */
    public $don;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of an donation object
     *
     * Return an array with donation informations
     *
     * @param   int         $id         ID of order
     * @return  Object					Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * List donations
     *
     * Get a list of donations
     *
     * @param string    $sortfield          Sort field
     * @param string    $sortorder          Sort order
     * @param int       $limit              Limit for list
     * @param int       $page               Page number
     * @param string    $thirdparty_ids     Thirdparty ids to filter orders of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string    $sqlfilters         Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string    $properties			Restrict the data returned to theses properties. Ignored if empty. Comma separated list of properties names
     * @return  array                       Array of order objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create donation object
     *
     * @param   array   $request_data   Request data
     * @return  int     ID of order
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update order general fields (won't touch lines of order)
     *
     * @param int   $id             Id of order to update
     * @param array $request_data   Datas
     *
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete donation
     *
     * @param   int     $id         Order ID
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Validate an donation
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "idwarehouse": 0,
     *   "notrigger": 0
     * }
     *
     * @param   int $id             Order ID
     * @param   int $idwarehouse    Warehouse ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     *
     * @return  object
     */
    public function validate($id, $idwarehouse = 0, $notrigger = 0)
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
     * @param   array           $data   Array with data to verify
     * @return  array
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
}