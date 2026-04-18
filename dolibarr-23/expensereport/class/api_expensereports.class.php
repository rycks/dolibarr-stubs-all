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
    public static $FIELDSLINE = array('date', 'fk_c_type_fees', 'qty', 'value_unit', 'vatrate');
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
     * Get lines of an expense report
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id		ID of the expense report
     *
     * @url	GET {id}/lines
     *
     * @return array
     * @phan-return ExpenseReportLine[]
     * @phpstan-return ExpenseReportLine[]
     *
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getLines($id)
    {
    }
    /**
     * Add a line to an expense report
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id				ID of the expense report to update
     * @param	array	$request_data	Expense Report line data
     * @phan-param ?array<string,mixed> $request_data
     * @phpstan-param ?array<string,mixed> $request_data
     *
     * @url	POST {id}/line
     *
     * @return int
     *
     * @throws RestException
     */
    public function postLine($id, $request_data = \null)
    {
    }
    /**
     * Update a line of an expense report
     *
     * @since	23.0.0		Initial implementation
     *
     * @param	int		$id				ID of the expense report
     * @param	int		$lineid			ID of the line to update
     * @param	array	$request_data	Expense Report data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return	Object|false			Object with cleaned properties
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500
     */
    public function putLine($id, $lineid, $request_data = \null)
    {
    }
    /**
     * Delete a line from an expense report
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id				ID of the expense report to update
     * @param	int		$lineid			ID of line to delete
     *
     * @url	DELETE {id}/lines/{lineid}
     *
     * @return object
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500
     */
    public function deleteLine($id, $lineid)
    {
    }
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
     * Set an expense report to draft
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id		Expense report ID
     *
     * @url		POST	{id}/settodraft
     *
     * @return	Object
     *
     * @throws RestException 304
     * @throws RestException 403
     * @throws RestException 404
     */
    public function setToDraft($id)
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
     * Cancel an expense report
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id				ID of the expense report
     * @param	string	$detail			Comments for cancellation
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *
     * @url		POST	{id}/cancel
     *
     * @return	Object
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500
     */
    public function cancel($id, $detail, $notrigger = 0)
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
     * @phpstan-template T
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     * @phpstan-param T $object
     * @phpstan-return T
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
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,null|int|float|string>	$data	Data to validate
     * @return array<string,null|int|float|string>			Return array with validated mandatory fields and their value
     *
     * @throws RestException
     */
    private function _validateLine($data)
    {
    }
}