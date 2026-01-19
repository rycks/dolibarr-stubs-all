<?php

/* Copyright (C) 2024        Anthony Damhet        <a.damhet@progiseize.fr>
 * Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
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
 *    \file       htdocs/admint/tools/ui/class/uidoc.class.php
 *    \ingroup    ui
 *    \brief      File of class to manage UI documentation
 */
/**
 *    Class to manage UI documentation
 */
class Documentation
{
    /**
     * Views
     *
     * @var array
     */
    public $view = array();
    /**
     * Menu - Set in setMenu in order to use dol_buildpath and called in constructor
     *
     * @var array
     */
    public $menu = array();
    /**
     * Summary - Set in setSummary and called in constructor
     *
     * @var array
     */
    public $summary = array();
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string
     */
    public $baseUrl = 'admin/tools/ui';
    /**
     *    Constructor
     *
     * @param DoliDB $db Database handler
     * @return void
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *    Set Documentation Menu
     *
     * @return mixed false if error, void if no errors
     */
    private function setMenu()
    {
    }
    /**
     * Output header + body
     *
     * @param string $title Title of page
     * @param 	string[]	$arrayofjs		Array of complementary js files
     * @param 	string[]	$arrayofcss		Array of complementary css files
     * @param	string		$hidenavmenu	Hide nav menu
     * @return void
     */
    public function docHeader($title = '', $arrayofjs = [], $arrayofcss = [], $hidenavmenu = '')
    {
    }
    /**
     *    Output close body + html
     * @return void
     */
    public function docFooter()
    {
    }
    /**
     * Output sidebar
     *
     * @return 	void
     */
    public function showSidebar()
    {
    }
    /**
     *    Recursive function to set Menu
     *
     * @param array $menu  $this->menu or submenus
     * @param int   $level level of menu
     * @return void
     */
    private function displayMenu($menu, $level = 0)
    {
    }
    /**
     *    Output breadcrumb
     * @return void
     */
    public function showBreadcrumb()
    {
    }
    /**
     * Output summary
     *
     * @param int $showsubmenu 			Show Sub menus: 0 = No, 1 = Yes
     * @param int $showsubmenu_summary	Show summary of sub menus: 0 = No, 1 = Yes
     * @return void
     */
    public function showSummary($showsubmenu = 1, $showsubmenu_summary = 1)
    {
    }
    /**
     *    Recursive function for Automatic Summary
     *
     * @param array $menu  					$this->menu or submenus
     * @param int   $level 					level of menu
     * @param int   $showsubmenu 			Show Sub menus: 0 = No, 1 = Yes
     * @param int   $showsubmenu_summary 	Show summary of sub menus: 0 = No, 1 = Yes
     * @return void
     */
    public function displaySummary($menu, $level = 0, $showsubmenu = 1, $showsubmenu_summary = 1)
    {
    }
    /**
     *    Output a View Code area
     *
     * @param array $lines Lines of code to show
     * @param string $option Source code language ('html', 'php' etc)
     * @return void
     */
    public function showCode($lines = array(), $option = 'html')
    {
    }
}