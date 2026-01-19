<?php

/* Copyright (C) 2008 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2009 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2016 Marcos García        <marcosgdf@gmail.com>
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
 * \file       compta/bank/class/bankcateg.class.php
 * \ingroup    bank
 * \brief      This file is CRUD class file (Create/Read/Update/Delete) for bank categories
 */
/**
 *    Class to manage bank categories
 */
class BankCateg
{
    //public $element='bank_categ';			//!< Id that identify managed objects
    //public $table_element='bank_categ';	//!< Name of table without prefix where object is stored
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'generic';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string bank categories label
     */
    public $label;
    /**
     * @var DoliDB
     */
    protected $db;
    /**
     * @var string error
     */
    public $error;
    /**
     * @var array errors
     */
    public $errors;
    /**
     * @var array context
     */
    public $context;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *  Create in database
     *
     * @param  User $user User that create
     * @param  int $notrigger 0=launch triggers after, 1=disable triggers
     * @return int Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from database
     *
     * @param  int $id Id object
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     * Update database
     *
     * @param  User|null	$user 		User that modify
     * @param  int 			$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int          	        Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user = \null, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param  User    $user       User that delete
     * @param  int     $notrigger  0=launch triggers after, 1=disable triggers
     * @return int                 Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		User making the clone
     * @param   int     $fromid     Id of object to clone
     * @return  int                 New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     * Returns all bank categories
     *
     * @return BankCateg[]
     */
    public function fetchAll()
    {
    }
    /**
     * Initialise an instance with random values.
     * Used to build previews or test instances.
     * id must be 0 if object instance is a specimen.
     *
     * @return void
     */
    public function initAsSpecimen()
    {
    }
}