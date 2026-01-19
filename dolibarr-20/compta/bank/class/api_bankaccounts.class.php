<?php

/**
 * API class for accounts
 *
 * @property DoliDB $db
 * @access protected
 * @class DolibarrApiAccess {@requires user,external}
 */
class BankAccounts extends \DolibarrApi
{
    /**
     * array $FIELDS Mandatory fields, checked when creating an object
     */
    public static $FIELDS = array('ref', 'label', 'type', 'currency_code', 'country_id');
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get the list of accounts.
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Limit for list
     * @param int       $page       Page number
     * @param  int		$category   Use this param to filter list by category
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.import_key:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return array                List of account objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $category = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Get account by ID.
     *
     * @param	int			$id				ID of account
     * @return  Object						Object with cleaned properties
     *
     * @throws RestException
     */
    public function get($id)
    {
    }
    /**
     * Create account object
     *
     * @param	array $request_data		Request data
     * @return	int						ID of account
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Create an internal wire transfer between two bank accounts
     *
     * @param int     $bankaccount_from_id  BankAccount ID to use as the source of the internal wire transfer		{@from body}{@required true}
     * @param int     $bankaccount_to_id    BankAccount ID to use as the destination of the internal wire transfer  {@from body}{@required true}
     * @param string  $date					Date of the internal wire transfer (UNIX timestamp)						{@from body}{@required true}{@type timestamp}
     * @param string  $description			Description of the internal wire transfer								{@from body}{@required true}
     * @param float	  $amount				Amount to transfer from the source to the destination BankAccount		{@from body}{@required true}
     * @param float	  $amount_to			Amount to transfer to the destination BankAccount (only when accounts does not share the same currency)		{@from body}{@required false}
     * @param string  $cheque_number        Cheque numero                                                           {@from body}{@required false}
     *
     * @url POST    /transfer
     *
     * @return array
     *
     * @status 201
     *
     * @throws RestException 401 Unauthorized: User does not have permission to configure bank accounts
     * @throws RestException 404 Not Found: Either the source or the destination bankaccount for the provided id does not exist
     * @throws RestException 422 Unprocessable Entity: Refer to detailed exception message for the cause
     * @throws RestException 500 Internal Server Error: Error(s) returned by the RDBMS
     */
    public function transfer($bankaccount_from_id = 0, $bankaccount_to_id = 0, $date = \null, $description = "", $amount = 0.0, $amount_to = 0.0, $cheque_number = "")
    {
    }
    /**
     * Update account
     *
     * @param	int    $id              ID of account
     * @param	array  $request_data    data
     * @return	Object					Object with cleaned properties
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete account
     *
     * @param int    $id    ID of account
     * @return array
     */
    public function delete($id)
    {
    }
    /**
     * Validate fields before creating an object
     *
     * @param array|null    $data    Data to validate
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
     * Get the list of lines of the account.
     *
     * @param int $id ID of account
     * @return array Array of AccountLine objects
     *
     * @throws RestException
     *
     * @url GET {id}/lines
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.import_key:<:'20160101')"
     */
    public function getLines($id, $sqlfilters = '')
    {
    }
    /**
     * Add a line to an account
     *
     * @param int    $id               ID of account
     * @param string $date             Payment date (timestamp) {@from body} {@type timestamp}
     * @param string $type             Payment mode (TYP,VIR,PRE,LIQ,VAD,CB,CHQ...) {@from body}
     * @param string $label            Label {@from body}
     * @param float  $amount           Amount (may be 0) {@from body}
     * @param int    $category         Category
     * @param string $cheque_number    Cheque numero {@from body}
     * @param string $cheque_writer    Name of cheque writer {@from body}
     * @param string $cheque_bank      Bank of cheque writer {@from body}
     * @param string $accountancycode  Accountancy code {@from body}
     * @param string $datev            Payment date value (timestamp) {@from body} {@type timestamp}
     * @param string $num_releve       Bank statement numero {@from body}
     * @return int					   ID of line
     *
     * @url POST {id}/lines
     */
    public function addLine($id, $date, $type, $label, $amount, $category = 0, $cheque_number = '', $cheque_writer = '', $cheque_bank = '', $accountancycode = '', $datev = \null, $num_releve = '')
    {
    }
    /**
     * Add a link to an account line
     *
     * @param int    $id			ID of account
     * @param int    $line_id       ID of account line
     * @param int    $url_id        ID to set in the URL {@from body}
     * @param string $url           URL of the link {@from body}
     * @param string $label         Label {@from body}
     * @param string $type          Type of link ('payment', 'company', 'member', ...) {@from body}
     * @return int  ID of link
     *
     * @url POST {id}/lines/{line_id}/links
     */
    public function addLink($id, $line_id, $url_id, $url, $label, $type)
    {
    }
    /**
     * Get the list of links for a line of the account.
     *
     * @param int    $id    		ID of account
     * @param int    $line_id       ID of account line
     * @return array Array of links
     *
     * @throws RestException
     *
     * @url GET {id}/lines/{line_id}/links
     *
     */
    public function getLinks($id, $line_id)
    {
    }
    /**
     * Update an account line
     *
     * @param int    $id    		ID of account
     * @param int    $line_id       ID of account line
     * @param string $label         Label {@from body}
     * @return int  ID of link
     *
     * @url PUT {id}/lines/{line_id}
     */
    public function updateLine($id, $line_id, $label)
    {
    }
    /**
     * Delete an account line
     *
     * @param int    $id    		ID of account
     * @param int    $line_id       ID of account line
     * @return array
     *
     * @url DELETE {id}/lines/{line_id}
     */
    public function deleteLine($id, $line_id)
    {
    }
}