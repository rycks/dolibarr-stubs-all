<?php

/**
 *  Class of triggers for ticket module
 */
class InterfaceTicketEmail extends \DolibarrTriggers
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
     *   Return name of trigger file
     *
     *   @return string      Name of trigger file
     */
    public function getName()
    {
    }
    /**
     *   Return description of trigger file
     *
     *   @return string      Description of trigger file
     */
    public function getDesc()
    {
    }
    /**
     *   Return version of trigger file
     *
     *   @return string      Version of trigger file
     */
    public function getVersion()
    {
    }
    /**
     *      Function called when a Dolibarrr business event is done.
     *      All functions "runTrigger" are triggered if file is inside directory htdocs/core/triggers
     *
     *      @param  string    $action Event action code
     *      @param  Object    $object Object
     *      @param  User      $user   Object user
     *      @param  Translate $langs  Object langs
     *      @param  conf      $conf   Object conf
     *      @return int                     <0 if KO, 0 if no triggered ran, >0 if OK
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
}