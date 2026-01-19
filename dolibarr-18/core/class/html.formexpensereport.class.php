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
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 */
/**
 * \file       htdocs/core/class/html.formexpensereport.class.php
 * \ingroup    core
 * \brief      File of class with all html predefined components
 */
/**
 *	Class to manage generation of HTML components for contract module
 */
class FormExpenseReport
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
     *    Retourne la liste deroulante des differents etats d'une note de frais.
     *    Les valeurs de la liste sont les id de la table c_expensereport_statuts
     *
     *    @param    int     $selected       preselect status
     *    @param    string  $htmlname       Name of HTML select
     *    @param    int     $useempty       1=Add empty line
     *    @param    int     $useshortlabel  Use short labels
     *    @return   string                  HTML select with status
     */
    public function selectExpensereportStatus($selected = '', $htmlname = 'fk_statut', $useempty = 1, $useshortlabel = 0)
    {
    }
    /**
     *  Return list of types of notes with select value = id
     *
     *  @param      int     $selected       Preselected type
     *  @param      string  $htmlname       Name of field in form
     *  @param      int     $showempty      Add an empty field
     *  @param      int     $active         1=Active only, 0=Unactive only, -1=All
     *  @return     string                  Select html
     */
    public function selectTypeExpenseReport($selected = '', $htmlname = 'type', $showempty = 0, $active = 1)
    {
    }
}