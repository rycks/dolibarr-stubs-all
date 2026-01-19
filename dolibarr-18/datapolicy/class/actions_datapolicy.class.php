<?php

/* Copyright (C) 2018       Nicolas ZABOURI         <info@inovea-conseom.com>
 * Copyright (C) 2018-2019  Frédéric France         <frederic.france@netlogic.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
/**
 * \file    datapolicy/class/actions_datapolicy.class.php
 * \ingroup datapolicy
 * \brief   Example hook overload.
 */
/**
 * Class ActionsDatapolicy
 */
class ActionsDatapolicy
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
     * @return  int         					<0 if KO,
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
     * @return  int                     		        < 0 on error, 0 on success, 1 to replace standard code
     */
    public function doActions($parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * Overloading the doActions function : replacing the parent's function with the one below
     *
     * @param   array           $parameters     Hook metadatas (context, etc...)
     * @param   CommonObject    $object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param   string          $action         Current action (if set). Generally create or edit or null
     * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
     * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
     */
    public function doMassActions($parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * Overloading the addMoreMassActions function : replacing the parent's function with the one below
     *
     * @param   array           $parameters		Hook metadatas (context, etc...)
     * @param   CommonObject    $object         The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
     * @param   string          $action         Current action (if set). Generally create or edit or null
     * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
     * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
     */
    public function addMoreMassActions($parameters, &$object, &$action, $hookmanager)
    {
    }
    /**
     * Execute action
     *
     * @param   array   $parameters     Array of parameters
     * @param   Object  $object         Object output on PDF
     * @param   string  $action         'add', 'update', 'view'
     * @return  int                     <0 if KO,
     *                                  =0 if OK but we want to process standard actions too,
     *                                  >0 if OK and we want to replace standard actions.
     */
    public function beforePDFCreation($parameters, &$object, &$action)
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