<?php

/**
 * Class ActionsMyModule
 */
class ActionsMyModule extends \CommonHookActions
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
     * Execute action
     *
     * @param	array<string,mixed>	$parameters	Array of parameters
     * @param	CommonObject		$object		The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param	string				$action		'add', 'update', 'view'
     * @return	int								Return integer <0 if KO,
     *                           				=0 if OK but we want to process standard actions too,
     *											>0 if OK and we want to replace standard actions.
     */
    public function getNomUrl($parameters, &$object, &$action)
    {
    }
    /**
     * Overload the doActions function : replacing the parent's function with the one below
     *
     * @param	array<string,mixed>	$parameters		Hook metadata (context, etc...)
     * @param	CommonObject		$object			The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param	?string				$action			Current action (if set). Generally create or edit or null
     * @param	HookManager			$hookmanager	Hook manager propagated to allow calling another hook
     * @return	int									Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function doActions($parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * Overload the doMassActions function : replacing the parent's function with the one below
     *
     * @param	array<string,mixed>	$parameters		Hook metadata (context, etc...)
     * @param	CommonObject		$object			The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param	?string				$action			Current action (if set). Generally create or edit or null
     * @param	HookManager			$hookmanager	Hook manager propagated to allow calling another hook
     * @return	int									Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function doMassActions($parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * Overload the addMoreMassActions function : replacing the parent's function with the one below
     *
     * @param	array<string,mixed>	$parameters     Hook metadata (context, etc...)
     * @param	CommonObject		$object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param	?string	$action						Current action (if set). Generally create or edit or null
     * @param	HookManager	$hookmanager			Hook manager propagated to allow calling another hook
     * @return	int									Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function addMoreMassActions($parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * Execute action before PDF (document) creation
     *
     * @param	array<string,mixed>	$parameters	Array of parameters
     * @param	CommonObject		$object		Object output on PDF
     * @param	string				$action		'add', 'update', 'view'
     * @return	int								Return integer <0 if KO,
     *											=0 if OK but we want to process standard actions too,
     *											>0 if OK and we want to replace standard actions.
     */
    public function beforePDFCreation($parameters, &$object, &$action)
    {
    }
    /**
     * Execute action after PDF (document) creation
     *
     * @param	array<string,mixed>	$parameters	Array of parameters
     * @param	CommonDocGenerator	$pdfhandler	PDF builder handler
     * @param	string				$action		'add', 'update', 'view'
     * @return	int								Return integer <0 if KO,
     * 											=0 if OK but we want to process standard actions too,
     *											>0 if OK and we want to replace standard actions.
     */
    public function afterPDFCreation($parameters, &$pdfhandler, &$action)
    {
    }
    /**
     * Overload the loadDataForCustomReports function : returns data to complete the customreport tool
     *
     * @param	array<string,mixed>	$parameters		Hook metadata (context, etc...)
     * @param	?string				$action 		Current action (if set). Generally create or edit or null
     * @param	HookManager			$hookmanager    Hook manager propagated to allow calling another hook
     * @return	int									Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function loadDataForCustomReports($parameters, &$action, $hookmanager)
    {
    }
    /**
     * Overload the restrictedArea function : check permission on an object
     *
     * @param	array<string,mixed>	$parameters		Hook metadata (context, etc...)
     * @param   CommonObject    	$object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param	string				$action			Current action (if set). Generally create or edit or null
     * @param	HookManager			$hookmanager	Hook manager propagated to allow calling another hook
     * @return	int									Return integer <0 if KO,
     *												=0 if OK but we want to process standard actions too,
     *												>0 if OK and we want to replace standard actions.
     */
    public function restrictedArea($parameters, $object, &$action, $hookmanager)
    {
    }
    /**
     * Execute action completeTabsHead
     *
     * @param	array<string,mixed>	$parameters		Array of parameters
     * @param	CommonObject		$object			The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param	string				$action			'add', 'update', 'view'
     * @param	Hookmanager			$hookmanager	Hookmanager
     * @return	int									Return integer <0 if KO,
     *												=0 if OK but we want to process standard actions too,
     *												>0 if OK and we want to replace standard actions.
     */
    public function completeTabsHead(&$parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * Overload the showLinkToObjectBlock function : add or replace array of object linkable
     *
     * @param	array<string,mixed>	$parameters		Hook metadata (context, etc...)
     * @param	CommonObject		$object			The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param	?string				$action			Current action (if set). Generally create or edit or null
     * @param	HookManager			$hookmanager	Hook manager propagated to allow calling another hook
     * @return	int									Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function showLinkToObjectBlock($parameters, &$object, &$action, $hookmanager)
    {
    }
    /* Add other hook methods here... */
}