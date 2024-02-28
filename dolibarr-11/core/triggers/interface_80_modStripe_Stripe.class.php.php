<?php

/**
 *  Class of triggers for stripe module
 */
class InterfaceStripe
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     *   Constructor
     *
     *   @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Trigger name
     *
     * @return string Name of trigger file
     */
    public function getName()
    {
    }
    /**
     * Trigger description
     *
     * @return string Description of trigger file
     */
    public function getDesc()
    {
    }
    /**
     * Trigger version
     *
     * @return string Version of trigger file
     */
    public function getVersion()
    {
    }
    /**
     * Function called when a Dolibarrr business event is done.
     * All functions "runTrigger" are triggered if file
     * is inside directory core/triggers
     *
     * @param 	string 			$action 	Event action code
     * @param 	CommonObject 	$object 	Object
     * @param 	User 			$user 		Object user
     * @param 	Translate 		$langs 		Object langs
     * @param 	Conf 			$conf 		Object conf
     * @return 	int              			<0 if KO, 0 if no triggered ran, >0 if OK
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
}