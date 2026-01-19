<?php

/**
 * \file    htdocs/workstation/class/api_workstations.class.php
 * \ingroup workstation
 * \brief   File for API management of Workstations.
 */
/**
 * API class for workstations
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Workstations extends \DolibarrApi
{
    /**
     * @var Workstation {@type Workstation}
     */
    public $workstation;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a workstation object by id
     *
     * Return an array with workstation information.
     *
     * @param  int    $id                  ID of workstation
     * @return array|mixed                 Data without useless information
     *
     * @url    GET {id}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function get($id)
    {
    }
    /**
     * Get properties of a workstation object by ref
     *
     * Return an array with workstation information.
     *
     * @param  string $ref                Ref of element
     *
     * @return array|mixed                 Data without useless information
     *
     * @url GET ref/{ref}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByRef($ref)
    {
    }
    /**
     * List workstations
     *
     * Get a list of workstations
     *
     * @param  string $sortfield			Sort field
     * @param  string $sortorder			Sort order
     * @param  int    $limit				Limit for list
     * @param  int    $page					Page number
     * @param  string $sqlfilters			Other criteria to filter answers separated by a comma. Syntax example "(t.tobuy:=:0) and (t.tosell:=:1)"
     * @param string  $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return array						Array of workstation objects
     * @phan-return Workstation[]|array{data:Workstation[],pagination:array{total:int,page:int,pagecount:int,limit:int}}
     * @phpstan-return Workstation[]|array{data:Workstation[],pagination:array{total:int,page:int,pagecount:int,limit:int}}
     */
    public function index($sortfield = "t.ref", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
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
     * Get properties of 1 workstation object.
     * Return an array with workstation information.
     *
     * @param  int    $id						ID of product
     * @param  string $ref						Ref of element
     * @return array|mixed						Data without useless information
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    private function _fetch($id, $ref = '')
    {
    }
}