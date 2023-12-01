<?php

/* Copyright (C) 2007-2012  Laurent Destailleur <eldy@users.sourceforge.net>
 * Copyright (C) 2014       Juanjo Menent       <jmenent@2byte.es>
 * Copyright (C) 2015       Florian Henry       <florian.henry@open-concept.pro>
 * Copyright (C) 2015       Raphaël Doursenaud  <rdoursenaud@gpcsolutions.fr>
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
 * \file    htdocs/compta/paiement/class/cpaiement.class.php
 * \ingroup facture
 * \brief   This file is to manage CRUD function of type of payments
 */
/**
 * Class Cpaiement
 */
class Cpaiement
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'cpaiement';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'c_paiement';
    public $code;
    /**
     * @deprecated
     * @see $label
     */
    public $libelle;
    public $label;
    public $type;
    public $active;
    public $accountancy_code;
    public $module;
    /**
     * Constructor
     *
     * @param DoliDb $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id  Id object
     * @param string $ref Ref
     *
     * @return int <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user      User that deletes
     * @param bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return void
     */
    public function initAsSpecimen()
    {
    }
}