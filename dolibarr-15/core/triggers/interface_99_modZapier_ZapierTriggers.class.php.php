<?php

/**
 *  Class of triggers for Zapier module
 */
class InterfaceZapierTriggers extends \DolibarrTriggers
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
     * All functions "runTrigger" are triggered if file
     * is inside directory core/triggers
     *
     * @param string        $action     Event action code
     * @param CommonObject  $object     Object
     * @param User          $user       Object user
     * @param Translate     $langs      Object langs
     * @param Conf          $conf       Object conf
     * @return int                      <0 if KO, 0 if no triggered ran, >0 if OK
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
}
/**
 * Post webhook in zapier with object data
 *
 * @param string $url url provided by zapier
 * @param string $json data to send
 * @return void
 */
function zapierPostWebhook($url, $json)
{
}
/**
 * Clean sensible object datas
 *
 * @param   Object  $toclean    Object to clean
 * @return  Object              Object with cleaned properties
 */
function cleanObjectDatas($toclean)
{
}
/**
 * Clean sensible object datas
 *
 * @param   Object  $toclean    Object to clean
 * @return  Object              Object with cleaned properties
 */
function cleanAgendaEventsDatas($toclean)
{
}