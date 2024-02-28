<?php

/* Copyright (C) 2007-2010 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2009 Regis Houssin        <regis.houssin@inodbox.com>
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
 *      \file       htdocs/core/class/events.class.php
 *      \ingroup    core
 *		\brief      File of class to manage security events.
 *		\author		Laurent Destailleur
 */
// Put here all includes required by your class file
//require_once DOL_DOCUMENT_ROOT.'/core/class/commonobject.class.php';
//require_once DOL_DOCUMENT_ROOT.'/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT.'/product/class/product.class.php';
/**
 *  Events class
 */
class Events
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'events';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'events';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $tms;
    public $type;
    /**
     * @var int Entity
     */
    public $entity;
    public $dateevent;
    /**
     * @var string description
     */
    public $description;
    // List of all Audit/Security events supported by triggers
    public $eventstolog = array(
        array('id' => 'USER_LOGIN', 'test' => 1),
        array('id' => 'USER_LOGIN_FAILED', 'test' => 1),
        array('id' => 'USER_LOGOUT', 'test' => 1),
        array('id' => 'USER_CREATE', 'test' => 1),
        array('id' => 'USER_MODIFY', 'test' => 1),
        array('id' => 'USER_NEW_PASSWORD', 'test' => 1),
        array('id' => 'USER_ENABLEDISABLE', 'test' => 1),
        array('id' => 'USER_DELETE', 'test' => 1),
        /*    array('id'=>'USER_SETINGROUP',        'test'=>1), deprecated. Replace with USER_MODIFY
        	    array('id'=>'USER_REMOVEFROMGROUP',   'test'=>1), deprecated. Replace with USER_MODIFY */
        array('id' => 'GROUP_CREATE', 'test' => 1),
        array('id' => 'GROUP_MODIFY', 'test' => 1),
        array('id' => 'GROUP_DELETE', 'test' => 1),
    );
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *   Create in database
     *
     *   @param      User	$user       User that create
     *   @return     int                <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     * Update database
     *
     * @param	User    $user        	User that modify
     * @param   int		$notrigger	    0=no, 1=yes (no update trigger)
     * @return  int         			<0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @param  User	$user       User that load
     *  @return int         		<0 if KO, >0 if OK
     */
    public function fetch($id, $user = \null)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param	User	$user       User that delete
     *	@return	int					<0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
}