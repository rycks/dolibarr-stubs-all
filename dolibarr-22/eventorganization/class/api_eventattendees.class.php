<?php

/**
 * API for handling Object of table llx_eventorganization_conferenceorboothattendee
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class EventAttendees extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('fk_project');
    /**
     * @var string[]       Mandatory fields which needs to be an integer, checked when create and update object
     */
    public static $INTFIELDS = array('fk_soc', 'fk_actioncomm', 'fk_project', 'fk_invoice', 'status');
    /**
     * @var ConferenceOrBoothAttendee {@type ConferenceOrBoothAttendee}
     */
    public $event_attendees;
    /**
     * @var string 	Name of table without prefix where object is stored. This is also the key used for extrafields management (so extrafields know the link to the parent table).
     */
    public $table_element = 'eventorganization_conferenceorboothattendee';
    /**
     * Constructor of the class
     */
    public function __construct()
    {
    }
    /**
     * Delete an event attendee
     *
     * @param   int     $id         event attendee ID
     * @return  array
     * @phan-return array<array<string,int|string>>
     * @phpstan-return array<array<string,int|string>>
     *
     * @url	DELETE {id}
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500
     */
    public function deleteById($id)
    {
    }
    /**
     * Delete an event attendee
     *
     * @param   string     $ref         event attendee ref
     * @return  array
     * @phan-return array<array<string,int|string>>
     * @phpstan-return array<array<string,int|string>>
     *
     * @url	DELETE ref/{ref}
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500
     */
    public function deleteByRef($ref)
    {
    }
    /**
     * Get properties of a event attendee by id
     *
     * Return an array with event attendee information
     *
     * @param   int         $id		ID of event attendee
     * @return  Object				Object with cleaned properties
     * @phan-return		ConferenceOrBoothAttendee
     * @phpstan-return	ConferenceOrBoothAttendee
     *
     * @url	GET {id}
     *
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getById($id)
    {
    }
    /**
     * Get properties of an event attendee by ref
     *
     * Return an array with order information
     *
     * @param       string		$ref		Ref of object
     * @return      Object				    Object with cleaned properties
     * @phan-return		ConferenceOrBoothAttendee
     * @phpstan-return	ConferenceOrBoothAttendee
     *
     * @url GET    ref/{ref}
     *
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByRef($ref)
    {
    }
    /**
     * List Event attendees
     *
     * Get a list of Event attendees
     *
     * @param string	$sortfield			Sort field
     * @param string	$sortorder			Sort order
     * @param int		$limit				Limit for list
     * @param int		$page				Page number
     * @param string	$sqlfilters			Other criteria to filter answers separated by a comma. Syntax example "(t.status:=:1) and (t.email:=:'bad@example.com')"
     * @param string	$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool		$pagination_data	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array						Array of order objects
     * @phan-return ConferenceOrBoothAttendee[]|array{data:ConferenceOrBoothAttendee[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return ConferenceOrBoothAttendee[]|array{data:ConferenceOrBoothAttendee[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     *
     * @url GET
     *
     * @throws RestException 403 Access denied
     * @throws RestException 503 Error
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create an event attendee
     *
     * Example: {"module":"adherent","type_template":"member","active": 1,"ref":"(SendingEmailOnAutoSubscription)","fk_user":0,"joinfiles": "0", ... }
     * Required: {"ref":"myBestTemplate","topic":"myBestOffer","type_template":"propal_send"}
     *
     * @param   array   $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url POST
     *
     * @return  int     ID of event attendee
     *
     * @throws	RestException 304
     * @throws	RestException 403
     * @throws	RestException 500
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update an event attendee
     *
     * Example: {"module":"adherent","type_template":"member","active": 1,"ref":"(SendingEmailOnAutoSubscription)","fk_user":0,"joinfiles": "0", ... }
     * Required: {"ref":"myBestTemplate","topic":"myBestOffer","type_template":"propal_send"}
     *
     * @param	int		$id             Id of order to update
     * @param	array	$request_data   Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url PUT {id}
     *
     * @return	Object					Object with cleaned properties
     *
     * @throws	RestException 403
     * @throws	RestException 404
     * @throws	RestException 500
     */
    public function putById($id, $request_data = \null)
    {
    }
    /**
     * Update an event attendee
     *
     * Example: {"module":"adherent","type_template":"member","active": 1,"ref":"(SendingEmailOnAutoSubscription)","fk_user":0,"joinfiles": "0", ... }
     * Required: {"ref":"myBestTemplate","topic":"myBestOffer","type_template":"propal_send"}
     *
     * @param	string	$ref			Ref of order to update
     * @param	array	$request_data	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url PUT ref/{ref}
     *
     * @return	Object					Object with cleaned properties
     *
     * @throws	RestException 403
     * @throws	RestException 404
     * @throws	RestException 500
     */
    public function putByRef($ref, $request_data = \null)
    {
    }
    /**
     * Get properties of an event attendee
     *
     * Return an array with Event attendees
     *
     * @param   int         $id             ID of event_attendees
     * @param	string		$ref			Ref of event_attendees
     * @return  Object						Object with cleaned properties
     * @phan-return		ConferenceOrBoothAttendee
     * @phpstan-return	ConferenceOrBoothAttendee
     *
     * @throws	RestException 403
     * @throws	RestException 404
     */
    private function _fetch($id, $ref = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object     	Object to clean
     * @phan-param		ConferenceOrBoothAttendee	$object
     * @phpstan-param	ConferenceOrBoothAttendee	$object
     *
     * @return  Object	Object with cleaned properties
     * @phan-return		ConferenceOrBoothAttendee
     * @phpstan-return	ConferenceOrBoothAttendee
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,null|int|string>	$data   Data to validate
     * @return array<string,null|int|string>			Return array with validated mandatory fields and their value
     * @phan-return array<string,?int|?string>			Return array with validated mandatory fields and their value
     *
     * @throws  RestException 400
     */
    private function _validate($data)
    {
    }
    /**
     * function to check for access rights - should probably have 1. parameter which is read/write/delete/...
     * Why a separate function? because we probably needs to check so many many different kinds of objects
     *
     * @param	string		$accesstype		accesstype: read, write, delete, ...
     * @param	int			$project_id		which project do we need to check for access to, 0 means don't check
     * @return 	bool     					Return true if access is granted else false
     *
     * @throws  RestException 403
     * @throws  RestException 500
     */
    private function _checkAccessRights($accesstype, $project_id = 0)
    {
    }
}