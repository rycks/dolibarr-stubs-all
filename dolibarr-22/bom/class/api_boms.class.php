<?php

/**
 * \file    htdocs/bom/class/api_boms.class.php
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
     * @var BOM {@type BOM}
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
     * Return an array with bom information
     *
     * @param	int		$id				ID of bom
     * @return  Object					Object with cleaned properties
     * @phan-return BOM
     * @phpstan-return BOM
     *
     * @url	GET {id}
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		BOM not found
     */
    public function get($id)
    {
    }
    /**
     * List boms
     *
     * Get a list of boms
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string		   $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return  array                               Array of order objects
     * @phan-return BOM[]
     * @phpstan-return BOM[]
     *
     * @throws	RestException	400		Bad sqlfilters
     * @throws	RestException	403		Access denied
     * @throws	RestException	503		Error retrieving list of boms
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create bom object
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int  				ID of bom
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	500		Error retrieving list of boms
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update bom
     *
     * @param 	int   		$id             Id of bom to update
     * @param 	array 		$request_data   Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Object after update
     * @phan-return BOM
     * @phpstan-return BOM
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		BOM not found
     * @throws	RestException	500		Error updating bom
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete bom
     *
     * @param   int     $id   BOM ID
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		BOM not found
     * @throws	RestException	500		Error deleting bom
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
     * @phan-return BOMLine[]
     * @phpstan-return BOMLine[]
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		BOM not found
     */
    public function getLines($id)
    {
    }
    /**
     * Add a line to given BOM
     *
     * @param int   $id             Id of BOM to update
     * @param array $request_data   BOMLine data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url	POST {id}/lines
     *
     * @return int
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		BOM not found
     * @throws	RestException	500		Error adding bom line
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
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return object|bool
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		BOM not found
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
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		BOM not found
     * @throws	RestException	500		Error deleting bom line
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
     * @param	?array<string,string>		$data   Array of data to validate
     * @return	array<string,string>
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