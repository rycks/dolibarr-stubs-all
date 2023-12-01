<?php

/* Copyright (c) 2008-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2010-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2010-2018 Juanjo Menent        <jmenent@2byte.es>
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
 *      \file       htdocs/core/class/html.formactions.class.php
 *      \ingroup    core
 *      \brief      File of class with predefined functions and HTML components
 */
/**
 *      Class to manage building of HTML components
 */
class FormActions
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
     *	Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show list of action status
     *
     * 	@param	string	$formname		Name of form where select is included
     * 	@param	string	$selected		Preselected value (-1..100)
     * 	@param	int		$canedit		1=can edit, 0=read only
     *  @param  string	$htmlname   	Name of html prefix for html fields (selectX and valX)
     *  @param	integer	$showempty		Show an empty line if select is used
     *  @param	integer	$onlyselect		0=Standard, 1=Hide percent of completion and force usage of a select list, 2=Same than 1 and add "Incomplete (Todo+Running)
     *  @param  string  $morecss        More css on select field
     * 	@return	void
     */
    public function form_select_status_action($formname, $selected, $canedit = 1, $htmlname = 'complete', $showempty = 0, $onlyselect = 0, $morecss = 'maxwidth100')
    {
    }
    /**
     *  Show list of actions for element
     *
     *  @param	Object	$object					Object
     *  @param  string	$typeelement			'invoice', 'propal', 'order', 'invoice_supplier', 'order_supplier', 'fichinter'
     *	@param	int		$socid					Socid of user
     *  @param	int		$forceshowtitle			Show title even if there is no actions to show
     *  @param  string  $morecss        		More css on table
     *  @param	int		$max					Max number of record
     *  @param	string	$moreparambacktopage	More param for the backtopage
     *  @param	string	$morehtmlcenter			More html text on center of title line
     *	@return	int								<0 if KO, >=0 if OK
     */
    public function showactions($object, $typeelement, $socid = 0, $forceshowtitle = 0, $morecss = 'listactions', $max = 0, $moreparambacktopage = '', $morehtmlcenter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output html select list of type of event
     *
     *  @param	array|string	$selected       Type pre-selected (can be 'manual', 'auto' or 'AC_xxx'). Can be an array too.
     *  @param  string		    $htmlname       Name of select field
     *  @param	string		    $excludetype	A type to exclude ('systemauto', 'system', '')
     *  @param	integer		    $onlyautoornot	1=Group all type AC_XXX into 1 line AC_MANUAL. 0=Keep details of type, -1=Keep details and add a combined line "All manual", -2=Combined line is disabled (not implemented yet)
     *  @param	int		        $hideinfohelp	1=Do not show info help, 0=Show, -1=Show+Add info to tell how to set default value
     *  @param  int		        $multiselect    1=Allow multiselect of action type
     *  @param  int             $nooutput       1=No output
     *  @param	string			$morecss		More css to add to SELECT component.
     * 	@return	string
     */
    public function select_type_actions($selected = '', $htmlname = 'actioncode', $excludetype = '', $onlyautoornot = 0, $hideinfohelp = 0, $multiselect = 0, $nooutput = 0, $morecss = 'minwidth300')
    {
    }
}