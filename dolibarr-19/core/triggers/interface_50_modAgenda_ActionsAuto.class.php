<?php

/**
 *  Class of triggered functions for agenda module
 */
class InterfaceActionsAuto extends \DolibarrTriggers
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
     *      $object->actiontypecode (translation action code: AC_OTH, ...)
     *      $object->actionmsg (note, long text)
     *      $object->actionmsg2 (label, short text)
     *      $object->sendtoid (id of contact or array of ids of contacts)
     *      $object->socid (id of thirdparty)
     *      $object->fk_project
     *      $object->fk_element	(ID of object to link action event to)
     *      $object->elementtype (->element of object to link action to)
     *      $object->module (if defined, elementtype in llx_actioncomm will be elementtype@module)
     *
     * @param string		$action		Event action code ('CONTRACT_MODIFY', 'RECRUITMENTCANDIDATURE_MODIFIY', or example by external module: 'SENTBYSMS'...)
     * @param Object		$object     Object
     * @param User		    $user       Object user
     * @param Translate 	$langs      Object langs
     * @param conf		    $conf       Object conf
     * @return int         				Return integer <0 if KO, 0 if no triggered ran, >0 if OK
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
}