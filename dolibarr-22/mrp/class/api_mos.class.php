<?php

/**
 * \file    htdocs/mrp/class/api_mos.class.php
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
     * @var Mo {@type Mo}
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
     * Return an array with MO information
     *
     * @param	int		$id				ID of MO
     * @return  Object					Object with cleaned properties
     *
     * @url	GET {id}
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * List Mos
     *
     * Get a list of MOs
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string		   $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return  array                               Array of order objects
     * @phan-return Mo[]
     * @phpstan-return Mo[]
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create MO object
     *
     * @param array $request_data   Request datas
     * @phan-param ?array<string,string>    $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int  ID of MO
     *
     * @throws	RestException
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update MO
     *
     * @param 	int   	$id             	Id of MO to update
     * @param 	array 	$request_data   	Datas
     * @phan-param ?array<string,string>    $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Updated object
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete MO
     *
     * @param   int     $id   MO ID
     * @return  array
     * @phan-return array<string,array{code:int,message:string}>
     * @phpstan-return array<string,array{code:int,message:string}>
     */
    public function delete($id)
    {
    }
    /**
     * Produce and consume all
     *
     * - If arraytoconsume and arraytoproduce are both filled, this fill an empty MO with the lines to consume and produce and record the consumption and production.
     * - If arraytoconsume and arraytoproduce are not provided, it consumes and produces all existing lines.
     *
     * Example:
     * {
     *   "inventorylabel": "Produce and consume using API",
     *   "inventorycode": "PRODUCEAPI-YY-MM-DD",
     *   "autoclose": 1,
     *   "arraytoconsume": [
     *       "objectid": 123, -- ID_of_product
     *       "qty": "2",
     *       "fk_warehouse": "789"
     *   ],
     *   "arraytoproduce": [
     *       "objectid": 456, -- ID_of_product
     *       "qty": "1",
     *       "fk_warehouse": "789"
     *   ]
     * }
     *
     * @param int       $id				ID of state
     * @param array		$request_data   Request datas
     * @phan-param ?array<string,string>    $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url     POST {id}/produceandconsumeall
     *
     * @return int  ID of MO
     */
    public function produceAndConsumeAll($id, $request_data = \null)
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
     *   "arraytoconsume": [
     *     {
     *       "objectid": "123",  -- rowid of MoLine
     *       "qty": "2",
     *       "fk_warehouse": "789" -- "0" or empty, if stock change is disabled.
     *     }
     *   ],
     *   "arraytoproduce": [
     *     {
     *       "objectid": "456",  -- rowid of MoLine
     *       "qty": "1",
     *       "fk_warehouse": "789",
     *       "pricetoproduce": "12.3"  -- optional
     *     }
     *   ]
     * }
     *
     * @param int       $id				ID of state
     * @param array		$request_data   Request datas
     * @phan-param ?array<string,string>    $request_data
     * @phpstan-param ?array<string,string> $request_data
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
     * @param   Object  $object			Object to clean
     * @return  Object					Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before creating or updating an object
     *
     * @param ?array<null|int|float|string> $data   Data to validate
     * @return array<string,null|int|float|string>
     *
     * @throws	RestException
     */
    private function _validate($data)
    {
    }
    /**
     * Validate the ref field and get the next Number if it's necessary.
     *
     * @return void
     */
    private function checkRefNumbering()
    {
    }
}