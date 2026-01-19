<?php

/* Copyright (C) 2007-2009	Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2009-2012	Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2018-2024  Frédéric France     <frederic.france@free.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 *  \file       htdocs/core/class/menubase.class.php
 *  \ingroup    core
 *  \brief      File of class to manage dynamic menu entries
 */
/**
 *  Class to manage menu entries
 */
class Menubase
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error;
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string Menu handler
     */
    public $menu_handler;
    /**
     * @var string Module name if record is added by a module
     */
    public $module;
    /**
     * @var string Menu top or left
     */
    public $type;
    /**
     * @var string Name family/module for top menu (home, companies, ...)
     */
    public $mainmenu;
    /**
     * @var int 0 or Id of mother menu line, or -1 if we use fk_mainmenu and fk_leftmenu
     */
    public $fk_menu;
    /**
     * @var string fk_mainmenu
     */
    public $fk_mainmenu;
    /**
     * @var string fk_leftmenu
     */
    public $fk_leftmenu;
    /**
     * @var int Sort order of entry
     */
    public $position;
    /**
     * @var string Relative (or absolute) url to go
     */
    public $url;
    /**
     * @var string Target of Url link
     */
    public $target;
    /**
     * @var string Key for menu translation
     * @deprecated
     * @see $title
     */
    public $titre;
    /**
     * @var string Key for menu translation
     */
    public $title;
    /**
     * @var string Prefix
     */
    public $prefix;
    /**
     * @var string Lang file to load for translation
     */
    public $langs;
    /**
     * @var string Name family/module for left menu (setup, info, ...)
     */
    public $leftmenu;
    /**
     * @var string Condition to show enabled or disabled
     */
    public $perms;
    /**
     * @var string|int<0,1> Condition to show or hide
     */
    public $enabled;
    /**
     * @var int 0 if menu for all users, 1 for external only, 2 for internal only
     */
    public $user;
    /**
     * @var int timestamp
     */
    public $tms;
    /**
     * @var Menu menu
     */
    public $newmenu;
    /**
     *  Constructor
     *
     *  @param		DoliDB		$db 		    Database handler
     *  @param     	string		$menu_handler	Menu handler
     */
    public function __construct($db, $menu_handler = '')
    {
    }
    /**
     *  Create menu entry into database
     *
     *  @param      User	$user       User that create
     *  @return     int      			Return integer <0 if KO, Id of record if OK
     */
    public function create($user = \null)
    {
    }
    /**
     *  Update menu entry into database.
     *
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=no, 1=yes (no update trigger)
     *  @return int 		        	Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *   Load object in memory from database
     *
     *   @param		int		$id         Id object
     *   @param		User    $user       User that load
     *   @return	int         		Return integer <0 if KO, >0 if OK
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
    /**
     *	Load tabMenu array with top menu entries found into database.
     *
     * 	@param	string	$mymainmenu		Value for mainmenu to filter menu to load (always '')
     * 	@param	string	$myleftmenu		Value for leftmenu to filter menu to load (always '')
     * 	@param	int		$type_user		0=Menu for backoffice, 1=Menu for front office
     * 	@param	string	$menu_handler	Filter on name of menu_handler used (auguria, eldy...)
     * 	@param  array<array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string}>	$tabMenu	If array with menu entries already loaded, we put this array here (in most cases, it's empty)
     * 	@return  array<array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string}>	Return array with menu entries for top menu
     */
    public function menuTopCharger($mymainmenu, $myleftmenu, $type_user, $menu_handler, &$tabMenu)
    {
    }
    /**
     * 	Load entries found from database (and stored into $tabMenu) in $this->newmenu array.
     *  Warning: Entries in $tabMenu must have child after parent
     *
     * 	@param	Menu	$newmenu        Menu array to complete (in most cases, it's empty, may be already initialized with some menu manager like eldy)
     * 	@param	string	$mymainmenu		Value for mainmenu to filter menu to load (often $_SESSION["mainmenu"])
     * 	@param	string	$myleftmenu		Value for leftmenu to filter menu to load (always '')
     * 	@param	int		$type_user		0=Menu for backoffice, 1=Menu for front office
     * 	@param	string	$menu_handler	Filter on name of menu_handler used (auguria, eldy...)
     * 	@param  array<array{rowid:string,fk_menu:string,module:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string}>	$tabMenu	Array with menu entries already loaded
     * 	@return Menu    		       	Menu array for particular mainmenu value or full tabArray
     */
    public function menuLeftCharger($newmenu, $mymainmenu, $myleftmenu, $type_user, $menu_handler, &$tabMenu)
    {
    }
    /**
     *  Load entries found in database into variable $tabMenu. Note that only "database menu entries" are loaded here, hardcoded will not be present into output.
     *
     *  @param	string	$mymainmenu     Value for mainmenu that defined mainmenu
     *  @param	string	$myleftmenu     Value for left that defined leftmenu
     *  @param  int		$type_user      Looks for menu entry for 0=Internal users, 1=External users
     *  @param  string	$menu_handler   Name of menu_handler used ('auguria', 'eldy'...)
     * 	@param  array<array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string}>	$tabMenu	Array to store new entries found (in most cases, it's empty, but may be already filled)
     *  @return int     		        >0 if OK, <0 if KO
     */
    public function menuLoad($mymainmenu, $myleftmenu, $type_user, $menu_handler, &$tabMenu)
    {
    }
    /**
     *  Complete this->newmenu with menu entry found in $tab
     *
     * 	@param  array<array{rowid:string,fk_menu:string,langs:string,enabled:int<0,2>,type:string,fk_mainmenu:string,fk_leftmenu:string,url:string,titre:string,perms:string,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,prefix:string}>	$tab	Tab array with all menu entries
     *  @param  int		$pere			Id of parent
     *  @param  int		$level			Level
     *  @return	void
     */
    private function recur($tab, $pere, $level)
    {
    }
}