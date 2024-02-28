<?php

/* Copyright (C) 2006-2013 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *	    \file       htdocs/core/menus/standard/empty.php
 *		\brief      This is an example of an empty top menu handler
 */
/**
 *	    Class to manage empty menu
 */
class MenuManager
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $type_user = 0;
    // Put 0 for internal users, 1 for external users
    public $atarget = "";
    // To store default target to use onto links
    public $name = "empty";
    public $menu;
    public $menu_array_after;
    public $tabMenu;
    public $topmenu;
    public $leftmenu;
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db     		Database handler
     *  @param	int			$type_user		Type of user
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
     *  Show menu
     *
     *	@param	string	$mode			'top', 'left', 'jmobile'
     *  @param	array	$moredata		An array with more data to output
     *  @return int                     0 or nb of top menu entries if $mode = 'topnb'
     */
    public function showmenu($mode, $moredata = \null)
    {
    }
}
/**
 * Output menu entry
 *
 * @return	void
 */
function print_start_menu_array_empty()
{
}
/**
 * Output start menu entry
 *
 * @param	string	$idsel		Text
 * @param	string	$classname	String to add a css class
 * @param	int		$showmode	0 = hide, 1 = allowed or 2 = not allowed
 * @return	void
 */
function print_start_menu_entry_empty($idsel, $classname, $showmode)
{
}
/**
 * Output menu entry
 *
 * @param	string	$text			Text
 * @param	int		$showmode		1 or 2
 * @param	string	$url			Url
 * @param	string	$id				Id
 * @param	string	$idsel			Id sel
 * @param	string	$classname		Class name
 * @param	string	$atarget		Target
 * @param	array	$menuval		All the $menuval array
 * @return	void
 */
function print_text_menu_entry_empty($text, $showmode, $url, $id, $idsel, $classname, $atarget, $menuval = array())
{
}
/**
 * Output end menu entry
 *
 * @param	int		$showmode	0 = hide, 1 = allowed or 2 = not allowed
 * @return	void
 */
function print_end_menu_entry_empty($showmode)
{
}
/**
 * Output menu array
 *
 * @return	void
 */
function print_end_menu_array_empty()
{
}