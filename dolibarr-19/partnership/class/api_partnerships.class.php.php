<?php

/**
 * \file    partnership/class/api_partnerships.class.php
 * \ingroup partnership
 * \brief   File for API management of partnership.
 */
/**
 * API class for partnership partnership
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Partnerships extends \DolibarrApi
{
    /**
     * @var Partnership $partnership {@type Partnership}
     */
    public $partnership;
    /**
     * Constructor
     *
     * @url     GET /
     *
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a partnership object
     *
     * Return an array with partnership informations
     *
     * @param	int		$id				ID of partnership
     * @return  Object					Object with cleaned properties
     *
     * @url	GET partnerships/{id}
     *
     * @throws RestException 401 Not allowed
     * @throws RestException 404 Not found
     */
    public function get($id)
    {
    }
    /**
     * List partnerships
     *
     * Get a list of partnerships
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string		   $properties			Restrict the data returned to theses properties. Ignored if empty. Comma separated list of properties names
     * @return  array                               Array of order objects
     *
     * @throws RestException
     *
     * @url	GET /partnerships/
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create partnership object
     *
     * @param array $request_data   Request datas
     * @return int  ID of partnership
     *
     * @throws RestException
     *
     * @url	POST partnerships/
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update partnership
     *
     * @param int   $id             Id of partnership to update
     * @param array $request_data   Datas
     * @return int
     *
     * @throws RestException
     *
     * @url	PUT partnerships/{id}
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete partnership
     *
     * @param   int     $id   Partnership ID
     * @return  array
     *
     * @throws RestException
     *
     * @url	DELETE partnerships/{id}
     */
    public function delete($id)
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