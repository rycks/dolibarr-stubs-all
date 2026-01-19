<?php

/**
 * API class for salaries
 *
 * @access protected
 * @class DolibarrApiAccess {@requires user,external}
 */
class Salaries extends \DolibarrApi
{
    /**
     * @var string[] Mandatory fields, checked when creating an object
     */
    public static $FIELDS = array('fk_user', 'label', 'amount');
    /**
     * @var string[] Mandatory fields for mayment, checked when creating an object
     */
    public static $FIELDSPAYMENT = array("paiementtype", 'datepaye', 'chid', 'amounts');
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get the list of salaries.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Limit for list
     * @param int       $page       Page number
     * @return array                List of salary objects
     * @phan-return Salary[]
     * @phpstan-return Salary[]
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0)
    {
    }
    /**
     * Get salary by ID.
     *
     * @param 	int    $id    	ID of salary
     * @return 	Object			Salary object
     *
     * @throws RestException
     */
    public function get($id)
    {
    }
    /**
     * Create salary object
     *
     * @param 	array $request_data    	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	int 					ID of salary
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update salary
     *
     * @param 	int    	$id              	ID of salary
     * @param 	array  	$request_data    	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Updated object
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete salary
     *
     * @param int    $id    ID of salary
     * @return array
     */
    /*public function delete($id)
    	{
    		if (!DolibarrApiAccess::$user->hasRight('salaries', 'delete')) {
    			throw new RestException(403);
    		}
    		$salary = new Salary($this->db);
    		$result = $salary->fetch($id);
    		if (!$result) {
    			throw new RestException(404, 'salary not found');
    		}
    
    		if ($salary->delete(DolibarrApiAccess::$user) < 0) {
    			throw new RestException(500, 'error when deleting salary');
    		}
    
    		return array(
    			'success' => array(
    				'code' => 200,
    				'message' => 'salary deleted'
    			)
    		);
    	}*/
    /**
     * Get the list of payment of salaries.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Limit for list
     * @param int       $page       Page number
     * @return array                List of paymentsalary objects
     * @phan-return PaymentSalary[]
     * @phpstan-return PaymentSalary[]
     *
     * @url     GET /payments
     *
     * @throws RestException
     */
    public function getAllPayments($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0)
    {
    }
    /**
     * Get a given payment.
     *
     * @param 	int    $pid    	ID of payment salary
     * @return 	Object 			PaymentSalary object
     *
     * @url     GET /payments/{pid}
     *
     * @throws RestException
     */
    public function getPayments($pid)
    {
    }
    /**
     * Create payment salary on a salary
     *
     * @param 	int		$id					Id of salary
     * @param 	array 	$request_data    	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	int 						ID of paymentsalary
     *
     * @url     POST {id}/payments
     *
     * @throws RestException
     */
    public function addPayment($id, $request_data = \null)
    {
    }
    /**
     * Update paymentsalary
     *
     * @param 	int    $id              ID of paymentsalary
     * @param 	array  $request_data    data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object					PaymentSalary object
     *
     * @url     PUT {id}/payments
     *
     * @throws RestException
     */
    public function updatePayment($id, $request_data = \null)
    {
    }
    /**
     * Delete a payment salary
     *
     * @param int    $id    ID of payment salary
     * @return array
     *
     * @url     DELETE {id}/payments
     */
    /*public function delete($id)
    	 {
    	 if (!DolibarrApiAccess::$user->hasRight('salaries', 'delete')) {
    	 throw new RestException(403);
    	 }
    	 $paymentsalary = new PaymentSalary($this->db);
    	 $result = $paymentsalary->fetch($id);
    	 if (!$result) {
    	 throw new RestException(404, 'paymentsalary not found');
    	 }
    
    	 if ($paymentsalary->delete(DolibarrApiAccess::$user) < 0) {
    	 throw new RestException(500, 'error when deleting paymentsalary');
    	 }
    
    	 return array(
    	 'success' => array(
    	 'code' => 200,
    	 'message' => 'paymentsalary deleted'
    	 )
    	 );
    	 }*/
    /**
     * Validate fields before creating an object
     *
     * @param ?array<string,string> $data   Data to validate
     * @return array<string,string>
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
    /**
     * Validate fields before creating an object
     *
     * @param ?array<string,string> $data   Data to validate
     * @return array<string,string>
     *
     * @throws RestException
     */
    private function _validatepayments($data)
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