<?php

/**
 *	Class Actions Stripe Connect
 */
class ActionsStripeconnect
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    private $config = array();
    // For Hookmanager return
    public $resprints;
    public $results = array();
    /**
     *	Constructor
     *
     *	@param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * formObjectOptions
     *
     * @param	array	$parameters		Parameters
     * @param	Object	$object			Object
     * @param	string	$action			Action
     * @return bool
     */
    public function formObjectOptions($parameters, &$object, &$action)
    {
    }
    /**
     * addMoreActionsButtons
     *
     * @param array	 	$parameters	Parameters
     * @param Object	$object		Object
     * @param string	$action		action
     * @return int					0
     */
    public function addMoreActionsButtons($parameters, &$object, &$action)
    {
    }
}