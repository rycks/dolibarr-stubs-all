<?php

/**
 * API class for zapier hook
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Zapier extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('url');
    /**
     * @var Hook $hook {@type Hook}
     */
    public $hook;
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
     * Get properties of a hook object
     *
     * Return an array with hook information
     *
     * @param   int             $id		ID of hook
     * @return  Object					Object with cleaned properties
     *
     * @url GET /hooks/{id}
     * @throws  RestException
     */
    public function get($id)
    {
    }
    /**
     * Get list of possibles choices for module
     *
     * Return an array with hook information
     *
     * @return  array     data
     *
     * @url GET /getmoduleschoices/
     * @throws  RestException
     */
    public function getModulesChoices()
    {
    }
    /**
     * List hooks
     *
     * Get a list of hooks
     *
     * @param string           $sortfield           Sort field
     * @param string           $sortorder           Sort order
     * @param int              $limit               Limit for list
     * @param int              $page                Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string		   $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return  array                               Array of order objects
     *
     * @throws RestException
     *
     * @url GET /hooks/
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create hook object
     *
     * @param array $request_data   Request datas
     * @return array  ID of hook
     *
     * @url	POST /hook/
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Delete hook
     *
     * @param   int     $id   Hook ID
     * @return  array
     *
     * @url DELETE /hook/{id}
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
    public function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param   array<string,mixed>	$data       Array of data to validate
     * @param   string[]			$fields     Array of fields needed
     * @return  array<string,mixed>
     *
     * @throws  RestException
     */
    private function validate($data, $fields)
    {
    }
}