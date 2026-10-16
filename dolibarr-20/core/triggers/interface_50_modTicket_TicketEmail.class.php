<?php

/**
 *  Class of triggers for ticket module
 */
class InterfaceTicketEmail extends \DolibarrTriggers
{
    /**
     *   Constructor
     *
     *   @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *      Function called when a Dolibarr business event is done.
     *      All functions "runTrigger" are triggered if file is inside directory htdocs/core/triggers
     *
     *      @param  string    $action Event action code
     *      @param  Ticket    $object Object
     *      @param  User      $user   Object user
     *      @param  Translate $langs  Object langs
     *      @param  conf      $conf   Object conf
     *      @return int                     Return integer <0 if KO, 0 if no triggered ran, >0 if OK
     */
    public function runTrigger($action, $object, \User $user, \Translate $langs, \Conf $conf)
    {
    }
    /**
     * Composes and sends a message concerning a ticket, to be sent to admin address.
     *
     * @param string 	$sendto			Addresses to send the mail, format "first@address.net, second@address.net," etc.
     * @param string 	$base_subject	email subject. Non-translated string.
     * @param string 	$body			email body (first line). Non-translated string.
     * @param Ticket 	$object			the ticket thet the email refers to
     * @param Translate $langs			the translation object
     * @return void
     */
    private function composeAndSendAdminMessage($sendto, $base_subject, $body, \Ticket $object, \Translate $langs)
    {
    }
    /**
     * Composes and sends a message concerning a ticket, to be sent to customer addresses.
     *
     * @param string 	$sendto			Addresses to send the mail, format "first@address.net, second@address.net, " etc.
     * @param string 	$base_subject	email subject. Non-translated string.
     * @param string	$body			email body (first line). Non-translated string.
     * @param string 	$see_ticket		string indicating the ticket public address
     * @param Ticket 	$object			the ticket thet the email refers to
     * @param Translate $langs			the translation object
     * @return void
     */
    private function composeAndSendCustomerMessage($sendto, $base_subject, $body, $see_ticket, \Ticket $object, \Translate $langs)
    {
    }
    /**
     * Composes and sends a message concerning a ticket, to be sent to user assigned to the ticket
     *
     * @param string 	$sendto			Addresses to send the mail, format "first@address.net, second@address.net, " etc.
     * @param string 	$base_subject	email subject. Non-translated string.
     * @param string	$body			email body (first line). Non-translated string.
     * @param string 	$see_ticket		string indicating the ticket public address
     * @param Ticket 	$object			the ticket thet the email refers to
     * @param Translate $langs			the translation object
     * @return void
     */
    private function composeAndSendAssigneeMessage($sendto, $base_subject, $body, $see_ticket, \Ticket $object, \Translate $langs)
    {
    }
}