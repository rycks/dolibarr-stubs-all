<?php

/**
 * API class for subscriptions
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Subscriptions extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('fk_adherent', 'dateh', 'datef', 'amount');
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a subscription object
     *
     * Return an array with subscription informations
     *
     * @param     int     $id ID of subscription
     * @return    Object data without useless information
     *
     * @throws    RestException
     */
    public function get($id)
    {
    }
    /**
     * List subscriptions
     *
     * Get a list of subscriptions
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Limit for list
     * @param int       $page       Page number
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.import_key:<:'20160101')"
     * @return array Array of subscription objects
     *
     * @throws RestException
     */
    public function index($sortfield = "dateadh", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '')
    {
    }
    /**
     * Create subscription object
     *
     * @param array $request_data   Request data
     * @return int  ID of subscription
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update subscription
     *
     * @param int   $id             ID of subscription to update
     * @param array $request_data   Datas
     * @return Object
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete subscription
     *
     * @param int $id   ID of subscription to delete
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
}