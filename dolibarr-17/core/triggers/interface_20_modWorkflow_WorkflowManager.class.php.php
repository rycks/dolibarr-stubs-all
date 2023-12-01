<?php

/**
 *  Class of triggers for workflow module
 */
class InterfaceWorkflowManager extends \DolibarrTriggers
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
    /**
     * @param Object $conf                  Dolibarr settings object
     * @param float $totalonlinkedelements  Sum of total amounts (excl VAT) of
     *                                      invoices linked to $object
     * @param float $object_total_ht        The total amount (excl VAT) of the object
     *                                      (an order, a proposal, a bill, etc.)
     * @return bool  True if the amounts are equal (rounded on total amount)
     *               True if the module is configured to skip the amount equality check
     *               False otherwise.
     */
    private function shouldClassify($conf, $totalonlinkedelements, $object_total_ht)
    {
    }
}