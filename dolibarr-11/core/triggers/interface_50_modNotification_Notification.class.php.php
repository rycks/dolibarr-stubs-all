<?php

/**
 *  Class of triggers for notification module
 */
class InterfaceNotification extends \DolibarrTriggers
{
    public $family = 'notification';
    public $description = "Triggers of this module send email notifications according to Notification module setup.";
    /**
     * Version of the trigger
     * @var string
     */
    public $version = self::VERSION_DOLIBARR;
    /**
     * @var string Image of the trigger
     */
    public $picto = 'email';
    // @todo Defined also into notify.class.php)
    public $listofmanagedevents = array('BILL_VALIDATE', 'BILL_PAYED', 'ORDER_VALIDATE', 'PROPAL_VALIDATE', 'PROPAL_CLOSE_SIGNED', 'FICHINTER_VALIDATE', 'FICHINTER_ADD_CONTACT', 'ORDER_SUPPLIER_VALIDATE', 'ORDER_SUPPLIER_APPROVE', 'ORDER_SUPPLIER_REFUSE', 'SHIPPING_VALIDATE', 'EXPENSE_REPORT_VALIDATE', 'EXPENSE_REPORT_APPROVE', 'HOLIDAY_VALIDATE', 'HOLIDAY_APPROVE');
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