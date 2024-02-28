<?php

/**
 *  Class of triggers for security audit events
 */
class InterfaceLogevents extends \DolibarrTriggers
{
    /**
     * @var string Image of the trigger
     */
    public $picto = 'technic';
    public $family = 'core';
    public $description = "Triggers of this module allows to add security event records inside Dolibarr.";
    /**
     * Version of the trigger
     * @var string
     */
    public $version = self::VERSION_DOLIBARR;
    /**
     * Function called when a Dolibarrr security audit event is done.
     * All functions "runTrigger" are triggered if file is inside directory htdocs/core/triggers or htdocs/module/code/triggers (and declared)
     *
     * @param string		$action		Event action code
     * @param Object		$object     Object
     * @param User			$user       Object user
     * @param Translate		$langs      Object langs
     * @param conf			$conf       Object conf
     * @return int         				<0 if KO, 0 if no triggered ran, >0 if OK
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
}