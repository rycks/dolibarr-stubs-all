<?php

/**
 * API class for supplier proposal
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class SupplierProposals extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('socid');
    /**
     * @var SupplierProposal $supplier_proposal {@type SupplierProposal}
     */
    public $supplier_proposal;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Delete commercial proposal
     *
     * @param   int     $id         Supplier proposal ID
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Get properties of a supplier proposal (price request) object
     *
     * Return an array with supplier proposal information
     *
     * @param       int         $id         ID of supplier proposal
     * @return		Object					Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * Create supplier proposal (price request) object
     *
     * @param   array   $request_data   Request data
     * @return  int     ID of supplier proposal
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update supplier proposal general fields (won't touch lines of supplier proposal)
     *
     * @param	int		$id             Id of supplier proposal to update
     * @param	array	$request_data   Datas
     * @return	Object					Object with cleaned properties
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * List supplier proposals
     *
     * Get a list of supplier proposals
     *
     * @param string	$sortfield			Sort field
     * @param string	$sortorder			Sort order
     * @param int		$limit				Limit for list
     * @param int		$page				Page number
     * @param string	$thirdparty_ids		Thirdparty ids to filter supplier proposals (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string    $sqlfilters         Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.datec:<:'20160101')"
     * @param string    $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool      $pagination_data    If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array                       Array of order objects
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param   array           $data   Array with data to verify
     * @return  array
     * @throws  RestException
     */
    private function _validate($data)
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
}