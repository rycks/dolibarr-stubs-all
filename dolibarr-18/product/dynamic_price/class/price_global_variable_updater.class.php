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
 *	\file       htdocs/product/dynamic_price/class/price_global_variable_updater.class.php
 *	\ingroup    product
 *  \brief      Class for price global variable updaters table
 */
/**
 *	Class for price global variable updaters table
 */
class PriceGlobalVariableUpdater
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
    public $types = array(0, 1);
    //!< Updater types
    public $update_min = 5;
    //!< Minimal update rate
    /**
     * @var int ID
     */
    public $id;
    public $type;
    /**
     * @var string description
     */
    public $description;
    public $parameters;
    /**
     * @var int ID
     */
    public $fk_variable;
    public $update_interval;
    //!< Interval in mins
    public $next_update;
    //!< Next update timestamp
    public $last_status;
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = "c_price_global_variable_updater";
    /**
     *  Constructor
     *
     *  @param  DoliDb      $db      Database handler
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
     *  Returns the last updated time in string html format, returns "never" if its less than 1
     *
     *  @return	string
     */
    public function getLastUpdated()
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
     *  List all price global variables
     *
     *  @return	array|int				Array of price global variable updaters
     */
    public function listUpdaters()
    {
    }
    /**
     *  List all updaters which need to be processed
     *
     *  @return	array|int				Array of price global variable updaters
     */
    public function listPendingUpdaters()
    {
    }
    /**
     *  Handles the processing of this updater
     *
     *  @return	int					 <0 if KO, 0 if OK but no global variable found, >0 if OK
     */
    public function process()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update next_update into database
     *
     *  @param	string	$next_update Next update to write
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 <0 if KO, >0 if OK
     */
    public function update_next_update($next_update, $user = 0, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update last_status into database
     *
     *  @param	string	$last_status Status to write
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 <0 if KO, >0 if OK
     */
    public function update_status($last_status, $user = 0, $notrigger = 0)
    {
    }
}