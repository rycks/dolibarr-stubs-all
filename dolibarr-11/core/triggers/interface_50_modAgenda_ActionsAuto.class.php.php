<?php

/**
 *  Class of triggered functions for agenda module
 */
class InterfaceActionsAuto extends \DolibarrTriggers
{
    public $family = 'agenda';
    public $description = "Triggers of this module add actions in agenda according to setup made in agenda setup.";
    /**
     * Version of the trigger
     * @var string
     */
    public $version = self::VERSION_DOLIBARR;
    /**
     * @var string Image of the trigger
     */
    public $picto = 'action';
    /**
     * Function called when a Dolibarrr business event is done.
     * All functions "runTrigger" are triggered if file is inside directory htdocs/core/triggers or htdocs/module/code/triggers (and declared)
     *
     * Following properties may be set before calling trigger. The may be completed by this trigger to be used for writing the event into database:
     *      $object->actiontypecode (translation action code: AC_OTH, ...)
     *      $object->actionmsg (note, long text)
     *      $object->actionmsg2 (label, short text)
     *      $object->sendtoid (id of contact or array of ids)
     *      $object->socid (id of thirdparty)
     *      $object->fk_project
     *      $object->fk_element
     *      $object->elementtype
     *
     * @param string		$action		Event action code
     * @param Object		$object     Object
     * @param User		    $user       Object user
     * @param Translate 	$langs      Object langs
     * @param conf		    $conf       Object conf
     * @return int         				<0 if KO, 0 if no triggered ran, >0 if OK
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
}