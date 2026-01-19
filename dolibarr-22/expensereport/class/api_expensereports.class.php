<?php

/**
 * API class for Expense Reports
 *
 * @since	5.0.0	Initial implementation
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class ExpenseReports extends \DolibarrApi
{
    /**
     * @var string[]	Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('fk_user_author', 'date_debut', 'date_fin');
    /**
     * @var string[]	Mandatory fields, checked when create and update object
     */
    public static $FIELDSPAYMENT = array("fk_typepayment", 'datepaid', 'amounts');
    /**
     * @var ExpenseReport {@type ExpenseReport}
     */
    public $expensereport;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get an expense report
     *
     * Return an array with Expense Report information
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int		$id		ID of Expense Report
     * @return	Object			Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * List expense reports
     *
     * Get a list of Expense Reports
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	string		$sortfield			Sort field
     * @param	string		$sortorder			Sort order
     * @param	int			$limit				List limit
     * @param	int			$page				Page number
     * @param	string		$user_ids   		User ids filter field. Example: '1' or '1,2,3'          {@pattern /^[0-9,]*$/i}
     * @param	string		$sqlfilters 		Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param	string		$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param	bool		$pagination_data	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return	array							Array of order objects
     * @phan-return ExpenseReport[]
     * @phpstan-return ExpenseReport[]
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $user_ids = '', $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create an expense report
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	int						ID of Expense Report
     *
     * @throws RestException
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
    	if(! DolibarrApiAccess::$user->hasRight('expensereport', 'lire')) {
    		throw new RestException(403);
    	}
    
    	$result = $this->expensereport->fetch($id);
    	if( ! $result ) {
    		throw new RestException(404, 'expensereport not found');
    	}
    
    	if( ! DolibarrApi::_checkAccessToResource('expensereport',$this->expensereport->id)) {
    		throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
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
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url	POST {id}/lines
     *
     * @return int
     */
    /*
    public function postLine($id, $request_data = null)
    {
      if(! DolibarrApiAccess::$user->hasRight('expensereport', 'creer')) {
    		  throw new RestException(403);
    	  }
    
      $result = $this->expensereport->fetch($id);
      if( ! $result ) {
    	 throw new RestException(404, 'expensereport not found');
      }
    
    	  if( ! DolibarrApi::_checkAccessToResource('expensereport',$this->expensereport->id)) {
    		  throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
      }
    
      $request_data = (object) $request_data;
    
      $request_data->desc = sanitizeVal($request_data->desc, 'restricthtml');
      $request_data->label = sanitizeVal($request_data->label);
    
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
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return object
     */
    /*
    public function putLine($id, $lineid, $request_data = null)
    {
    	if(! DolibarrApiAccess::$user->hasRight('expensereport', 'creer')) {
    		  throw new RestException(403);
    	}
    
    	$result = $this->expensereport->fetch($id);
    	if( ! $result ) {
    		throw new RestException(404, 'expensereport not found');
    	}
    
    	if( ! DolibarrApi::_checkAccessToResource('expensereport',$this->expensereport->id)) {
    		throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    	}
    
    	$request_data = (object) $request_data;
    
    	$request_data->desc = sanitizeVal($request_data->desc, 'restricthtml');
    	$request_data->label = sanitizeVal($request_data->label);
    
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
      if(! DolibarrApiAccess::$user->hasRight('expensereport', 'creer')) {
    		  throw new RestException(403);
    	  }
    
      $result = $this->expensereport->fetch($id);
      if( ! $result ) {
    	 throw new RestException(404, 'expensereport not found');
      }
    
    	  if( ! DolibarrApi::_checkAccessToResource('expensereport',$this->expensereport->id)) {
    		  throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
      }
    
      // TODO Check the lineid $lineid is a line of object
    
      $updateRes = $this->expensereport->deleteLine($lineid);
      if ($updateRes == 1) {
    	return $this->get($id);
      }
      return false;
    }
    */
    /**
     * Update expense report general fields
     *
     * Does not touch lines of the expense report
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int		$id					ID of Expense Report to update
     * @param	array	$request_data		Expense report data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object						Updated object
     *
     * @throws	RestException	401		Not allowed
     * @throws  RestException	404		Expense report not found
     * @throws	RestException	500		System error
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete expense report
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int		$id		Expense Report ID
     * @return	array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException
     */
    public function delete($id)
    {
    }
    /**
     * Validate an expense report
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @since	22.0.0	Initial implementation
     *
     * @param	int		$id				Expense report ID
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *
     * @url		POST	{id}/validate
     *
     * @return	Object
     *
     * @throws RestException
     */
    public function validate($id, $notrigger = 0)
    {
    }
    /**
     * Approve an expense report
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @since	22.0.0	Initial implementation
     *
     * @param	int		$id				Expense report ID
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *
     * @url		POST	{id}/approve
     *
     * @return	Object
     *
     * @throws RestException
     */
    public function approve($id, $notrigger = 0)
    {
    }
    /**
     * Deny an expense report
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @since	22.0.0	Initial implementation
     *
     * @param	int		$id				Expense report ID
     * @param	string	$details		Comments for denial
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *
     * @url		POST	{id}/deny
     *
     * @return	Object
     *
     * @throws RestException
     */
    public function deny($id, $details, $notrigger = 0)
    {
    }
    /**
     * Get the list of payments of an expense report
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	string	$sortfield		Sort field
     * @param	string	$sortorder		Sort order
     * @param	int		$limit			List limit
     * @param	int		$page			Page number
     * @return	array					List of paymentExpenseReport objects
     * @phan-return PaymentExpenseReport[]
     * @phpstan-return PaymentExpenseReport[]
     *
     * @url     GET /payments
     *
     * @throws RestException
     */
    public function getAllPayments($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0)
    {
    }
    /**
     * Get an expense report payment
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	int		$pid	Payment ID
     * @return	object			PaymentExpenseReport object
     *
     * @url     GET /payments/{pid}
     *
     * @throws RestException
     */
    public function getPayments($pid)
    {
    }
    /**
     * Create a payment for an expense report
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	int		$id								ID of an expense report
     * @param	array	$request_data   {@from body}	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	int									ID of paymentExpenseReport
     *
     * @url     POST {id}/payments
     * @throws RestException
     */
    public function addPayment($id, $request_data = \null)
    {
    }
    /**
     * Update a payment of an expense report
     *
     * @since	20.0.0	Initial implementation
     *
     * @param	int		$id				ID of paymentExpenseReport
     * @param	array	$request_data	data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	object
     *
     * @url     PUT {id}/payments
     * @throws RestException
     */
    public function updatePayment($id, $request_data = \null)
    {
    }
    /**
     * Delete paymentExpenseReport
     *
     * @param 	int    $id    ID of payment ExpenseReport
     * @return 	array
     *
     * @url     DELETE {id}/payments
     */
    /*public function delete($id)
    	 {
    	 if (!DolibarrApiAccess::$user->hasRight('expensereport', 'creer') {
    	 throw new RestException(403);
    	 }
    	 $paymentExpenseReport = new PaymentExpenseReport($this->db);
    	 $result = $paymentExpenseReport->fetch($id);
    	 if (!$result) {
    	 throw new RestException(404, 'paymentExpenseReport not found');
    	 }
    
    	 if ($paymentExpenseReport->delete(DolibarrApiAccess::$user) < 0) {
    	 throw new RestException(403, 'error when deleting paymentExpenseReport');
    	 }
    
    	 return array(
    	 'success' => array(
    	 'code' => 200,
    	 'message' => 'paymentExpenseReport deleted'
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
     * @param ?array<string,string> $data   Array with data to verify
     * @return array<string,string>
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,string> $data   Array with data to verify
     * @return array<string,string>
     * @throws  RestException
     */
    private function _validatepayment($data)
    {
    }
}