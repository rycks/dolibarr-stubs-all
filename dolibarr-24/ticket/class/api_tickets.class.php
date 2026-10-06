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
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('subject', 'message');
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS_MESSAGES = array('track_id', 'message');
    /**
     * @var Ticket {@type Ticket}
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
     * Return an array with ticket information
     *
     * @param	int				$id				ID of ticket
     * @param   int         	$contact_list	0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return  Object							Object with cleaned properties
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function get($id, $contact_list = 1)
    {
    }
    /**
     * Get properties of a Ticket object from track id
     *
     * Return an array with ticket information
     *
     * @param	string			$track_id		Tracking ID of ticket
     * @param   int         	$contact_list	0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return	array|mixed						Data without useless information
     *
     * @url GET track_id/{track_id}
     *
     * @throws RestException	401
     * @throws RestException	403
     * @throws RestException	404
     */
    public function getByTrackId($track_id, $contact_list = 1)
    {
    }
    /**
     * Get properties of a Ticket object from ref
     *
     * Return an array with ticket information
     *
     * @param	string			$ref			Reference for ticket
     * @param   int         	$contact_list	0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return	array|mixed						Data without useless information
     *
     * @url GET ref/{ref}
     *
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByRef($ref, $contact_list = 1)
    {
    }
    /**
     * Get properties of a Ticket object
     * Return an array with ticket information
     *
     * @param	int				$id				ID of ticket
     * @param	string			$track_id		Tracking ID of ticket
     * @param	string			$ref			Reference for ticket
     * @param   int         	$contact_list	0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return	array|mixed						Data without useless information
     */
    private function getCommon($id = 0, $track_id = '', $ref = '', $contact_list = 1)
    {
    }
    /**
     * List tickets
     *
     * Get a list of tickets
     *
     * @param int       $socid      		Filter list with thirdparty ID
     * @param string	$sortfield			Sort field
     * @param string	$sortorder			Sort order
     * @param int		$limit				Limit for list
     * @param int		$page				Page number
     * @param string	$sqlfilters 		Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:>:'20160101') and (t.fk_statut:=:1)"
     * @param string    $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param int		$loadcontacts		Load also contacts/addresses (0=No, 1=Yes)
     * @param bool      $pagination_data    If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     *
     * @return array Array of ticket objects
     * @phan-return Ticket[]|array{data:Ticket[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return Ticket[]|array{data:Ticket[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     */
    public function index($socid = 0, $sortfield = "t.rowid", $sortorder = "ASC", $limit = 100, $page = 0, $sqlfilters = '', $properties = '', $loadcontacts = 0, $pagination_data = \false)
    {
    }
    /**
     * Create ticket object
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int  ID of ticket
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Add a new message to an existing ticket identified by property ->track_id into request.
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,mixed> $request_data
     * @phpstan-param ?array<string,mixed> $request_data
     * @return int|array  ID of ticket, or ticket/action IDs when requested
     * @phan-return int|array{ticket_id:int,action_id:int}
     * @phpstan-return int|array{ticket_id:int,action_id:int}
     */
    public function postNewMessage($request_data = \null)
    {
    }
    /**
     * Update ticket
     *
     * @param 	int   	$id             	Id of ticket to update
     * @param 	array 	$request_data   	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Updated object
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete ticket
     *
     * @param   int     $id   Ticket ID
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     */
    public function delete($id)
    {
    }
    /**
     * Validate fields before create or update object
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
     * Validate fields before create or update object message
     *
     * @param ?array<string,string> $data   Data to validate
     * @return array<string,string>
     *
     * @throws RestException
     */
    private function _validateMessage($data)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     * @phpstan-template T
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     *
     * @phpstan-param T $object
     * @phpstan-return T
     * @todo use an array for properties to clean
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Add a contact type of given ticket
     *
     * @param int    $id            Id of ticket to update
     * @param int    $contactid     Id of contact to add
     * @param string $type          Type (code in dictionary) of the contact (BILLING, SHIPPING, CUSTOMER + possibly your own)
     * @param string $source		internal=Contact intern (llx_user), external=Contact extern (llx_socpeople)
     * @param int    $notrigger		0=Enable all triggers (default), 1=Disable all triggers
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @url	POST {id}/contact/{contactid}/{type}
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 503
     */
    public function postContact(int $id, int $contactid, string $type, string $source = "external", int $notrigger = 0) : array
    {
    }
    /**
     * Unlink a contact type of given ticket
     *
     * @since	12.0.0	Initial implementation
     * @param int    $id             Id of ticket to update
     * @param int    $contactid      Id of contact
     * @param string $type           Type of the contact (BILLING, SHIPPING, CUSTOMER).
     * @param string $source		internal=Contact intern (llx_user), external=Contact extern (llx_socpeople)
     *
     * @url	DELETE {id}/contact/{contactid}/{type}
     *
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function deleteContact(int $id, int $contactid, string $type, string $source = "external") : array
    {
    }
}