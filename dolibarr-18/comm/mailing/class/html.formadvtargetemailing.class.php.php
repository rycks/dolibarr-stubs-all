<?php

/* Copyright (C) 2014       Florian Henry           <florian.henry@open-concept.pro>
 * Copyright (C) 2019       Frédéric France         <frederic.france@netlogic.fr>
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
 * \brief   Fichier de la classe des fonctions predefinies de composant html advtargetemailing
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
     * @param array $selected_array à preselectionner
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
     * @param array     $selected_array or Code or Label of preselected country
     * @return string   HTML string with select
     */
    public function multiselectCountry($htmlname = 'country_id', $selected_array = array())
    {
    }
    /**
     * Return select list for categories (to use in form search selectors)
     *
     * @param string $htmlname control name
     * @param array $selected_array array of data
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
     * @param array $selected_array selected array
     * @return string combo list code
     */
    public function multiselectselectLanguage($htmlname = '', $selected_array = array())
    {
    }
    /**
     * Return multiselect list of entities for extrafeild type sellist
     *
     * @param string $htmlname control name
     * @param array $sqlqueryparam array
     * @param array $selected_array array
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
     *  @param  array  $selected_array     Array
     *  @return	string                     HTML combo
     */
    public function multiselectCivility($htmlname = 'civilite_id', $selected_array = array())
    {
    }
    /**
     * Return multiselect list of entities.
     *
     * @param string $htmlname select
     * @param array $options_array to manage
     * @param array $selected_array to manage
     * @param int $showempty show empty
     * @return string HTML combo
     */
    public function advMultiselectarray($htmlname, $options_array = array(), $selected_array = array(), $showempty = 0)
    {
    }
    /**
     * Return a combo list to select emailing target selector
     *
     * @param	string 		$htmlname 		control name
     * @param	integer 	$selected  		defaut selected
     * @param	integer 	$showempty 		empty lines
     * @param	string		$type_element	Type element. Example: 'mailing'
     * @param	string		$morecss		More CSS
     * @return	string 						HTML combo
     */
    public function selectAdvtargetemailingTemplate($htmlname = 'template_id', $selected = 0, $showempty = 0, $type_element = 'mailing', $morecss = '')
    {
    }
}