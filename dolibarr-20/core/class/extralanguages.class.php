<?php

/* Copyright (C) 2020       Laurent Destailleur     <eldy@users.sourceforge.net>
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
 * 	\file 		htdocs/core/class/extralanguages.class.php
 *	\ingroup    core
 *	\brief      File of class to manage extra languages for some fields
 */
/**
 *	Class to manage standard extra languages
 */
class ExtraLanguages
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var array New array to store extralanguages definition
     */
    public $attributes;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Array of Error code (or message)
     */
    public $errors = array();
    /**
     * @var string DB Error number
     */
    public $errno;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Load array this->attributes with list of fields per object that need an alternate translation. The object and field must be managed with
     *  the widgetForTranslation() method.
     *  You must set variable MAIN_USE_ALTERNATE_TRANSLATION_FOR=elementA:fieldname,fieldname2;elementB:...
     *  Example: MAIN_USE_ALTERNATE_TRANSLATION_FOR=societe:name,town;contact:firstname,lastname
     *
     * 	@param	string		$elementtype		Type of element ('' = all, 'adherent', 'commande', 'thirdparty', 'facture', 'propal', 'product', ...).
     * 	@param	boolean		$forceload			Force load of extra fields whatever is status of cache.
     * 	@return	array							Array of attributes keys+label for all extra fields.
     */
    public function fetch_name_extralanguages($elementtype, $forceload = \false)
    {
    }
    /**
     * Return HTML string to put an input field into a page
     * Code very similar with showInputField of common object
     *
     * @param  string  $key            			Key of attribute
     * @param  string  $value          			Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value)
     * @param  string  $extrafieldsobjectkey	If defined (for example $object->table_element), use the new method to get extrafields data
     * @param  string  $moreparam      			To add more parameters on html input tag
     * @param  string  $keysuffix      			Prefix string to add after name and id of field (can be used to avoid duplicate names)
     * @param  string  $keyprefix      			Suffix string to add before name and id of field (can be used to avoid duplicate names)
     * @param  string  $morecss        			More css (to defined size of field. Old behaviour: may also be a numeric)
     * @param  int     $objectid       			Current object id
     * @param  int	   $mode                    1=Used for search filters
     * @return string
     */
    public function showInputField($key, $value, $extrafieldsobjectkey, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = '', $objectid = 0, $mode = 0)
    {
    }
    /**
     * Return HTML string to put an output field into a page
     *
     * @param   string	$key            		Key of attribute
     * @param   string	$value          		Value to show
     * @param	string	$extrafieldsobjectkey	If defined (for example $object->table_element), function uses the new method to get extrafields data
     * @param	string	$moreparam				To add more parameters on html input tag (only checkbox use html input for output rendering)
     * @return	string							Formatted value
     */
    public function showOutputField($key, $value, $extrafieldsobjectkey, $moreparam = '')
    {
    }
}