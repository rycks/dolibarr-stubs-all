<?php

/**
 * \file    htdocs/modulebuilder/template/class/api_mymodule.class.php
 * \ingroup mymodule
 * \brief   File for API management of myobject.
 */
/**
 * API class for mymodule myobject
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class MyModuleApi extends \DolibarrApi
{
    /**
     * @var MyObject $myobject {@type MyObject}
     */
    public $myobject;
    /**
     * Constructor
     *
     * @url     GET /
     *
     */
    public function __construct()
    {
    }
    /* BEGIN MODULEBUILDER API MYOBJECT */
    /**
     * Get properties of a myobject object
     *
     * Return an array with myobject information
     *
     * @param	int		$id				ID of myobject
     * @return  Object					Object with cleaned properties
     *
     * @url	GET myobjects/{id}
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     */
    public function get($id)
    {
    }
    /**
     * List myobjects
     *
     * Get a list of myobjects
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string		   $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return  array                               Array of order objects
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 503 System error
     *
     * @url	GET /myobjects/
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create myobject object
     *
     * @param array $request_data   Request datas
     * @return int  				ID of myobject
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 500 System error
     *
     * @url	POST myobjects/
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update myobject
     *
     * @param 	int   		$id             Id of myobject to update
     * @param 	array 		$request_data   Datas
     * @return 	Object						Object after update
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 500 System error
     *
     * @url	PUT myobjects/{id}
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete myobject
     *
     * @param   int     $id   MyObject ID
     * @return  array
     *
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 409 Nothing to do
     * @throws RestException 500 System error
     *
     * @url	DELETE myobjects/{id}
     */
    public function delete($id)
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
    private function _validateMyObject($data)
    {
    }
    /* END MODULEBUILDER API MYOBJECT */
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
}