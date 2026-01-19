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
     * @var KnowledgeRecord {@type KnowledgeRecord}
     */
    public $knowledgerecord;
    /**
     * Constructor
     *
     * @url     GET /
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a knowledgerecord object
     *
     * Return an array with knowledgerecord information
     *
     * @param	int		$id				ID of knowledgerecord
     * @return  Object					Object with cleaned properties
     *
     * @url	GET knowledgerecords/{id}
     *
     * @throws RestException 403 Not allowed
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
     * @param string			$sortfield			Sort field
     * @param string			$sortorder			Sort order
     * @param int				$limit				Limit for list
     * @param int				$page				Page number
     * @param int				$category			Use this param to filter list by category
     * @param string			$sqlfilters         Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string			$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool             $pagination_data     If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array                               Array of order objects
     * @phan-return KnowledgeRecord[]|array{data:KnowledgeRecord[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return KnowledgeRecord[]|array{data:KnowledgeRecord[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     *
     * @throws RestException
     *
     * @url	GET /knowledgerecords/
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $category = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create knowledgerecord object
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
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
     * @param 	int   	$id             	Id of knowledgerecord to update
     * @param 	array 	$request_data  		Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Updated object
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
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
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
     * Validate a knowledge
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @param   int		$id             knowledge ID
     * @param   int		$notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @return  Object
     */
    public function validate($id, $notrigger = 0)
    {
    }
    /**
     * Cancel a knowledge
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @param   int		$id             knowledge ID
     * @param   int		$notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/cancel
     *
     * @return  Object
     */
    public function cancel($id, $notrigger = 0)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,string> $data   Array of data to validate
     * @return array<string,string>
     *
     * @throws	RestException
     */
    private function _validate($data)
    {
    }
}