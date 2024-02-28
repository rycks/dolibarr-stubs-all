<?php

/*
 * Copyright (C) 2013   Florian Henry      <florian.henry@open-concept.pro>
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
 *      \file       htdocs/core/class/html.formcron.class.php
 *      \brief      Fichier de la classe des fonctions predefinie de composants html cron
 */
/**
 *      Class to manage building of HTML components
 */
class FormCron extends \Form
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
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Display On Off selector
     *
     *  @param  string      $htmlname       Html control name
     *  @param  integer     $selected       selected value
     *  @param  integer     $readonly       Select is read only or not
     *  @return string                      HTML select field
     */
    public function select_typejob($htmlname, $selected = 0, $readonly = 0)
    {
    }
}