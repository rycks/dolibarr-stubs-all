<?php

/* Copyright (C) 2014       Florian Henry           <florian.henry@open-concept.pro>
 * Copyright (C) 2019-2025  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
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
 * \file    comm/mailing/class/html.formadvtargetemailing.class.php
 * \ingroup mailing
 * \brief   File for the class with functions for the building of HTML components for advtargetemailing
 */
/**
 * Class to manage building of HTML components
 */
class FormAdvTargetEmailing extends \Form
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
     * @param DoliDB $db handler
     */
    public function __construct($db)
    {
    }
    /**
     * Affiche un champs select contenant une liste
     *
     * @param string[] $selected_array à preselectionner
     * @param string $htmlname select field
     * @return string select field
     */
    public function multiselectProspectionStatus($selected_array = array(), $htmlname = 'cust_prospect_status')
    {
    }
    /**
     * Return combo list of activated countries, into language of user
     *
     * @param string    $htmlname of html select object
     * @param string[]  $selected_array or Code or Label of preselected country
     * @return string   HTML string with select
     */
    public function multiselectState($htmlname = 'state_id', $selected_array = array())
    {
    }
    /**
     * Return combo list of activated countries, into language of user
     *
     * @param string    $htmlname of html select object
     * @param string[]  $selected_array or Code or Label of preselected country
     * @return string   HTML string with select
     */
    public function multiselectCountry($htmlname = 'country_id', $selected_array = array())
    {
    }
    /**
     * Return select list for categories (to use in form search selectors)
     *
     * @param string $htmlname control name
     * @param string[] $selected_array array of data
     * @param User $user User action
     * @return string combo list code
     */
    public function multiselectselectSalesRepresentatives($htmlname, $selected_array, $user)
    {
    }
    /**
     * Return select list for categories (to use in form search selectors)
     *
     * @param string $htmlname of combo list (example: 'search_sale')
     * @param string[] $selected_array selected array
     * @return string combo list code
     */
    public function multiselectselectLanguage($htmlname = '', $selected_array = array())
    {
    }
    /**
     * Return multiselect list of entities for extrafield type sellist
     *
     * @param string $htmlname control name
     * @param array<string,string> $sqlqueryparam array
     * @param string[] $selected_array array
     *
     *  @return	string HTML combo
     */
    public function advMultiselectarraySelllist($htmlname, $sqlqueryparam = array(), $selected_array = array())
    {
    }
    /**
     *  Return combo list with people title
     *
     * 	@param	string $htmlname	       Name of HTML select combo field
     *  @param  string[]	$selected_array     Array
     *  @return	string                     HTML combo
     */
    public function multiselectCivility($htmlname = 'civilite_id', $selected_array = array())
    {
    }
    /**
     * Return multiselect list of entities.
     *
     * @param string $htmlname select
     * @param array<string,mixed> $options_array to manage
     * @param string[] $selected_array to manage
     * @param int $showempty show empty
     * @return string HTML combo
     */
    public function advMultiselectarray($htmlname, $options_array = array(), $selected_array = array(), $showempty = 0)
    {
    }
    /**
     * Return a combo list to select emailing target selector
     *
     * @param	string 			$htmlname 		control name
     * @param	integer 		$selected  		default selected
     * @param	integer|string 	$showempty 		1=Add an empty lines, 'string'=Value of placeholder for the emptyline
     * @param	string			$type_element	Type element. Example: 'mailing'
     * @param	string			$morecss		More CSS
     * @return	string 							HTML combo
     */
    public function selectAdvtargetemailingTemplate($htmlname = 'template_id', $selected = 0, $showempty = 0, $type_element = 'mailing', $morecss = '')
    {
    }
}