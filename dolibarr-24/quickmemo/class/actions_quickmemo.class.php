<?php

/**
 * Class ActionsQuickMemo
 */
class ActionsQuickMemo extends \CommonHookActions
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Errors
     */
    public $errors = array();
    /**
     * @var mixed[] Hook results. Propagated to $hookmanager->resArray for later reuse
     */
    public $results = array();
    /**
     * @var ?string String displayed by executeHook() immediately after return
     */
    public $resprints;
    /**
     * @var int		Priority of hook (50 is used if value is not defined)
     */
    public $priority;
    /**
     * Constructor
     *
     *  @param	DoliDB	$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Overload the llxFooter function : add or replace array of object linkable
     *
     * @param	array<string,mixed>	$parameters		Hook metadata (context, etc...)
     * @param	CommonObject		$object			The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param	?string				$action			Current action (if set). Generally create or edit or null
     * @param	HookManager			$hookmanager	Hook manager propagated to allow calling another hook
     * @return	int									Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function llxFooter($parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * Overload the addHtmlHeader function : add or replace array of object linkable
     *
     * @param	array<string,mixed>	$parameters		Hook metadata (context, etc...)
     * @param	CommonObject		$object			The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param	?string				$action			Current action (if set). Generally create or edit or null
     * @param	HookManager			$hookmanager	Hook manager propagated to allow calling another hook
     * @return	int									Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function addMoreActionsButtons($parameters, &$object, &$action, $hookmanager)
    {
    }
}