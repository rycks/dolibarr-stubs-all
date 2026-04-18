<?php

/**
 * API for handling Object of table llx_c_email_templates
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class EmailTemplates extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('label', 'topic', 'type_template');
    /**
     * @var string[]       Mandatory fields which needs to be an integer, checked when create and update object
     */
    public static $INTFIELDS = array('active', 'private', 'fk_user', 'joinfiles', 'position');
    /**
     * @var CEmailTemplate {@type CEmailTemplate}
     */
    public $email_template;
    /**
     * @var string 	Name of table without prefix where object is stored. This is also the key used for extrafields management (so extrafields know the link to the parent table).
     */
    public $table_element = 'c_email_templates';
    /**
     * Constructor of the class
     */
    public function __construct()
    {
    }
    /**
     * Delete an email template
     *
     * @param   int     $id         email template ID
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
     * Delete an email template
     *
     * @param   string     $label         email template label
     * @return  array
     * @phan-return array<array<string,int|string>>
     * @phpstan-return array<array<string,int|string>>
     *
     * @url	DELETE label/{label}
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500
     */
    public function deleteByLAbel($label)
    {
    }
    /**
     * Get properties of a email template by id
     *
     * Return an array with email template information
     *
     * @param   int         $id		ID of email template
     * @return  Object				Object with cleaned properties
     * @phan-return		CEmailTemplate
     * @phpstan-return	CEmailTemplate
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
     * Get properties of an email template by label
     *
     * Return an array with order information
     *
     * @param       string		$label		Label of object
     * @return      Object				    Object with cleaned properties
     * @phan-return		CEmailTemplate
     * @phpstan-return	CEmailTemplate
     *
     * @url GET    label/{label}
     *
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getByLabel($label)
    {
    }
    /**
     * List email templates
     *
     * Get a list of email templates
     *
     * @param string	$sortfield			Sort field
     * @param string	$sortorder			Sort order
     * @param int		$limit				Limit for list
     * @param int		$page				Page number
     * @param string	$fk_user			User ids to filter email templates of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string	$sqlfilters			Other criteria to filter answers separated by a comma. Syntax example "(e.active:=:1) and (e.module:=:'adherent')"
     * @param string	$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool		$pagination_data	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array						Array of order objects
     * @phan-return CEmailTemplate[]|array{data:CEmailTemplate[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return CEmailTemplate[]|array{data:CEmailTemplate[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     *
     * @url GET
     *
     * @throws RestException 404 Not found
     * @throws RestException 503 Error
     */
    public function index($sortfield = "e.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $fk_user = '', $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create an email template
     *
     * Example: {"module":"adherent","type_template":"member","active": 1,"label":"(SendingEmailOnAutoSubscription)","fk_user":0,"joinfiles": "0", ... }
     * Required: {"label":"myBestTemplate","topic":"myBestOffer","type_template":"propal_send"}
     *
     * @param   array   $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url POST
     *
     * @return  int     ID of email template
     *
     * @throws	RestException 400
     * @throws	RestException 403
     * @throws	RestException 500
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update an email template
     *
     * Example: {"module":"adherent","type_template":"member","active": 1,"label":"(SendingEmailOnAutoSubscription)","fk_user":0,"joinfiles": "0", ... }
     * Required: {"label":"myBestTemplate","topic":"myBestOffer","type_template":"propal_send"}
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
     * @throws	RestException 400
     * @throws	RestException 403
     * @throws	RestException 404
     * @throws	RestException 500
     */
    public function putById($id, $request_data = \null)
    {
    }
    /**
     * Update an email template
     *
     * Example: {"module":"adherent","type_template":"member","active": 1,"label":"(SendingEmailOnAutoSubscription)","fk_user":0,"joinfiles": "0", ... }
     * Required: {"label":"myBestTemplate","topic":"myBestOffer","type_template":"propal_send"}
     *
     * @param	string	$label			Label of order to update
     * @param	array	$request_data	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     *
     * @url PUT label/{label}
     *
     * @return	Object					Object with cleaned properties
     *
     * @throws	RestException 400
     * @throws	RestException 404
     * @throws	RestException 500
     */
    public function putbyLabel($label, $request_data = \null)
    {
    }
    /**
     * Get properties of an email template
     *
     * Return an array with email templates
     *
     * @param   int         $id             ID of email_template
     * @param	string		$label			Label of email_template
     * @return  Object						Object with cleaned properties
     * @phan-return		CEmailTemplate
     * @phpstan-return	CEmailTemplate
     *
     * @throws	RestException 400
     * @throws	RestException 403
     * @throws	RestException 404
     */
    private function _fetch($id, $label = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     * @phpstan-template T
     *
     * @param   Object  $object     	Object to clean
     * @phan-param		CEmailTemplate	$object
     * @phpstan-param	T	$object
     *
     * @return  Object	Object with cleaned properties
     * @phan-return		CEmailTemplate
     * @phpstan-return	T
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
     * @return 	bool     					Return true if access is granted else false
     *
     * @throws  RestException 403
     */
    private function _checkAccessRights($accesstype)
    {
    }
}