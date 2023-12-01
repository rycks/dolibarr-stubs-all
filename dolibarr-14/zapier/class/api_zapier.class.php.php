<?php

/**
 * \file    htdocs/zapier/class/api_zapier.class.php
 * \ingroup zapier
 * \brief   File for API management of hook.
 */
/**
 * API class for zapier hook
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class ZapierApi extends \DolibarrApi
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
     * Return an array with hook informations
     *
     * @param   int             $id ID of hook
     * @return  array|mixed     data without useless information
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
     * Return an array with hook informations
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
     * @return  array                               Array of order objects
     *
     * @throws RestException
     *
     * @url GET /hooks/
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '')
    {
    }
    /**
     * Create hook object
     *
     * @param array $request_data   Request datas
     * @return int  ID of hook
     *
     * @url	POST /hook/
     */
    public function post($request_data = \null)
    {
    }
    // /**
    //  * Update hook
    //  *
    //  * @param int   $id             Id of hook to update
    //  * @param array $request_data   Datas
    //  * @return int
    //  *
    //  * @url	PUT /hooks/{id}
    //  */
    /*public function put($id, $request_data = null)
    	{
    		if (! DolibarrApiAccess::$user->rights->zapier->write) {
    			throw new RestException(401);
    		}
    
    		$result = $this->hook->fetch($id);
    		if( ! $result ) {
    			throw new RestException(404, 'Hook not found');
    		}
    
    		if( ! DolibarrApi::_checkAccessToResource('hook', $this->hook->id)) {
    			throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    		}
    
    		foreach($request_data as $field => $value) {
    			if ($field == 'id') {
    				continue;
    			}
    			$this->hook->$field = $value;
    		}
    
    		if ($this->hook->update($id, DolibarrApiAccess::$user) > 0) {
    			return $this->get($id);
    		} else {
    			throw new RestException(500, $this->hook->error);
    		}
    	}*/
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
     * @param   array       $data       Array of data to validate
     * @param   array       $fields     Array of fields needed
     * @return  array
     *
     * @throws  RestException
     */
    private function validate($data, $fields)
    {
    }
}