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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/**
 *      \file       htdocs/core/class/ccountry.class.php
 *      \ingroup    core
 *      \brief      This file is a CRUD class file (Create/Read/Update/Delete) for c_country dictionary
 */
// Put here all includes required by your class file
//require_once DOL_DOCUMENT_ROOT.'/core/class/commonobject.class.php';
//require_once DOL_DOCUMENT_ROOT.'/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT.'/product/class/product.class.php';
/**
 * 	Class to manage dictionary Countries (used by imports)
 */
class Ccountry
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
    //var $element='ccountry';			//!< Id that identify managed objects
    //var $table_element='ccountry';	//!< Name of table without prefix where object is stored
    /**
     * @var int ID
     */
    public $id;
    public $code;
    public $code_iso;
    /**
     * @var string Countries label
     */
    public $label;
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
     *  @param      int		$id    	Id object
     *  @param		string	$code	Code
     *  @return     int          	>0 if OK, 0 if not found, <0 if KO
     */
    public function fetch($id, $code = '')
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
     *  @param	int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
}