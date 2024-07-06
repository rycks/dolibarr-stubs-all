<?php

/* Copyright (C) 2007-2019	Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2005-2009	Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2023		William Mead		<william.mead@manchenumerique.fr>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
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
 *      \file       htdocs/core/class/events.class.php
 *      \ingroup    core
 *		\brief      File of class to manage security events.
 */
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
    /**
     * @var int timestamp
     */
    public $tms;
    /**
     * @var string Type
     */
    public $type;
    /**
     * @var int Entity
     */
    public $entity;
    public $dateevent;
    /**
     * @var string IP
     */
    public $ip;
    /**
     * @var string User agent
     */
    public $user_agent;
    /**
     * @var string label
     */
    public $label;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var string	Prefix session obtained with method dol_getprefix()
     */
    public $prefix_session;
    /**
     * @var string	Authentication method used for USER_LOGIN with success
     */
    public $authentication_method;
    // List of all Audit/Security events supported by triggers
    public $eventstolog = array(array('id' => 'USER_LOGIN', 'test' => 1), array('id' => 'USER_LOGIN_FAILED', 'test' => 1), array('id' => 'USER_LOGOUT', 'test' => 1), array('id' => 'USER_CREATE', 'test' => 1), array('id' => 'USER_MODIFY', 'test' => 1), array('id' => 'USER_NEW_PASSWORD', 'test' => 1), array('id' => 'USER_ENABLEDISABLE', 'test' => 1), array('id' => 'USER_DELETE', 'test' => 1), array('id' => 'USERGROUP_CREATE', 'test' => 1), array('id' => 'USERGROUP_MODIFY', 'test' => 1), array('id' => 'USERGROUP_DELETE', 'test' => 1));
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'noteditable' => 1, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'default' => 1, 'index' => 1, 'position' => 20), 'prefix_session' => array('type' => 'varchar(255)', 'label' => 'PrefixSession', 'enabled' => 1, 'visible' => -1, 'notnull' => -1, 'index' => 0, 'position' => 1000), 'user_agent' => array('type' => 'varchar(255)', 'label' => 'UserAgent', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'default' => 0, 'index' => 1, 'position' => 1000));
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
     *   @return     int                Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     * Update database
     *
     * @param	User    $user        	User that modify
     * @param   int		$notrigger	    0=no, 1=yes (no update trigger)
     * @return  int         			Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @param  User	$user       User that load
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $user = \null)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param	User	$user       User that delete
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return int
     */
    public function initAsSpecimen()
    {
    }
}