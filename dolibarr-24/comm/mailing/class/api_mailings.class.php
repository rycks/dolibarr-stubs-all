<?php

/**
 * API class for mass mailings
 *
 * @since	23.0.0	Initial implementation
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Mailings extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('title', 'sujet', 'body');
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $TARGETFIELDS = array('fk_mailing', 'email');
    /**
     * @var Mailing {@type Mailing}
     */
    public $mailing;
    /**
     * @var MailingTarget {@type MailingTarget}
     */
    public $mailing_target;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get a mass mailing
     *
     * Return an array with mass mailing information
     *
     * @since	23.0.0	Initial implementation
     *
     * @param   int         $id				ID of mass mailing
     * @return  Object						Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * Get properties of an mailing object
     *
     * Return an array with mailing information
     *
     * @param   int         $id             ID of mailing object
     * @return  Object						Object with cleaned properties
     *
     * @throws	RestException
     */
    private function _fetch($id)
    {
    }
    /**
     * List mass mailings
     *
     * Get a list of mass mailings
     *
     * @since	23.0.0	Initial implementation
     *
     * @param string	$sortfield			Sort field
     * @param string	$sortorder			Sort order
     * @param int		$limit				Limit for list
     * @param int		$page				Page number
     * @param string    $fk_projects        Project ids to filter mass mailings (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string    $sqlfilters         Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.datec:<:'2016-01-01')"
     * @param string    $properties	        Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool      $pagination_data    If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @param int		$loadlinkedobjects	Load also linked object
     * @return  array                       Array of order objects
     * @phan-return Mailing[]|array{data:Mailing[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return Mailing[]|array{data:Mailing[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     *
     * @throws RestException 400
     * @throws RestException 403
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $fk_projects = '', $sqlfilters = '', $properties = '', $pagination_data = \false, $loadlinkedobjects = 0)
    {
    }
    /**
     * List mass mailing targets
     *
     * Get a list of mass mailing targets
     *
     * @since	23.0.0	Initial implementation
     *
     * @param int       $id                 Mass mailing ID
     * @param string	$sortfield			Sort field
     * @param string	$sortorder			Sort order
     * @param int		$limit				Limit for list
     * @param int		$page				Page number
     * @param string    $sqlfilters         Other criteria to filter answers separated by a comma. Syntax example "(t.lastname:like:'John Doe') and (t.statut:=:3)"
     * @param string    $properties	        Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool      $pagination_data    If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array                       Array of order objects
     * @phan-return Mailing[]|array{data:Mailing[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return Mailing[]|array{data:Mailing[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     *
     * @url GET    {id}/targets
     *
     * @throws RestException 400
     * @throws RestException 403
     * @throws RestException 404
     */
    public function indexTargets($id, $sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Clone a mass mailing
     *
     * @since	23.0.0	Initial implementation
     *
     * @param  	int		$id     			Id of object to clone
     * @param	int		$cloneContent		1=Clone content (default), 0=Forget content
     * @param	int		$cloneRecipients	1=Clone recipients (default), 0=Forget recipients
     * @param	int		$notrigger			1=Disable triggers, 0=Active triggers if any (default)
     * @return 	Object 						Object with cleaned properties
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function clone($id, $cloneContent = 1, $cloneRecipients = 1, $notrigger = 0)
    {
    }
    /**
     * Create a mass mailing
     *
     * @since	23.0.0	Initial implementation
     *
     * @param   array   $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return  int     ID of mass mailing
     *
     * @throws RestException 403
     * @throws RestException 500 System error
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update a mass mailing general fields (won't change lines of mass mailing)
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id             Id of mass mailing to update
     * @param	array	$request_data   Datas
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object					Object with cleaned properties
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete a mass mailing
     *
     * @since	23.0.0	Initial implementation
     *
     * @param   int     $id         Mass mailing ID
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function delete($id)
    {
    }
    /**
     * Update a mass mailing general fields (won't change lines of mass mailing)
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id             Id of mass mailing with the targetid to update
     * @param	int		$targetid       Id mass mailing target to update
     * @param	array	$request_data   Datas
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object					Object with cleaned properties
     *
     * @url PUT    {id}/updateTarget/{targetid}
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function updateTarget($id, $targetid, $request_data = \null)
    {
    }
    /**
     * Create a mass mailing
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id             Id of mass mailing to create a target for
     * @param   array   $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return  int     ID of mass mailing
     *
     * @url POST    {id}/createTarget
     *
     * @throws RestException 400
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function postTarget($id, $request_data = \null)
    {
    }
    /**
     * Get a target in a mass mailing
     *
     * Return an array with info about a mass mailing target
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id             Id of mass mailing with the targetid to get
     * @param	int		$targetid       Id mass mailing target to get
     * @return  Object						Object with cleaned properties
     *
     * @url GET    {id}/getTarget/{targetid}
     *
     * @throws	RestException
     */
    public function getTarget($id, $targetid)
    {
    }
    /**
     * Get properties of an mailing object
     *
     * Return an array with mailing information
     *
     * @param   int     $id             ID of mailing object
     * @param	int		$targetid       Id mass mailing target
     * @return  Object						Object with cleaned properties
     *
     * @throws RestException 403
     * @throws RestException 404
     */
    private function _fetchTarget($id, $targetid)
    {
    }
    /**
     * Delete a mass mailing general fields (won't change lines of mass mailing)
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id             Id of mass mailing with the targetid to delete
     * @param	int		$targetid       Id mass mailing target to delete
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @url DELETE    {id}/deleteTarget/{targetid}
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function deleteTarget($id, $targetid)
    {
    }
    /**
     * Delete targets of a mass mailing
     *
     * @since	23.0.0	Initial implementation
     *
     * @param   int     $id         Mass mailing ID
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @url DELETE    {id}/deleteTargets
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function deleteTargets($id)
    {
    }
    /**
     * reset target status of a mass mailing
     *
     * @since	23.0.0	Initial implementation
     *
     * @param   int     $id         Mass mailing ID
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @url PUT    {id}/resetTargetsStatus
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function resetTargetsStatus($id)
    {
    }
    /**
     * Set a mass mailing to draft
     *
     * @since	23.0.0	Initial implementation
     *
     * @param   int     $id             Mass mailing ID
     * @return	Object					Object with cleaned properties
     *
     * @url PUT    {id}/settodraft
     *
     * @throws RestException 304
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function settodraft($id)
    {
    }
    /**
     * Validate a mass mailing
     *
     * If you get a bad value for param notrigger check that ou provide this in body
     * {
     * "notrigger": 0
     * }
     *
     * @since	23.0.0	Initial implementation
     *
     * @param   int     $id             Mass mailing ID
     * @return	Object					Object with cleaned properties
     *
     * @url PUT    {id}/validate
     *
     * @throws RestException 304
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function validate($id)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,string> $data   Array with data to verify
     * @return array<string,string>
     *
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
     *
     * @throws  RestException
     */
    private function _validateTarget($data)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object (mailing target) datas
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     */
    protected function _cleanTargetDatas($object)
    {
    }
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
}