<?php

/**
 * API class for subscriptions
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Subscriptions extends \DolibarrApi
{
    /**
     * @var string[]   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('fk_adherent', 'dateh', 'datef', 'amount');
    /**
     * @var Subscription $subscription {@type Subscription}
     */
    public $subscription;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a subscription object
     *
     * Return an array with subscription information
     *
     * @param   int     $id				ID of subscription
     * @return  Object					Object with cleaned properties
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		No Subscription found
     */
    public function get($id)
    {
    }
    /**
     * List subscriptions
     *
     * Get a list of subscriptions
     *
     * @param string    $sortfield  		Sort field
     * @param string    $sortorder  		Sort order
     * @param int       $limit     			Limit for list
     * @param int       $page       		Page number
     * @param string    $sqlfilters 		Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.import_key:<:'20160101')"
     * @param string 	$properties 		Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool      $pagination_data    If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return array 						Array of subscription objects
     * @phan-return array{data:Subscription[],pagination:array{total:int,page:int,page_count:int,limit:int}}|array<int,Subscription>
     * @phpstan-return array{data:Subscription[],pagination:array{total:int,page:int,page_count:int,limit:int}}|array<int,Subscription>
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		No Subscription found
     * @throws	RestException	503		Error when retrieving Subscription list
     */
    public function index($sortfield = "dateadh", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create subscription object
     *
     * @param array $request_data   Request data
     * @phan-param 	array<string,string>	$request_data
     * @phpstan-param 	array<string,string>	$request_data
     * @return int  ID of subscription
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	500		Error when creating Subscription
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update subscription
     *
     * @param 	int   		$id             ID of subscription to update
     * @param 	array 		$request_data   Data
     * @phan-param 	array<string,string>	$request_data
     * @phpstan-param 	array<string,string>	$request_data
     * @return 	Object						Updated object
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		No Subscription found
     * @throws	RestException	500		Error when updating Subscription
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete subscription
     *
     * @param int $id   ID of subscription to delete
     * @return array
     * @phan-return array<string,array{code:int,message:string}>
     * @phpstan-return array<string,array{code:int,message:string}>
     *
     * @throws	RestException	403		Access denied
     * @throws	RestException	404		No Subscription found
     * @throws	RestException	409		No Subscription deleted
     * @throws	RestException	500		Error when deleting Subscription
     */
    public function delete($id)
    {
    }
    /**
     * Validate fields before creating an object
     *
     * @param ?array<null|int|float|string>	$data   Data to validate
     * @return array<string,null|int|float|string>
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
}