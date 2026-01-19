<?php

/**
 *  Class of triggers for security audit events
 */
class InterfaceLogevents extends \DolibarrTriggers
{
    // List of translation key to use for the description of each event.
    // TODO reduce this list of of events to use keep USER_CREATE, USER_MODIFY & USER_DELETE and use $user->context['audit'] = 'text to add' to complete message of event.
    const EVENT_ACTION_DICT = array('USER_LOGIN' => 'UserLogged', 'USER_LOGIN_FAILED' => 'UserLoginFailed', 'USER_LOGOUT' => 'UserLogoff', 'USER_CREATE' => 'NewUserCreated', 'USER_MODIFY' => 'EventUserModified', 'USER_NEW_PASSWORD' => 'UserPasswordChange', 'USER_ENABLEDISABLE' => 'UserEnabledDisabled', 'USER_DELETE' => 'UserDeleted', 'USERGROUP_CREATE' => 'NewGroupCreated', 'USERGROUP_MODIFY' => 'GroupModified', 'USERGROUP_DELETE' => 'GroupDeleted');
    /**
     * @var string	Label
     */
    private $event_label;
    /**
     * @var string	Description
     */
    private $event_desc;
    /**
     * @var int		Date
     */
    private $event_date;
    /**
     * Constructor
     * @param	DoliDB	$db	Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Function called when a Dolibarr security audit event is done.
     * All functions "runTrigger" are triggered if file is inside directory htdocs/core/triggers or htdocs/module/code/triggers (and declared)
     *
     * @param	string		$action	Event action code
     * @param	Object		$object	Object
     * @param	User		$user	Object user
     * @param	Translate	$langs	Object langs
     * @param	conf		$conf	Object conf
     * @return	int					if KO: <0, if no trigger ran: 0, if OK: >0
     * @throws	Exception			dol_syslog can throw Exceptions
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
    /**
     * Method called by runTrigger to initialize date, label & description data for event
     *
     * @param	string		$key_text			Action string
     * @param	Object		$object				Object
     * @return	void
     */
    private function initEventData($key_text, $object)
    {
    }
    /**
     * Check if text contains an event action key. Used for dynamic localization on frontend events list.
     *
     * @param	string	$event_text		Input event text
     * @return	bool					True if event text is a coded structured string
     */
    public static function isEventActionTextKey($event_text)
    {
    }
}