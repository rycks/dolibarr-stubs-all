<?php

/* Copyright (C) 2002-2006 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2005-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *  \file       htdocs/core/class/menu.class.php
 *  \ingroup    core
 *  \brief      Fichier de la class de gestion du menu gauche
 */
/**
 *	Class to manage left menus
 */
class Menu
{
    /**
     * List of menu items
     *
     * @var array<array{url:string,titre:string,enabled:int<0,2>,target:string,mainmenu:string,leftmenu:string,position:int,level?:int,id:string,idsel:string,classname:string,prefix:string}>
     */
    public $liste;
    /**
     *	Constructor
     */
    public function __construct()
    {
    }
    /**
     * Clear property ->liste
     *
     * @return	void
     */
    public function clear()
    {
    }
    /**
     * Add a menu entry into this->liste (at end)
     *
     * @param	string	$url        Url to follow on click (does not include DOL_URL_ROOT)
     * @param   string	$titre      Label of menu to add. The value must already be translated.
     * @param   integer	$level      Level of menu to add
     * @param   int		$enabled    Menu active or not (0=Not active, 1=Active, 2=Active but grey)
     * @param   string	$target		Target link
     * @param	string	$mainmenu	Main menu ('home', 'companies', 'products', ...)
     * @param	string	$leftmenu	Left menu ('setup', 'system', 'admintools', ...)
     * @param	int		$position	Position (not used yet)
     * @param	string	$id			Id
     * @param	string	$idsel		Id sel
     * @param	string	$classname	Class name
     * @param	string	$prefix		Prefix to title (image or picto)
     * @return	void
     */
    public function add($url, $titre, $level = 0, $enabled = 1, $target = '', $mainmenu = '', $leftmenu = '', $position = 0, $id = '', $idsel = '', $classname = '', $prefix = '')
    {
    }
    /**
     * Insert a menu entry into this->liste (after $idafter)
     *
     * @param   int     $idafter    Array key after which inserting new entry
     * @param	string	$url        Url to follow on click
     * @param   string	$titre      Label of menu to add. The value must already be translated.
     * @param   integer	$level      Level of menu to add
     * @param   int		$enabled    Menu active or not
     * @param   string	$target		Target link
     * @param	string	$mainmenu	Main menu ('home', 'companies', 'products', ...)
     * @param	string	$leftmenu	Left menu ('setup', 'system', 'admintools', ...)
     * @param	int		$position	Position (not used yet)
     * @param	string	$id			Id
     * @param	string	$idsel		Id sel
     * @param	string	$classname	Class name
     * @param	string	$prefix		Prefix to title (image or picto)
     * @return	void
     */
    public function insert($idafter, $url, $titre, $level = 0, $enabled = 1, $target = '', $mainmenu = '', $leftmenu = '', $position = 0, $id = '', $idsel = '', $classname = '', $prefix = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Remove a menu entry from this->liste
     *
     * @return	void
     */
    public function remove_last()
    {
    }
    /**
     * Return number of visible entries (gray or not)
     *
     *  @return int     Number of visible (gray or not) menu entries
     */
    public function getNbOfVisibleMenuEntries()
    {
    }
}