<?php

/**
 * API class for Interventions
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Interventions extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('socid', 'fk_project', 'description');
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDSLINE = array('description', 'date', 'duree');
    /**
     * @var Fichinter $fichinter {@type fichinter}
     */
    public $fichinter;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a Expense Report object
     * Return an array with Expense Report information
     *
     * @param       int         $id         ID of Expense Report
     * @return		Object					Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * List of interventions
     * Return a list of interventions
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int		   $limit				Limit for list
     * @param int		   $page				Page number
     * @param string		   $thirdparty_ids			Thirdparty ids to filter orders of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string           $sqlfilters              Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string    $properties	Restrict the data returned to theses properties. Ignored if empty. Comma separated list of properties names
     * @return  array                                   Array of order objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create intervention object
     *
     * @param   array   $request_data   Request data
     * @return  int     ID of intervention
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Get lines of an intervention
     *
     * @param int   $id             Id of intervention
     *
     * @url	GET {id}/lines
     *
     * @return int
     */
    /* TODO
    	public function getLines($id)
    	{
    		if(! DolibarrApiAccess::$user->rights->ficheinter->lire) {
    			throw new RestException(401);
    		}
    
    		$result = $this->fichinter->fetch($id);
    		if( ! $result ) {
    			throw new RestException(404, 'Intervention not found');
    		}
    
    		if( ! DolibarrApi::_checkAccessToResource('fichinter',$this->fichinter->id)) {
    			throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    		}
    		$this->fichinter->getLinesArray();
    		$result = array();
    		foreach ($this->fichinter->lines as $line) {
    			array_push($result,$this->_cleanObjectDatas($line));
    		}
    		return $result;
    	}
    	*/
    /**
     * Add a line to a given intervention
     *
     * @param	int		$id             Id of intervention to update
     * @param   array   $request_data   Request data
     *
     * @url     POST {id}/lines
     *
     * @return  int
     */
    public function postLine($id, $request_data = \null)
    {
    }
    /**
     * Delete order
     *
     * @param   int     $id         Order ID
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Validate an intervention
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @param   int		$id             Intervention ID
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
     * Close an intervention
     *
     * @param		int		$id             Intervention ID
     *
     * @url POST    {id}/close
     *
     * @return  Object
     */
    public function closeFichinter($id)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param array $data   Data to validate
     * @return array
     *
     * @throws RestException
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
    /**
     * Validate fields before create or update object
     *
     * @param array $data   Data to validate
     * @return array
     *
     * @throws RestException
     */
    private function _validateLine($data)
    {
    }
}