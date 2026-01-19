<?php

/* Copyright (C) 2010-2016 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2010-2014 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2010-2011 Juanjo Menent        <jmenent@2byte.es>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *	\file       htdocs/core/class/hookmanager.class.php
 *	\ingroup    core
 *	\brief      File of class to manage hooks
 */
/**
 *	Class to manage hooks
 */
class HookManager
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
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    // Context hookmanager was created for ('thirdpartycard', 'thirdpartydao', ...)
    public $contextarray = array();
    // Array with instantiated classes
    public $hooks = array();
    // Array result
    public $resArray = array();
    // Printable result
    public $resPrint = '';
    // Nb of qualified hook ran
    public $resNbOfHooks = 0;
    /**
     * Constructor
     *
     * @param	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Init array $this->hooks with instantiated action controlers.
     *  First, a hook is declared by a module by adding a constant MAIN_MODULE_MYMODULENAME_HOOKS with value 'nameofcontext1:nameofcontext2:...' into $this->const of module descriptor file.
     *  This makes $conf->hooks_modules loaded with an entry ('modulename'=>array(nameofcontext1,nameofcontext2,...))
     *  When initHooks function is called, with initHooks(list_of_contexts), an array $this->hooks is defined with instance of controler
     *  class found into file /mymodule/class/actions_mymodule.class.php (if module has declared the context as a managed context).
     *  Then when a hook executeHooks('aMethod'...) is called, the method aMethod found into class will be executed.
     *
     *	@param	string[]	$arraycontext	    Array list of searched hooks tab/features. For example: 'thirdpartycard' (for hook methods into page card thirdparty), 'thirdpartydao' (for hook methods into Societe), ...
     *	@return	int							    Always 1
     */
    public function initHooks($arraycontext)
    {
    }
    /**
     *  Execute hooks (if they were initialized) for the given method
     *
     *  @param		string	$method			Name of method hooked ('doActions', 'printSearchForm', 'showInputField', ...)
     *  @param		array	$parameters		Array of parameters
     *  @param		Object	$object			Object to use hooks on
     *  @param		string	$action			Action code on calling page ('create', 'edit', 'view', 'add', 'update', 'delete'...)
     *  @return		mixed					For 'addreplace' hooks (doActions,formObjectOptions,pdf_xxx,...):  					Return 0 if we want to keep standard actions, >0 if we want to stop/replace standard actions, <0 if KO. Things to print are returned into ->resprints and set into ->resPrint. Things to return are returned into ->results by hook and set into ->resArray for caller.
     *                                      For 'output' hooks (printLeftBlock, formAddObjectLine, formBuilddocOptions, ...):	Return 0, <0 if KO. Things to print are returned into ->resprints and set into ->resPrint. Things to return are returned into ->results by hook and set into ->resArray for caller.
     *                                      All types can also return some values into an array ->results that will be finaly merged into this->resArray for caller.
     *                                      $this->error or this->errors are also defined by class called by this function if error.
     */
    public function executeHooks($method, $parameters = array(), &$object = '', &$action = '')
    {
    }
}