<?php

/**
 * API class for accounts
 *
 * @access protected
 * @class DolibarrApiAccess {@requires user,external}
 */
class BankAccounts extends \DolibarrApi
{
    /**
     * array $FIELDS Mandatory fields, checked when creating an object
     */
    static $FIELDS = array('ref', 'label', 'type', 'currency_code', 'country_id');
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
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.import_key:<:'20160101')"
     * @return array                List of account objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '')
    {
    }
    /**
     * Get account by ID.
     *
     * @param int    $id    ID of account
     * @return array Account object
     *
     * @throws RestException
     */
    public function get($id)
    {
    }
    /**
     * Create account object
     *
     * @param array $request_data    Request data
     * @return int ID of account
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update account
     *
     * @param int    $id              ID of account
     * @param array  $request_data    data
     * @return int
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
     * @param object    $object    Object to clean
     * @return array Array of cleaned object properties
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
     */
    public function getLines($id)
    {
    }
    /**
     * Add a line to an account
     *
     * @param int    $id            ID of account
     * @param int    $date          Payment date (timestamp) {@from body} {@type timestamp}
     * @param string $type          Payment mode (TYP,VIR,PRE,LIQ,VAD,CB,CHQ...) {@from body}
     * @param string $label         Label {@from body}
     * @param float  $amount        Amount (may be 0) {@from body}
     * @param int    $category      Category
     * @param string $cheque_number Cheque numberl {@from body}
     * @param string $cheque_writer Name of cheque writer {@from body}
     * @param string $cheque_bank   Bank of cheque writer {@from body}
     * @return int  ID of line
     *
     * @url POST {id}/lines
     */
    public function addLine($id, $date, $type, $label, $amount, $category = 0, $cheque_number = '', $cheque_writer = '', $cheque_bank = '')
    {
    }
    /**
     * Add a link to an account line
     *
     * @param int    $id    		ID of account
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
}