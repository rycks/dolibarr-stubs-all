<?php

/**
 *  Class of triggers for ldap module
 */
class InterfaceLdapsynchro extends \DolibarrTriggers
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
     * Function called when a Dolibarr business event is done.
     * All functions "runTrigger" are triggered if file is inside directory htdocs/core/triggers or htdocs/module/code/triggers (and declared)
     *
     * @param string		$action		Event action code
     * @param Adherent|User|UserGroup|Contact	$object     Object  (Note: AdherentType seems excluded)
     * @param User		    $user       Object user
     * @param Translate 	$langs      Object langs
     * @param Conf		    $conf       Object conf
     * @return int						Return integer <0 if KO, 0 if no triggered ran, >0 if OK
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
}