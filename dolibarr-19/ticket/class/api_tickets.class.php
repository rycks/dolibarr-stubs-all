<?php

/**
 * API class for ticket object
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Tickets extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('subject', 'message');
    /**
     * @var array   $FIELDS_MESSAGES     Mandatory fields, checked when create and update object
     */
    public static $FIELDS_MESSAGES = array('track_id', 'message');
    /**
     * @var Ticket $ticket {@type Ticket}
     */
    public $ticket;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a Ticket object.
     *
     * Return an array with ticket informations
     *
     * @param	int				$id			ID of ticket
     * @return  Object						Object with cleaned properties
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function get($id)
    {
    }
    /**
     * Get properties of a Ticket object from track id
     *
     * Return an array with ticket informations
     *
     * @param	string			$track_id	Tracking ID of ticket
     * @return	array|mixed					Data without useless information
     *
     * @url GET track_id/{track_id}
     *
     * @throws RestException	401
     * @throws RestException	403
     * @throws RestException	404
     */
    public function getByTrackId($track_id)
    {
    }
    /**
     * Get properties of a Ticket object from ref
     *
     * Return an array with ticket informations
     *
     * @param	string			$ref		Reference for ticket
     * @return	array|mixed					Data without useless information
     *
     * @url GET ref/{ref}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByRef($ref)
    {
    }
    /**
     * Get properties of a Ticket object
     * Return an array with ticket informations
     *
     * @param	int				$id			ID of ticket
     * @param	string			$track_id	Tracking ID of ticket
     * @param	string			$ref		Reference for ticket
     * @return	array|mixed					Data without useless information
     */
    private function getCommon($id = 0, $track_id = '', $ref = '')
    {
    }
    /**
     * List tickets
     *
     * Get a list of tickets
     *
     * @param int       $socid      Filter list with thirdparty ID
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string	$sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101') and (t.fk_statut:=:1)"
     * @param string    $properties	Restrict the data returned to theses properties. Ignored if empty. Comma separated list of properties names
     *
     * @return array Array of ticket objects
     *
     */
    public function index($socid = 0, $sortfield = "t.rowid", $sortorder = "ASC", $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create ticket object
     *
     * @param array $request_data   Request datas
     * @return int  ID of ticket
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Create ticket object
     *
     * @param array $request_data   Request datas
     * @return int  ID of ticket
     *
     */
    public function postNewMessage($request_data = \null)
    {
    }
    /**
     * Update ticket
     *
     * @param int   $id             Id of ticket to update
     * @param array $request_data   Datas
     * @return int
     *
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete ticket
     *
     * @param   int     $id   Ticket ID
     * @return  array
     *
     */
    public function delete($id)
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
    /**
     * Validate fields before create or update object message
     *
     * @param array $data   Data to validate
     * @return array
     *
     * @throws RestException
     */
    private function _validateMessage($data)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     *
     * @todo use an array for properties to clean
     *
     */
    protected function _cleanObjectDatas($object)
    {
    }
}