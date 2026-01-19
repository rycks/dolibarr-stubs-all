<?php

/**
 * \file    bom/class/api_boms.class.php
 * \ingroup bom
 * \brief   File for API management of BOM.
 */
/**
 * API class for BOM
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Boms extends \DolibarrApi
{
    /**
     * @var BOM $bom {@type BOM}
     */
    public $bom;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a bom object
     *
     * Return an array with bom informations
     *
     * @param 	int 	$id 			ID of bom
     * @return  Object              	Object with cleaned properties
     *
     * @url	GET {id}
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List boms
     *
     * Get a list of boms
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
     * Create bom object
     *
     * @param array $request_data   Request datas
     * @return int  ID of bom
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update bom
     *
     * @param int   $id             Id of bom to update
     * @param array $request_data   Datas
     *
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete bom
     *
     * @param   int     $id   BOM ID
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Get lines of an BOM
     *
     * @param int   $id             Id of BOM
     *
     * @url	GET {id}/lines
     *
     * @return array
     */
    public function getLines($id)
    {
    }
    /**
     * Add a line to given BOM
     *
     * @param int   $id             Id of BOM to update
     * @param array $request_data   BOMLine data
     *
     * @url	POST {id}/lines
     *
     * @return int
     */
    public function postLine($id, $request_data = \null)
    {
    }
    /**
     * Update a line to given BOM
     *
     * @param int   $id             Id of BOM to update
     * @param int   $lineid         Id of line to update
     * @param array $request_data   BOMLine data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return object|bool
     */
    public function putLine($id, $lineid, $request_data = \null)
    {
    }
    /**
     * Delete a line to given BOM
     *
     *
     * @param int   $id             Id of BOM to update
     * @param int   $lineid         Id of line to delete
     *
     * @url	DELETE {id}/lines/{lineid}
     *
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     */
    public function deleteLine($id, $lineid)
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
    /**
     * Validate the ref field and get the next Number if it's necessary.
     *
     * @return void
     */
    private function checkRefNumbering() : void
    {
    }
}