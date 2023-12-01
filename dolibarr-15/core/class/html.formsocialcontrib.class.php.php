<?php

/* Copyright (C) 2012 Laurent Destailleur   <eldy@users.sourceforge.net>
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
 *	\file       htdocs/core/class/html.formsocialcontrib.class.php
 *  \ingroup    core
 *	\brief      File of class with all html predefined components
 */
/**
 *	Class to manage generation of HTML components for social contributions management
 */
class FormSocialContrib
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
     * Constructor
     *
     * @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of social contributions.
     *  Use mysoc->country_id or mysoc->country_code so they must be defined.
     *
     *	@param	string	$selected       Preselected type
     *	@param  string	$htmlname       Name of field in form
     * 	@param	int		$useempty		Set to 1 if we want an empty value
     * 	@param	int		$maxlen			Max length of text in combo box
     * 	@param	int		$help			Add or not the admin help picto
     *  @param	string	$morecss		Add more CSS on select
     *  @param	int		$noerrorifempty	No print error if list is empty for the country
     * 	@return	void
     */
    public function select_type_socialcontrib($selected = '', $htmlname = 'actioncode', $useempty = 0, $maxlen = 40, $help = 1, $morecss = 'minwidth300', $noerrorifempty = 0)
    {
    }
}