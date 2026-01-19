<?php

/**
 *  Class of triggered functions for agenda module
 */
class InterfaceActionsBlockedLog extends \DolibarrTriggers
{
    public $family = 'system';
    public $description = "Triggers of this module add action for BlockedLog module.";
    /**
     * Version of the trigger
     * @var string
     */
    public $version = self::VERSION_DOLIBARR;
    /**
     * @var string Image of the trigger
     */
    public $picto = 'technic';
    /**
     * Function called on Dolibarrr payment or invoice event.
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