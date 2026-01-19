<?php

/**
 * \file    recruitment/class/api_recruitment.class.php
 * \ingroup recruitment
 * \brief   File for API management of recruitment.
 */
/**
 * API class for recruitment
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Recruitments extends \DolibarrApi
{
    /**
     * @var RecruitmentJobPosition {@type RecruitmentJobPosition}
     */
    public $jobposition;
    /**
     * @var RecruitmentCandidature {@type RecruitmentCandidature}
     */
    public $candidature;
    /**
     * Constructor
     *
     * @url     GET /
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a jobposition object
     *
     * Return an array with jobposition information
     *
     * @param	int			$id		ID of jobposition
     * @return  Object				Object with cleaned properties
     *
     * @url	GET jobposition/{id}
     *
     * @throws RestException 401 Not allowed
     * @throws RestException 404 Not found
     */
    public function getJobPosition($id)
    {
    }
    /**
     * Get properties of a candidature object
     *
     * Return an array with candidature information
     *
     * @param	int		$id		ID of candidature
     * @return  Object          Object with cleaned properties
     *
     * @url	GET candidature/{id}
     *
     * @throws RestException 401 Not allowed
     * @throws RestException 404 Not found
     */
    public function getCandidature($id)
    {
    }
    /**
     * List jobpositions
     *
     * Get a list of jobpositions
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool             $pagination_data     If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array                               Array of order objects
     * @phan-return array<string,mixed>
     * @phpstan-return array<string,mixed>
     *
     * @throws RestException
     *
     * @url	GET /jobposition/
     */
    public function indexJobPosition($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * List candatures
     *
     * Get a list of candidatures
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string		   $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool             $pagination_data     If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array                               Array of order objects
     * @phan-return array<string,mixed>
     * @phpstan-return array<string,mixed>
     *
     * @throws RestException
     *
     * @url	GET /candidature/
     */
    public function indexCandidature($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create jobposition object
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,mixed> $request_data
     * @phpstan-param ?array<string,mixed> $request_data
     * @return int  ID of jobposition
     *
     * @throws RestException
     *
     * @url	POST jobposition/
     */
    public function postJobPosition($request_data = \null)
    {
    }
    /**
     * Create candidature object
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int  ID of candidature
     *
     * @throws RestException
     *
     * @url	POST candidature/
     */
    public function postCandidature($request_data = \null)
    {
    }
    /**
     * Update jobposition
     *
     * @param int   $id						Id of jobposition to update
     * @param array $request_data			Data
     * @phan-param ?array<string,mixed> $request_data
     * @phpstan-param ?array<string,mixed> $request_data
     * @return		Object					Object with cleaned properties
     *
     * @throws RestException
     *
     * @url	PUT jobposition/{id}
     */
    public function putJobPosition($id, $request_data = \null)
    {
    }
    /**
     * Update candidature
     *
     * @param	int		$id             Id of candidature to update
     * @param	array	$request_data   Datas
     * @phan-param ?array<string,mixed> $request_data
     * @phpstan-param ?array<string,mixed> $request_data
     * @return  Object					Object with cleaned properties
     *
     * @throws RestException
     *
     * @url	PUT candidature/{id}
     */
    public function putCandidature($id, $request_data = \null)
    {
    }
    /**
     * Delete jobposition
     *
     * @param   int     $id   jobposition ID
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException
     *
     * @url	DELETE jobposition/{id}
     */
    public function deleteJobPosition($id)
    {
    }
    /**
     * Delete candidature
     *
     * @param   int     $id   candidature ID
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException
     *
     * @url	DELETE candidature/{id}
     */
    public function deleteCandidature($id)
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
     * @param	?array<string,mixed>		$data   Array of data to validate
     * @return	array<string,mixed>
     *
     * @throws	RestException
     */
    private function _validate($data)
    {
    }
}