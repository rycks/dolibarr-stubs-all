<?php

/* Copyright (C) 2012-2013  Charles-Fr BENKE		<charles.fr@benke.fr>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * or see http://www.gnu.org/
 */
/**
 * \file       htdocs/core/class/html.formintervention.class.php
 * \ingroup    core
 * \brief      File of class with all html predefined components
 */
/**
 *	Class to manage generation of HTML components for contract module
 */
class FormIntervention
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
     *	Show a combo list with contracts qualified for a third party
     *
     *	@param	int		$socid      Id third party (-1=all, 0=only interventions not linked to a third party, id=intervention not linked or linked to third party id)
     *	@param  int		$selected   Id intervention preselected
     *	@param  string	$htmlname   Nom de la zone html
     *	@param	int		$maxlength	Maximum length of label
     *	@param	int		$showempty	Show empty line
     *	@return int         		Nbre of project if OK, <0 if KO
     */
    public function select_interventions($socid = -1, $selected = '', $htmlname = 'interventionid', $maxlength = 16, $showempty = 1)
    {
    }
}