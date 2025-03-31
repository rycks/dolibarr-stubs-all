<?php

/* Copyright (C) 2012 Laurent Destailleur   <eldy@users.sourceforge.net>
 * Copyright (C) 2022 Josep Lluís Amador	<joseplluis@lliuretic.cat>
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
 *	\file       htdocs/core/class/html.formpropal.class.php
 *  \ingroup    core
 *	\brief      File of class with all html predefined components
 */
/**
 *	Class to manage generation of HTML components for proposal management
 */
class FormPropal
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
    /**
     *    Return combo list of different statuses of a proposal
     *    Values are id of table c_propalst
     *
     *    @param	string	$selected   	Preselected value
     *    @param	int		$short			Use short labels
     *    @param	int		$excludedraft	0=All status, 1=Exclude draft status
     *    @param	int 	$showempty		1=Add empty line
     *    @param    string  $mode           'customer', 'supplier'
     *    @param    string  $htmlname       Name of select field
     *    @param	string	$morecss		More css
     *    @return	void
     */
    public function selectProposalStatus($selected = '', $short = 0, $excludedraft = 0, $showempty = 1, $mode = 'customer', $htmlname = 'propal_statut', $morecss = '')
    {
    }
}