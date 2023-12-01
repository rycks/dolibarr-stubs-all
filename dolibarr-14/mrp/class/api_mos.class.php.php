<?php

/**
 * \file    mrp/class/api_mo.class.php
 * \ingroup mrp
 * \brief   File for API management of MO.
 */
/**
 * API class for MO
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Mos extends \DolibarrApi
{
    /**
     * @var Mo $mo {@type Mo}
     */
    public $mo;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a MO object
     *
     * Return an array with MO informations
     *
     * @param 	int 	$id ID of MO
     * @return 	array|mixed data without useless information
     *
     * @url	GET {id}
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List Mos
     *
     * Get a list of MOs
     *
     * @param string	       $sortfield	        Sort field
     * @param string	       $sortorder	        Sort order
     * @param int		       $limit		        Limit for list
     * @param int		       $page		        Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return  array                               Array of order objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '')
    {
    }
    /**
     * Create MO object
     *
     * @param array $request_data   Request datas
     * @return int  ID of MO
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update MO
     *
     * @param int   $id             Id of MO to update
     * @param array $request_data   Datas
     *
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete MO
     *
     * @param   int     $id   MO ID
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Produce and consume
     *
     * Example:
     * {
     *   "inventorylabel": "Produce and consume using API",
     *   "inventorycode": "PRODUCEAPI-YY-MM-DD",
     *   "autoclose": 1,
     *   "arraytoconsume": [],
     *   "arraytoproduce": []
     * }
     *
     * @param int       $id        		ID of state
     * @param array 	$request_data   Request datas
     *
     * @url     POST {id}/produceandconsume
     *
     * @return int  ID of MO
     */
    public function produceAndConsume($id, $request_data = \null)
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
     * @param	array		$data   Array of data to validate
     * @return	array
     *
     * @throws	RestException
     */
    private function _validate($data)
    {
    }
}