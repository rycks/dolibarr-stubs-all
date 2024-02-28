<?php

/* Copyright (C) 2012-2018  Charlene BENKE	<charlie@patas-monkey.com>
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
 * or see https://www.gnu.org/
 */
/**
 * \file       htdocs/core/class/html.formcontract.class.php
 * \ingroup    core
 * \brief      File of class with all html predefined components
 */
/**
 *	Class to manage generation of HTML components for contract module
 */
class FormContract
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
     *	@param	int		$socid      Id third party (-1=all, 0=only contracts not linked to a third party, id=contracts not linked or linked to third party id)
     *	@param  int		$selected   Id contract preselected
     *	@param  string	$htmlname   Nom de la zone html
     *	@param	int		$maxlength	Maximum length of label
     *	@param	int		$showempty	Show empty line
     *	@return int         		Nbr of project if OK, <0 if KO
     */
    public function select_contract($socid = -1, $selected = '', $htmlname = 'contrattid', $maxlength = 16, $showempty = 1)
    {
    }
    /**
     *  Show a form to select a contract
     *
     *  @param  int     $page       Page
     *  @param  int     $socid      Id third party (-1=all, 0=only contracts not linked to a third party, id=contracts not linked or linked to third party id)
     *  @param  int     $selected   Id contract preselected
     *  @param  string  $htmlname   Nom de la zone html
     *  @param  int     $maxlength	Maximum length of label
     *  @param  int     $showempty	Show empty line
     *  @return int                 Nbr of project if OK, <0 if KO
     */
    public function formSelectContract($page, $socid = -1, $selected = '', $htmlname = 'contrattid', $maxlength = 16, $showempty = 1)
    {
    }
}