<?php

/* Copyright (C) 2004-2014 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2011 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2007      Patrick Raguin 		<patrick.raguin@gmail.com>
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
 *      \file       htdocs/core/class/html.formadmin.class.php
 *      \ingroup    core
 *      \brief      File of class for html functions for admin pages
 */
/**
 *      Class to generate html code for admin pages
 */
class FormAdmin
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string error message
     */
    public $error;
    /**
     *  Constructor
     *
     *  @param      DoliDB|null      $db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return html select list with available languages (key='en_US', value='United States' for example)
     *
     *  @param      string|string[]	$selected       Language pre-selected. Can be an array if $multiselect is 1.
     *  @param      string			$htmlname       Name of HTML select
     *  @param      int<0,1>		$showauto       Show 'auto' choice
     *  @param      string[]		$filter         Array of keys to exclude in list (opposite of $onlykeys)
     *  @param		int<1,1>|string	$showempty		'1'=Add empty value or 'string to show'
     *  @param      int<0,1>		$showwarning    Show a warning if language is not complete
     *  @param		int<0,1>		$disabled		Disable edit of select
     *  @param		string			$morecss		Add more css styles
     *  @param      int<0,2>       	$showcode       1=Add language code into label at beginning, 2=Add language code into label at end
     *  @param		int<0,1>		$forcecombo		Force to use combo box (so no ajax beautify effect)
     *  @param		int<0,1>		$multiselect	Make the combo a multiselect
     *  @param		string[]		$onlykeys		Array of language keys to restrict list with the following keys (opposite of $filter). Example array('fr', 'es', ...)
     *  @param		int<0,1>		$mainlangonly	1=Show only main languages ('fr_FR' no' fr_BE', 'es_ES' not 'es_MX', ...)
     *  @return		string							Return HTML select string with list of languages
     */
    public function select_language($selected = '', $htmlname = 'lang_id', $showauto = 0, $filter = array(), $showempty = '', $showwarning = 0, $disabled = 0, $morecss = 'minwidth100', $showcode = 0, $forcecombo = 0, $multiselect = 0, $onlykeys = array(), $mainlangonly = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of available menus (eldy_backoffice, ...)
     *
     *    @param	string		$selected        Preselected menu value
     *    @param    string		$htmlname        Name of html select
     *    @param    string[]	$dirmenuarray    Array of directories to scan
     *    @param    string		$moreattrib      More attributes on html select tag
     *    @return	integer|void
     */
    public function select_menu($selected, $htmlname, $dirmenuarray, $moreattrib = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return combo list of available menu families
     *
     *  @param	string		$selected        Menu pre-selected
     *  @param	string		$htmlname        Name of html select
     *  @param	string[]	$dirmenuarray    Directories to scan
     *  @return	void
     */
    public function select_menu_families($selected, $htmlname, $dirmenuarray)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return a HTML select list of timezones
     *
     *  @param	string		$selected        Menu pre-selectionnee
     *  @param  string		$htmlname        Nom de la zone select
     *  @return	void
     */
    public function select_timezone($selected, $htmlname)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return html select list with available languages (key='en_US', value='United States' for example)
     *
     *  @param      string	$selected       Paper format pre-selected
     *  @param      string	$htmlname       Name of HTML select field
     *  @param		string	$filter			Value to filter on code
     *  @param		int		$showempty		Add empty value
     * 	@param		int		$forcecombo		Force to load all values and output a standard combobox (with no beautification)
     *  @return		string					Return HTML output
     */
    public function select_paper_format($selected = '', $htmlname = 'paperformat_id', $filter = '', $showempty = 0, $forcecombo = 0)
    {
    }
    /**
     * Function to show the combo select to chose a type of field (varchar, int, email, ...)
     *
     * @param	string		$htmlname				Name of HTML select component
     * @param	string		$type					Type preselected
     * @param	array<string,string[]>	$typewecanchangeinto	Array of possible switch combination from 1 type to another one. This will grey not possible combinations.
     * @return 	string							The combo HTML select component
     */
    public function selectTypeOfFields($htmlname, $type, $typewecanchangeinto = array())
    {
    }
}