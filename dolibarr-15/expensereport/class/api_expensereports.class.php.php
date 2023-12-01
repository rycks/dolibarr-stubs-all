<?php

/**
 * API class for Expense Reports
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class ExpenseReports extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('fk_user_author');
    /**
     * @var ExpenseReport $expensereport {@type ExpenseReport}
     */
    public $expensereport;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a Expense Report object
     *
     * Return an array with Expense Report informations
     *
     * @param       int         $id         ID of Expense Report
     * @return 	    array|mixed             Data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List Expense Reports
     *
     * Get a list of Expense Reports
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string   	$user_ids   User ids filter field. Example: '1' or '1,2,3'          {@pattern /^[0-9,]*$/i}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return  array               Array of Expense Report objects
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $user_ids = 0, $sqlfilters = '')
    {
    }
    /**
     * Create Expense Report object
     *
     * @param   array   $request_data   Request data
     * @return  int                     ID of Expense Report
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Get lines of an Expense Report
     *
     * @param int   $id             Id of Expense Report
     *
     * @url	GET {id}/lines
     *
     * @return int
     */
    /*
    public function getLines($id)
    {
    	if(! DolibarrApiAccess::$user->rights->expensereport->lire) {
    		throw new RestException(401);
    	}
    
    	$result = $this->expensereport->fetch($id);
    	if( ! $result ) {
    		throw new RestException(404, 'expensereport not found');
    	}
    
    	if( ! DolibarrApi::_checkAccessToResource('expensereport',$this->expensereport->id)) {
    		throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    	}
    	$this->expensereport->getLinesArray();
    	$result = array();
    	foreach ($this->expensereport->lines as $line) {
    		array_push($result,$this->_cleanObjectDatas($line));
    	}
    	return $result;
    }
    */
    /**
     * Add a line to given Expense Report
     *
     * @param int   $id             Id of Expense Report to update
     * @param array $request_data   Expense Report data
     *
     * @url	POST {id}/lines
     *
     * @return int
     */
    /*
    public function postLine($id, $request_data = null)
    {
      if(! DolibarrApiAccess::$user->rights->expensereport->creer) {
    		  throw new RestException(401);
    	  }
    
      $result = $this->expensereport->fetch($id);
      if( ! $result ) {
    	 throw new RestException(404, 'expensereport not found');
      }
    
    	  if( ! DolibarrApi::_checkAccessToResource('expensereport',$this->expensereport->id)) {
    		  throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
      }
    
      $request_data = (object) $request_data;
    
      $request_data->desc = checkVal($request_data->desc, 'restricthtml');
      $request_data->label = checkVal($request_data->label);
    
      $updateRes = $this->expensereport->addline(
    					$request_data->desc,
    					$request_data->subprice,
    					$request_data->qty,
    					$request_data->tva_tx,
    					$request_data->localtax1_tx,
    					$request_data->localtax2_tx,
    					$request_data->fk_product,
    					$request_data->remise_percent,
    					$request_data->info_bits,
    					$request_data->fk_remise_except,
    					'HT',
    					0,
    					$request_data->date_start,
    					$request_data->date_end,
    					$request_data->product_type,
    					$request_data->rang,
    					$request_data->special_code,
    					$fk_parent_line,
    					$request_data->fk_fournprice,
    					$request_data->pa_ht,
    					$request_data->label,
    					$request_data->array_options,
    					$request_data->fk_unit,
    					$this->element,
    					$request_data->id
      );
    
      if ($updateRes > 0) {
    	return $updateRes;
    
      }
      return false;
    }
    */
    /**
     * Update a line to given Expense Report
     *
     * @param int   $id             Id of Expense Report to update
     * @param int   $lineid         Id of line to update
     * @param array $request_data   Expense Report data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return object
     */
    /*
    public function putLine($id, $lineid, $request_data = null)
    {
    	if(! DolibarrApiAccess::$user->rights->expensereport->creer) {
    		  throw new RestException(401);
    	}
    
    	$result = $this->expensereport->fetch($id);
    	if( ! $result ) {
    		throw new RestException(404, 'expensereport not found');
    	}
    
    	if( ! DolibarrApi::_checkAccessToResource('expensereport',$this->expensereport->id)) {
    		throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    	}
    
    	$request_data = (object) $request_data;
    
    	$request_data->desc = checkVal($request_data->desc, 'restricthtml');
    	$request_data->label = checkVal($request_data->label);
    
    	$updateRes = $this->expensereport->updateline(
    					$lineid,
    					$request_data->desc,
    					$request_data->subprice,
    					$request_data->qty,
    					$request_data->remise_percent,
    					$request_data->tva_tx,
    					$request_data->localtax1_tx,
    					$request_data->localtax2_tx,
    					'HT',
    					$request_data->info_bits,
    					$request_data->date_start,
    					$request_data->date_end,
    					$request_data->product_type,
    					$request_data->fk_parent_line,
    					0,
    					$request_data->fk_fournprice,
    					$request_data->pa_ht,
    					$request_data->label,
    					$request_data->special_code,
    					$request_data->array_options,
    					$request_data->fk_unit
    	);
    
    	if ($updateRes > 0) {
    		$result = $this->get($id);
    		unset($result->line);
    		return $this->_cleanObjectDatas($result);
    	}
    	return false;
    }
    */
    /**
     * Delete a line of given Expense Report
     *
     * @param int   $id             Id of Expense Report to update
     * @param int   $lineid         Id of line to delete
     *
     * @url	DELETE {id}/lines/{lineid}
     *
     * @return int
     */
    /*
    public function deleteLine($id, $lineid)
    {
      if(! DolibarrApiAccess::$user->rights->expensereport->creer) {
    		  throw new RestException(401);
    	  }
    
      $result = $this->expensereport->fetch($id);
      if( ! $result ) {
    	 throw new RestException(404, 'expensereport not found');
      }
    
    	  if( ! DolibarrApi::_checkAccessToResource('expensereport',$this->expensereport->id)) {
    		  throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
      }
    
      // TODO Check the lineid $lineid is a line of ojbect
    
      $updateRes = $this->expensereport->deleteline($lineid);
      if ($updateRes == 1) {
    	return $this->get($id);
      }
      return false;
    }
    */
    /**
     * Update Expense Report general fields (won't touch lines of expensereport)
     *
     * @param int   $id             Id of Expense Report to update
     * @param array $request_data   Datas
     *
     * @return int
     *
     * @throws	RestException	401		Not allowed
     * @throws  RestException	404		Expense report not found
     * @throws	RestException	500		System error
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete Expense Report
     *
     * @param   int     $id         Expense Report ID
     *
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Validate an Expense Report
     *
     * @param   int $id             Expense Report ID
     *
     * @url POST    {id}/validate
     *
     * @return  array
     * FIXME An error 403 is returned if the request has an empty body.
     * Error message: "Forbidden: Content type `text/plain` is not supported."
     * Workaround: send this in the body
     * {
     *   "idwarehouse": 0
     * }
     */
    /*
    	public function validate($id, $idwarehouse=0)
    	{
    		if(! DolibarrApiAccess::$user->rights->expensereport->creer) {
    			throw new RestException(401);
    		}
    
    		$result = $this->expensereport->fetch($id);
    		if( ! $result ) {
    			throw new RestException(404, 'expensereport not found');
    		}
    
    		if( ! DolibarrApi::_checkAccessToResource('expensereport',$this->expensereport->id)) {
    			throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    		}
    
    		if( ! $this->expensereport->valid(DolibarrApiAccess::$user, $idwarehouse)) {
    			throw new RestException(500, 'Error when validate expensereport');
    		}
    
    		return array(
    			'success' => array(
    				'code' => 200,
    				'message' => 'expensereport validated'
    			)
    		);
    	}*/
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
     * @param   array           $data   Array with data to verify
     * @return  array
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
}