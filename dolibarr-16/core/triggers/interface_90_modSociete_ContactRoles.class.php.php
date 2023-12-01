<?php

/**
 * Class of triggered functions for agenda module
 */
class InterfaceContactRoles extends \DolibarrTriggers
{
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Function called when a Dolibarrr business event is done.
     * All functions "runTrigger" are triggered if file is inside directory htdocs/core/triggers or htdocs/module/code/triggers (and declared)
     *
     * Following properties may be set before calling trigger. The may be completed by this trigger to be used for writing the event into database:
     * $object->socid or $object->fk_soc(id of thirdparty)
     * $object->element (element type of object)
     *
     * @param string $action	Event action code
     * @param Object $object	Object
     * @param User $user		Object user
     * @param Translate $langs	Object langs
     * @param conf $conf		Object conf
     * @return int <0 if KO, 0 if no triggered ran, >0 if OK
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
}