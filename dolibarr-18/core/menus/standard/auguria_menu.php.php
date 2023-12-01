<?php

/* Copyright (C) 2007      Patrick Raguin       <patrick.raguin@gmail.com>
 * Copyright (C) 2009      Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2008-2013 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *	\file       htdocs/core/menus/standard/auguria_menu.php
 *	\brief      Menu auguria manager
 */
/**
 *	Class to manage menu Auguria
 */
class MenuManager
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $type_user;
    // Put 0 for internal users, 1 for external users
    public $atarget = "";
    // To store default target to use onto links
    public $name = "auguria";
    /**
     * @var Menu
     */
    public $menu;
    public $menu_array;
    public $menu_array_after;
    public $tabMenu;
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db     	Database handler
     *  @param	int			$type_user	Type of user
     */
    public function __construct($db, $type_user)
    {
    }
    /**
     * Load this->tabMenu
     *
     * @param	string	$forcemainmenu		To force mainmenu to load
     * @param	string	$forceleftmenu		To force leftmenu to load
     * @return	void
     */
    public function loadMenu($forcemainmenu = '', $forceleftmenu = '')
    {
    }
    /**
     *  Show menu.
     *  Menu defined in sql tables were stored into $this->tabMenu BEFORE this is called.
     *
     *	@param	string	$mode		    'top', 'topnb', 'left', 'jmobile' (used to get full xml ul/li menu)
     *  @param	array	$moredata		An array with more data to output
     *  @return int                     0 or nb of top menu entries if $mode = 'topnb'
     */
    public function showmenu($mode, $moredata = \null)
    {
    }
}