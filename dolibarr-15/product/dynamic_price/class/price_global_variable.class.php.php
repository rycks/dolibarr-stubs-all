<?php

/* Copyright (C) 2007-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2014	   Juanjo Menent		<jmenent@2byte.es>
 * Copyright (C) 2015      Ion Agorria          <ion@agorria.com>
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
 *	\file       htdocs/product/dynamic_price/class/price_global_variable.class.php
 *	\ingroup    product
 *  \brief      Class for accessing price global variables table
 */
/**
 *	Class for accesing price global variables table
 */
class PriceGlobalVariable
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
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var int ID
     */
    public $id;
    public $code;
    /**
     * @var string description
     */
    public $description;
    public $value;
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = "c_price_global_variable";
    /**
     *  Constructor
     *
     *  @param	DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param	User	$user        User that creates
     *  @param  int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return int      		   	 <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param		int		$id    	Id object
     *  @return		int			    < 0 if KO, 0 if OK but not found, > 0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 <0 if KO, >0 if OK
     */
    public function update($user = 0, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     * 	@param	int		$rowid		 Row id of global variable
     *	@param  User	$user        User that deletes
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 <0 if KO, >0 if OK
     */
    public function delete($rowid, $user, $notrigger = 0)
    {
    }
    /**
     *	Initialise object with example values
     *	Id must be 0 if object instance is a specimen
     *
     *	@return	void
     */
    public function initAsSpecimen()
    {
    }
    /**
     *	Checks if all parameters are in order
     *
     *	@return	void
     */
    public function checkParameters()
    {
    }
    /**
     *    List all price global variables
     *
     *    @return	array				Array of price global variables
     */
    public function listGlobalVariables()
    {
    }
}