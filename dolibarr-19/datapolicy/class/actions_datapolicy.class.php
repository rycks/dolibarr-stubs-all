<?php

/**
 * Class ActionsDatapolicy
 */
class ActionsDatapolicy extends \CommonHookActions
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error
     */
    public $error = '';
    /**
     * @var array Errors
     */
    public $errors = array();
    /**
     * @var array Hook results. Propagated to $hookmanager->resArray for later reuse
     */
    public $results = array();
    /**
     * @var string String displayed by executeHook() immediately after return
     */
    public $resprints;
    /**
     * Constructor
     *
     *  @param  DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Execute action
     *
     * @param   array           $parameters		Array of parameters
     * @param   CommonObject    $object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param   string          $action      	'add', 'update', 'view'
     * @return  int         					Return integer <0 if KO,
     *                           				=0 if OK but we want to process standard actions too,
     *                            				>0 if OK and we want to replace standard actions.
     */
    public function getNomUrl($parameters, &$object, &$action)
    {
    }
    /**
     * Overloading the doActions function : replacing the parent's function with the one below
     *
     * @param   array   		        $parameters     Hook metadatas (context, etc...)
     * @param   Societe|CommonObject    $object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param   string         			$action         Current action (if set). Generally create or edit or null
     * @param   HookManager     		$hookmanager    Hook manager propagated to allow calling another hook
     * @return  int                     		        Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function doActions($parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * addMoreActionsButtons
     *
     * @param array 		$parameters		array of parameters
     * @param Object	 	$object			Object
     * @param string		$action			Actions
     * @param HookManager	$hookmanager	Hook manager
     * @return void
     */
    public function addMoreActionsButtons($parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * printCommonFooter
     *
     * @param array 		$parameters		array of parameters
     * @param Object	 	$object			Object
     * @param string		$action			Actions
     * @param HookManager	$hookmanager	Hook manager
     * @return int
     */
    public function printCommonFooter($parameters, &$object, &$action, $hookmanager)
    {
    }
}