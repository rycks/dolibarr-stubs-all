<?php

/* Copyright (C) 2023-2024 	Laurent Destailleur         <eldy@users.sourceforge.net>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
* \file       htdocs/webportal/class/controller.class.php
* \ingroup    webportal
* \brief      File of controller class for WebPortal
*/
/**
 *  Class to manage pages
 */
class Controller
{
    /**
     * if this controller need logged user or not
     * @var bool
     */
    public $accessNeedLoggedUser = \true;
    /**
     * define current user access
     * @var bool
     */
    public $accessRight = \false;
    /**
     * If controller is active
     * @var bool
     */
    public $controllerStatus = \true;
    /**
     * @var DoliDB Database handler
     */
    public $db;
    /**
     * @var string Tpl path will use default context->tplPath if empty
     */
    public $tplPath;
    /**
     * Constructor
     *
     * @return	void
     */
    public function __construct()
    {
    }
    /**
     * Action method is called before html output
     * can be used to manage security and change context
     *
     * @return  int     Return integer < 0 on error, > 0 on success
     */
    public function action()
    {
    }
    /**
     * Check current access to controller
     *
     * @return  bool
     */
    public function checkAccess()
    {
    }
    /**
     * Display
     *
     * @return  void
     */
    public function display()
    {
    }
    /**
     * Display error template
     *
     * @return  void
     */
    public function display404()
    {
    }
    /**
     * Execute hook doActions
     *
     * @param	array<string,mixed>	$parameters		Parameters
     * @return  int							Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function hookDoAction($parameters = array())
    {
    }
    /**
     * Execute hook PrintPageView
     *
     * @param	array<string,mixed>	$parameters	Parameters
     * @return	int							Return integer < 0 on error, 0 on success, 1 to replace standard code
     */
    public function hookPrintPageView($parameters = array())
    {
    }
    /**
     * Load a template .tpl file
     *
     * @param	string	$templateName	Template file name (without the .tpl.php)
     * @param	mixed	$vars			Data to transmit to template
     * @return	bool					True if template found, else false
     */
    public function loadTemplate($templateName, $vars = \false)
    {
    }
}