<?php

/**
 *  Class of triggers for notification module
 */
class InterfaceNotification extends \DolibarrTriggers
{
    // @todo Defined also into notify.class.php)
    public $listofmanagedevents = array('BILL_VALIDATE', 'BILL_PAYED', 'ORDER_CREATE', 'ORDER_VALIDATE', 'PROPAL_VALIDATE', 'PROPAL_CLOSE_SIGNED', 'FICHINTER_VALIDATE', 'FICHINTER_ADD_CONTACT', 'ORDER_SUPPLIER_VALIDATE', 'ORDER_SUPPLIER_APPROVE', 'ORDER_SUPPLIER_REFUSE', 'SHIPPING_VALIDATE', 'EXPENSE_REPORT_VALIDATE', 'EXPENSE_REPORT_APPROVE', 'HOLIDAY_VALIDATE', 'HOLIDAY_APPROVE', 'ACTION_CREATE');
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
     * Return list of events managed by notification module
     *
     * @return      array       Array of events managed by notification module
     */
    public function getListOfManagedEvents()
    {
    }
}