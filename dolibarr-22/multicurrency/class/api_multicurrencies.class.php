<?php

/**
 * API class for MultiCurrency
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class MultiCurrencies extends \DolibarrApi
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * List Currencies
     *
     * Get a list of Currencies
     *
     * @param string	$sortfield		Sort field
     * @param string	$sortorder		Sort order
     * @param int		$limit			Limit for list
     * @param int	    $page			Page number
     * @param string    $sqlfilters		Other criteria to filter answers separated by a comma. Syntax example "(t.product_id:=:1) and (t.date_creation:<:'20160101')"
     * @param string    $properties		Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return array					Array of warehouse objects
     * @phan-return MultiCurrency[]
     * @phpstan-return MultiCurrency[]
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Get properties of a Currency object
     *
     * Return an array with Currency information
     *
     * @param	int			$id		ID of Currency
     * @return  Object              Object with cleaned properties
     *
     * @throws RestException
     */
    public function get($id)
    {
    }
    /**
     * Get properties of a Currency object by code
     *
     * Return an array with Currency information
     * @url GET /bycode/{code}
     *
     * @param	string		$code	Code of Currency (ex: EUR)
     * @return	array|mixed			Data without useless information
     *
     * @throws RestException
     */
    public function getByCode($code)
    {
    }
    /**
     * List Currency rates
     *
     * Get a list of Currency rates
     *
     * @url GET {id}/rates
     * @param	int		$id		ID of Currency
     * @return	array|mixed		Data without useless information
     *
     * @throws RestException
     */
    public function getRates($id)
    {
    }
    /**
     * Create Currency object
     *
     * @param array $request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int					ID of Currency
     *
     * @throws RestException
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update Currency
     *
     * @param 	int   $id             	Id of Currency to update
     * @param 	array $request_data   	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object					The updated Currency
     *
     * @throws RestException
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete Currency
     *
     * @param   int     $id	Currency ID
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException
     */
    public function delete($id)
    {
    }
    /**
     * Update Currency rate
     * @url PUT {id}/rates
     *
     * @param	int		$id				Currency ID
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object|false			Object with cleaned properties
     *
     * @throws RestException
     */
    public function updateRate($id, $request_data = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   MultiCurrency	$object		Object to clean
     * @return  Object						Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible MultiCurrencyRate object datas
     *
     * @param   MultiCurrency	$object     Object to clean
     * @return  Object						Object with cleaned properties
     */
    protected function _cleanObjectDatasRate($object)
    {
    }
}