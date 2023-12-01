<?php

/* Copyright (C) 2007-2011 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *      \file       htdocs/core/class/cunits.class.php
 *      \ingroup    core
 *      \brief      This file is CRUD class file (Create/Read/Update/Delete) for c_units dictionary
 */
/**
 *	Class of dictionary type of thirdparty (used by imports)
 */
class CUnits
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
    public $records = array();
    //var $element='ctypent';			//!< Id that identify managed objects
    //var $table_element='ctypent';	//!< Name of table without prefix where object is stored
    /**
     * @var int ID
     */
    public $id;
    public $code;
    public $label;
    public $short_label;
    public $unit_type;
    public $scale;
    public $active;
    /**
     *  Constructor
     *
     *  @param      DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param      User	$user        User that create
     *  @param      int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return     int      		   	 <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param      int		$id    			Id of CUnit object to fetch (rowid)
     *  @param		string	$code			Code
     *  @param		string	$short_label	Short Label ('g', 'kg', ...)
     *  @param		string	$unit_type		Unit type ('size', 'surface', 'volume', 'weight', ...)
     *  @return     int						<0 if KO, >0 if OK
     */
    public function fetch($id, $code = '', $short_label = '', $unit_type = '')
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      $sortorder    Sort Order
     * @param  string      $sortfield    Sort field
     * @param  int         $limit        limit
     * @param  int         $offset       Offset
     * @param  array       $filter       Filter array. Example array('field'=>'valueforlike', 'customurl'=>...)
     * @param  string      $filtermode   Filter mode (AND or OR)
     * @return array|int                 int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
    /**
     *  Update object into database
     *
     *  @param      User	$user        User that modify
     *  @param      int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return     int     		   	 <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that delete
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Get unit from code
     * @param string $code code of unit
     * @param string $mode 0= id , short_label=Use short label as value, code=use code
     * @param string $unit_type weight,size,surface,volume,qty,time...
     * @return int            <0 if KO, Id of code if OK
     */
    public function getUnitFromCode($code, $mode = 'code', $unit_type = '')
    {
    }
    /**
     * Unit converter
     * @param double $value value to convert
     * @param int $fk_unit current unit id of value
     * @param int $fk_new_unit the id of unit to convert in
     * @return double
     */
    public function unitConverter($value, $fk_unit, $fk_new_unit = 0)
    {
    }
    /**
     * Get scale of unit factor
     *
     * @param 	int 		$id 	Id of unit in dictionary
     * @return 	float|int			Scale of unit
     */
    public function scaleOfUnitPow($id)
    {
    }
}