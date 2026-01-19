<?php

/**
 *      Class to manage the table of subscription to notifications
 */
class Notify
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string type
     */
    public $type;
    /**
     * @var string threshold
     */
    public $threshold;
    /**
     * @var string context
     */
    public $context;
    /**
     * @var int		ID of event action that trigger the notification
     */
    public $event;
    /**
     * @var int		Third-party ID
     */
    public $socid;
    /**
     * @var int		(Third-party) Contact ID
     */
    public $contact_id;
    /**
     * @var string fk_user
     */
    public $fk_user;
    /**
     * @var string email
     */
    public $email;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date modified record (datem)
     *
     * @var integer
     */
    public $datem;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    public $author;
    public $ref;
    public $date;
    public $duree;
    public $note;
    /**
     * @var int Project ID
     */
    public $fk_project;
    // This codes actions are defined into table llx_notify_def
    public static $arrayofnotifsupported = array('BILL_CANCEL', 'BILL_VALIDATE', 'BILL_PAYED', 'ORDER_CANCEL', 'ORDER_CREATE', 'ORDER_VALIDATE', 'ORDER_CLOSE', 'PROPAL_VALIDATE', 'PROPAL_CLOSE_SIGNED', 'PROPAL_CLOSE_REFUSED', 'FICHINTER_VALIDATE', 'FICHINTER_CLOSE', 'FICHINTER_ADD_CONTACT', 'ORDER_SUPPLIER_CANCEL', 'ORDER_SUPPLIER_VALIDATE', 'ORDER_SUPPLIER_APPROVE', 'ORDER_SUPPLIER_SUBMIT', 'ORDER_SUPPLIER_REFUSE', 'SHIPPING_VALIDATE', 'EXPENSE_REPORT_VALIDATE', 'EXPENSE_REPORT_APPROVE', 'HOLIDAY_VALIDATE', 'HOLIDAY_APPROVE', 'ACTION_CREATE');
    /**
     *	Constructor
     *
     *	@param 		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Return message that say how many notification (and to which email) will occurs on requested event.
     *	This is to show confirmation messages before event is recorded.
     *
     * 	@param	string	$action		Id of action in llx_c_action_trigger
     * 	@param	int		$socid		Id of third party
     *  @param	Object	$object		Object the notification is about
     *	@return	string				Message
     */
    public function confirmMessage($action, $socid, $object)
    {
    }
    /**
     *  Delete a notification from database
     *
     *	@param		User|null	$user		User deleting
     *  @return		int		    	        Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user = \null)
    {
    }
    /**
     * Create notification information record.
     *
     * @param   User|null   $user		User
     * @param   int    		$notrigger  1=Disable triggers
     * @return	int						Return integer <0 if KO, > 0 if OK (ID of newly created company notification information)
     */
    public function create(\User $user = \null, $notrigger = 0)
    {
    }
    /**
     * 	Load record from database
     *
     *	@param	int		$id			Id of record
     * 	@param	int		$socid		Id of company. If this is filled, function will return only records belonging to this thirdparty
     *  @param	string	$type		If id of company filled, we say if we want record of this type only
     * 	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $socid = 0, $type = 'email')
    {
    }
    /**
     *	Update record in database
     *
     *	@param	User|null	$user	     Object user
     *  @param  int     	$notrigger   1=Disable triggers
     *	@return	int					     Return integer <=0 if KO, >0 if OK
     */
    public function update(\User $user = \null, $notrigger = -1)
    {
    }
    /**
     * Return number of notifications activated, for all or a given action code (and third party)
     *
     * @param	string	$notifcode		Code of action in llx_c_action_trigger (new usage) or Id of action in llx_c_action_trigger (old usage)
     * @param	int		$socid			Id of third party or 0 for all thirdparties or -1 for no thirdparties
     * @param	Object	$object			Object the notification is about (need it to check threshold value of some notifications)
     * @param	int		$userid         Id of user or 0 for all users or -1 for no users
     * @param   array   $scope          Scope where to search
     * @return	array|int				Return integer <0 if KO, array of notifications to send if OK
     */
    public function getNotificationsArray($notifcode, $socid = 0, $object = \null, $userid = 0, $scope = array('thirdparty', 'user', 'global'))
    {
    }
    /**
     *  Check if notification are active for couple action/company.
     * 	If yes, send mail and save trace into llx_notify.
     *
     * 	@param	string	$notifcode			Code of action in llx_c_action_trigger (new usage) or Id of action in llx_c_action_trigger (old usage)
     * 	@param	Object	$object				Object the notification deals on
     *	@param 	array	$filename_list		List of files to attach (full path of filename on file system)
     *	@param 	array	$mimetype_list		List of MIME type of attached files
     *	@param 	array	$mimefilename_list	List of attached file name in message
     *	@return	int							Return integer <0 if KO, or number of changes if OK
     */
    public function send($notifcode, $object, $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array())
    {
    }
}