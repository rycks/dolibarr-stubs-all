<?php

/* Copyright (C) 2013-2014  Olivier Geffroy         <jeff@jeffinfo.com>
 * Copyright (C) 2013-2014  Alexandre Spangaro      <aspangaro@open-dsi.fr>
 * Copyright (C) 2013-2014  Florian Henry           <florian.henry@open-concept.pro>
 * Copyright (C) 2023-2024  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2024       Alexandre Janniaux      <alexandre.janniaux@gmail.com>
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
 * \file		htdocs/accountancy/class/accountancysystem.class.php
 * \ingroup		Accountancy (Double entries)
 * \brief		File of class to manage accountancy systems
 */
/**
 * Class to manage accountancy systems
 */
class AccountancySystem extends \CommonObject
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
     * @var string[] Array of Errors code (or messages)
     */
    public $errors = array();
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var int ID
     * @deprecated
     * @see $id
     */
    public $rowid;
    /**
     * @var string 		Accountancy system code
     */
    public $pcg_version;
    /**
     * @var string 		Ref of accountancy system. Duplicate property with ->pcg_version.
     * @see $pcg_version
     */
    public $ref;
    /**
     * @var int active
     */
    public $active;
    /**
     * @var string Accountancy System label
     */
    public $label;
    /**
     * Constructor
     *
     * @param DoliDB $db handler
     */
    public function __construct($db)
    {
    }
    /**
     * Load record in memory
     *
     * @param 	int 	$rowid 				   Id
     * @param 	string 	$ref             	   ref
     * @return 	int                            Return integer <0 if KO, Id of record if OK and found
     */
    public function fetch($rowid = 0, $ref = '')
    {
    }
    /**
     * Insert accountancy system name into database
     *
     * @param User $user making insert
     * @return int if KO, Id of line if OK
     */
    public function create($user)
    {
    }
}