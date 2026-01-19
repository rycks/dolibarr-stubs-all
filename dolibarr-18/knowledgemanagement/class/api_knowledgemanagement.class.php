<?php

/**
 * \file    knowledgemanagement/class/api_knowledgemanagement.class.php
 * \ingroup knowledgemanagement
 * \brief   File for API management of knowledgerecord.
 */
/**
 * API class for knowledgemanagement knowledgerecord
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class KnowledgeManagement extends \DolibarrApi
{
    /**
     * @var KnowledgeRecord $knowledgerecord {@type KnowledgeRecord}
     */
    public $knowledgerecord;
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
     * Get properties of a knowledgerecord object
     *
     * Return an array with knowledgerecord informations
     *
     * @param 	int 	$id 			ID of knowledgerecord
     * @return  Object              	Object with cleaned properties
     *
     * @url	GET knowledgerecords/{id}
     *
     * @throws RestException 401 Not allowed
     * @throws RestException 404 Not found
     */
    public function get($id)
    {
    }
    /**
     * Get categories for a knowledgerecord object
     *
     * @param int    $id        ID of knowledgerecord object
     * @param string $sortfield Sort field
     * @param string $sortorder Sort order
     * @param int    $limit     Limit for list
     * @param int    $page      Page number
     *
     * @return mixed
     *
     * @url GET /knowledgerecords/{id}/categories
     */
    public function getCategories($id, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    /**
     * List knowledgerecords
     *
     * Get a list of knowledgerecords
     *
     * @param string	       	$sortfield	        Sort field
     * @param string	       	$sortorder	        Sort order
     * @param int		       	$limit		        Limit for list
     * @param int		       	$page		        Page number
     * @param int				$category   		Use this param to filter list by category
     * @param string           	$sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return  array                               Array of order objects
     *
     * @throws RestException
     *
     * @url	GET /knowledgerecords/
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $category = 0, $sqlfilters = '')
    {
    }
    /**
     * Create knowledgerecord object
     *
     * @param array $request_data   Request datas
     * @return int  ID of knowledgerecord
     *
     * @throws RestException
     *
     * @url	POST knowledgerecords/
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update knowledgerecord
     *
     * @param int   $id             Id of knowledgerecord to update
     * @param array $request_data   Datas
     * @return int
     *
     * @throws RestException
     *
     * @url	PUT knowledgerecords/{id}
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete knowledgerecord
     *
     * @param   int     $id   KnowledgeRecord ID
     * @return  array
     *
     * @throws RestException
     *
     * @url	DELETE knowledgerecords/{id}
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