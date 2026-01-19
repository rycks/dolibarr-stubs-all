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
class Recruitment extends \DolibarrApi
{
    /**
     * @var RecruitmentJobPosition $jobposition {@type RecruitmentJobPosition}
     */
    public $jobposition;
    /**
     * @var RecruitmentCandidature $candidature {@type RecruitmentCandidature}
     */
    public $candidature;
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
     * Get properties of a jobposition object
     *
     * Return an array with jobposition informations
     *
     * @param 	int 	$id ID of jobposition
     * @return 	array|mixed data without useless information
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
     * Return an array with candidature informations
     *
     * @param 	int 	$id ID of candidature
     * @return 	array|mixed data without useless information
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
     * @param string	       $sortfield	        Sort field
     * @param string	       $sortorder	        Sort order
     * @param int		       $limit		        Limit for list
     * @param int		       $page		        Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return  array                               Array of order objects
     *
     * @throws RestException
     *
     * @url	GET /jobposition/
     */
    public function indexJobPosition($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '')
    {
    }
    /**
     * List candatures
     *
     * Get a list of candidatures
     *
     * @param string	       $sortfield	        Sort field
     * @param string	       $sortorder	        Sort order
     * @param int		       $limit		        Limit for list
     * @param int		       $page		        Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return  array                               Array of order objects
     *
     * @throws RestException
     *
     * @url	GET /candidature/
     */
    public function indexCandidature($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '')
    {
    }
    /**
     * Create jobposition object
     *
     * @param array $request_data   Request datas
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
     * @param array $request_data   Request datas
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
     * @param int   $id             Id of jobposition to update
     * @param array $request_data   Datas
     * @return int
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
     * @param int   $id             Id of candidature to update
     * @param array $request_data   Datas
     * @return int
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
     * @param	array		$data   Array of data to validate
     * @return	array
     *
     * @throws	RestException
     */
    private function _validate($data)
    {
    }
}