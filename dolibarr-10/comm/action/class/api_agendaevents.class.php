<?php

/**
 * API class for Agenda Events
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class AgendaEvents extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array();
    /**
     * @var ActionComm $actioncomm {@type ActionComm}
     */
    public $actioncomm;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a Agenda Events object
     *
     * Return an array with Agenda Events informations
     *
     * @param       int         $id         ID of Agenda Events
     * @return 	    array|mixed             Data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List Agenda Events
     *
     * Get a list of Agenda Events
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string   	$user_ids   User ids filter field (owners of event). Example: '1' or '1,2,3'          {@pattern /^[0-9,]*$/i}
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.label:like:'%dol%') and (t.datec:<:'20160101')"
     * @return  array               Array of Agenda Events objects
     */
    public function index($sortfield = "t.id", $sortorder = 'ASC', $limit = 100, $page = 0, $user_ids = 0, $sqlfilters = '')
    {
    }
    /**
     * Create Agenda Event object
     *
     * @param   array   $request_data   Request data
     * @return  int                     ID of Agenda Event
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update Agenda Event general fields
     *
     * @param int   $id             Id of Agenda Event to update
     * @param array $request_data   Datas
     *
     * @return int
     */
    /*
    public function put($id, $request_data = null)
    {
        if (! DolibarrApiAccess::$user->rights->agenda->myactions->create) {
            throw new RestException(401, "Insuffisant rights to create your Agenda Event");
        }
        if (! DolibarrApiAccess::$user->rights->agenda->allactions->create && DolibarrApiAccess::$user->id != $request_data['userownerid']) {
            throw new RestException(401, "Insuffisant rights to create an Agenda Event for owner id ".$request_data['userownerid'].' Your id is '.DolibarrApiAccess::$user->id);
        }
    
        $result = $this->actioncomm->fetch($id);
        if ( ! $result ) {
            throw new RestException(404, 'actioncomm not found');
        }
    
        if ( ! DolibarrApi::_checkAccessToResource('actioncomm',$this->actioncomm->id)) {
            throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
        }
        foreach($request_data as $field => $value) {
            if ($field == 'id') continue;
            $this->actioncomm->$field = $value;
        }
    
        if ($this->actioncomm->update($id, DolibarrApiAccess::$user,1,'','','update'))
            return $this->get($id);
    
        return false;
    }
    */
    /**
     * Delete Agenda Event
     *
     * @param   int     $id         Agenda Event ID
     *
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param   array           $data   Array with data to verify
     * @return  array
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param	object	$object		Object to clean
     * @return	array				Array of cleaned object properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
}