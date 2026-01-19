<?php

/**
 *      Class to manage notifications
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
    // Les codes actions sont definis dans la table llx_notify_def
    // codes actions supported are
    // @todo defined also into interface_50_modNotificiation_Notificiation.class.php
    public $arrayofnotifsupported = array('BILL_VALIDATE', 'BILL_PAYED', 'ORDER_VALIDATE', 'PROPAL_VALIDATE', 'PROPAL_CLOSE_SIGNED', 'FICHINTER_VALIDATE', 'FICHINTER_ADD_CONTACT', 'ORDER_SUPPLIER_VALIDATE', 'ORDER_SUPPLIER_APPROVE', 'ORDER_SUPPLIER_REFUSE', 'SHIPPING_VALIDATE', 'EXPENSE_REPORT_VALIDATE', 'EXPENSE_REPORT_APPROVE', 'HOLIDAY_VALIDATE', 'HOLIDAY_APPROVE', 'ACTION_CREATE');
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
     * Return number of notifications activated for action code (and third party)
     *
     * @param	string	$notifcode		Code of action in llx_c_action_trigger (new usage) or Id of action in llx_c_action_trigger (old usage)
     * @param	int		$socid			Id of third party or 0 for all thirdparties or -1 for no thirdparties
     * @param	Object	$object			Object the notification is about (need it to check threshold value of some notifications)
     * @param	int		$userid         Id of user or 0 for all users or -1 for no users
     * @param   array   $scope          Scope where to search
     * @return	array|int				<0 if KO, array of notifications to send if OK
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
     *	@return	int							<0 if KO, or number of changes if OK
     */
    public function send($notifcode, $object, $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array())
    {
    }
}