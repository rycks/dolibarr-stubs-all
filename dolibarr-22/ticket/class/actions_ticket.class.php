<?php

// TODO Only the last method emailElementlist is a hook method. Other must be moved into standard ticket.class.php
/**
 *  Class Actions of the module ticket
 */
class ActionsTicket extends \CommonHookActions
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var Ticket Ticket
     */
    public $dao;
    /**
     * @var string
     */
    public $mesg;
    /**
     * @var string Error code (or message)
     */
    public $error;
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var int Error number
     */
    public $errno = 0;
    /**
     * @var string
     */
    public $template_dir;
    /**
     * @var string
     */
    public $template;
    /**
     * @var string ticket action label
     */
    public $label;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var int ID
     */
    public $fk_statut;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    /**
     *    Constructor
     *
     *    @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Instantiation of DAO class
     *
     * @return void
     */
    public function getInstanceDao()
    {
    }
    /**
     * Fetch object
     *
     * @param	int		$id				ID of ticket
     * @param	string	$ref			Reference of ticket
     * @param	string	$track_id		Track ID of ticket (for public area)
     * @return int              		Return integer <0 if KO, >0 if OK
     */
    public function fetch($id = 0, $ref = '', $track_id = '')
    {
    }
    /**
     * Print statut
     *
     * @param		int		$mode		Display mode
     * @return 		string				Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    /**
     * Get ticket info
     *
     * @param  int $id    Object id
     * @return void
     */
    public function getInfo($id)
    {
    }
    /**
     * Get action title
     *
     * @param 	string 			$action    	Type of action
     * @param	Ticket|null		$object		Object ticket
     * @return 	string						Title of action
     */
    public function getTitle($action = '', $object = \null)
    {
    }
    /**
     * Show ticket original message
     *
     * @param 	User		$user		User which display
     * @param 	string 		$action    	Action mode
     * @param	Ticket		$object		Object ticket
     * @return	void
     */
    public function viewTicketOriginalMessage($user, $action, $object)
    {
    }
    /**
     * View html list of message for ticket
     *
     * @param 	bool 	$show_private 	Show private messages
     * @param 	bool 	$show_user    	Show user who make action
     * @param	Ticket	$object			Object ticket
     * @return 	void
     */
    public function viewTicketMessages($show_private, $show_user, $object)
    {
    }
    /**
     * View list of message for ticket with timeline display
     *
     * @param	bool	$show_private	Show private messages
     * @param	bool	$show_user		Show user who make action
     * @param	Ticket	$object			Object ticket
     * @return void
     */
    public function viewTicketTimelineMessages($show_private, $show_user, \Ticket $object)
    {
    }
    /**
     * Print html navbar with link to set ticket status
     *
     * @param	Ticket	$object		Ticket sup
     * @return	void
     */
    public function viewStatusActions(\Ticket $object)
    {
    }
}