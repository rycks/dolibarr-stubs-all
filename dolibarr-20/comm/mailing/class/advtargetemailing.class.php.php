<?php

/* Advance Targeting Emailing for mass emailing module
 * Copyright (C) 2013  Florian Henry <florian.henry@open-concept.pro>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
/**
 * 	\file		comm/mailing/class/advtargetemailing.class.php
 * 	\ingroup	mailing
 * 	\brief		This file is an example CRUD class file (Create/Read/Update/Delete)
 */
/**
 * Class to manage advanced emailing target selector
 */
class AdvanceTargetingMailing extends \CommonObject
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'advtargetemailing';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'mailing_advtarget';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string name
     */
    public $name;
    /**
     * @var int	element id (it's not the name of a field)
     */
    public $fk_element;
    /**
     * @var string type element
     */
    public $type_element;
    /**
     * @var string filter value
     */
    public $filtervalue;
    /**
     * @var int user author id
     */
    public $fk_user_author;
    /**
     * @var int|string datec
     */
    public $datec = '';
    /**
     * @var int user mod id
     */
    public $fk_user_mod;
    /**
     * @var array select target type
     */
    public $select_target_type = array();
    /**
     * @var array type status comm prospect
     */
    public $type_statuscommprospect = array();
    public $thirdparty_lines;
    public $contact_lines;
    /**
     *  Constructor
     *
     *  @param  DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param	User    $user        User that creates
     *  @param  int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return int      		   	 Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id    Id object
     *  @return int          	Return integer <0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id    Id object
     *  @return int          	Return integer <0 if KO, >0 if OK
     */
    public function fetch_by_mailing($id = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id    			Id object
     *  @param	string	$type_element	Type target
     *  @return int          			Return integer <0 if KO, >0 if OK
     */
    public function fetch_by_element($id = 0, $type_element = 'mailing')
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that deletes
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Save query in database to retrieve it
     *
     *	@param  	User		$user    		User that deletes
     * 	@param		array		$arrayquery		All element to Query
     * 	@return		int			Return integer <0 if KO, >0 if OK
     */
    public function savequery($user, $arrayquery)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load object in memory from database
     *
     * 	@param		array		$arrayquery	All element to Query
     * 	@return		int			Return integer <0 if KO, >0 if OK
     */
    public function query_thirdparty($arrayquery)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load object in memory from database
     *
     * 	@param		array		$arrayquery	All element to Query
     * 	@param		int			$withThirdpartyFilter	add contact with tridparty filter
     * 	@return		int			Return integer <0 if KO, >0 if OK
     */
    public function query_contact($arrayquery, $withThirdpartyFilter = 0)
    {
    }
    /**
     * Parse criteria to return a SQL query formatted
     *
     * 	@param		string		$column_to_test	column to test
     *  @param		string		$criteria	Use %% as magic characters. For example to find all item like <b>jean, joe, jim</b>, you can input <b>j%%</b>, you can also use ; as separator for value,
     *  									and use ! for except this value.
     *  									For example  jean;joe;jim%%;!jimo;!jima%> will target all jean, joe, start with jim but not jimo and not everythnig that start by jima
     * 	@return		string		Sql to use for the where condition
     */
    public function transformToSQL($column_to_test, $criteria)
    {
    }
}