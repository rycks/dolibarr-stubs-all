<?php

/* Copyright (C) 2017 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *	\file       htdocs/core/class/html.formwebsite.class.php
 *  \ingroup    core
 *	\brief      File of class to manage component html for module website
 */
/**
 *	Class to manage component html for module website
 */
class FormWebsite
{
    private $db;
    /**
     * @var string Error code (or message)
     */
    public $error;
    /**
     * var int		A number of lines
     */
    public $num;
    /**
     *	Constructor
     *
     *	@param	DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Return HTML select list of websites
     *
     *    @param    string	$selected          Id modele pre-selectionne
     *    @param    string	$htmlname          Name of HTML select
     *    @param    int		$useempty          Show empty value or not
     *    @return	string					   Html component
     */
    public function selectWebsite($selected = '', $htmlname = 'exportmodelid', $useempty = 0)
    {
    }
    /**
     *  Return a HTML select list of type of containers from the dictionary
     *
     *  @param  string	$htmlname          	Name of select zone
     *  @param	string	$selected			Selected value
     *  @param  int		$useempty          	1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     *  @param  string  $moreattrib         More attributes on HTML select tag
     *  @param	int		$addjscombo			Add js combo
     *  @param	string	$morecss			More CSS
     * 	@return	void
     */
    public function selectTypeOfContainer($htmlname, $selected = '', $useempty = 0, $moreattrib = '', $addjscombo = 0, $morecss = 'minwidth200')
    {
    }
    /**
     *  Return a HTML select list of samples of containers content
     *
     *  @param  string	$htmlname          	Name of select zone
     *  @param	string	$selected			Selected value
     *  @param  int		$useempty          	1=Add an empty value in list
     *  @param  string  $moreattrib         More attributes on HTML select tag
     *  @param	int		$addjscombo			Add js combo
     * 	@return	string						HTML select component with list of type of containers
     */
    public function selectSampleOfContainer($htmlname, $selected = '', $useempty = 0, $moreattrib = '', $addjscombo = 0)
    {
    }
    /**
     *  Return a HTML select list of containers of a website.
     *  Note: $website->lines must have been loaded.
     *
     *  @param  Website		$website       	Object Website
     *  @param	string		$htmlname		Name of select zone
     *  @param	int			$pageid			Preselected container ID
     *  @param	int			$showempty		Show empty record
     *  @param	string		$action			Action on page that use this select list
     *  @param	string		$morecss		More CSS
     *  @param	array		$excludeids		Exclude some ID in list
     * 	@return	string						HTML select component with list of block containers
     */
    public function selectContainer($website, $htmlname = 'pageid', $pageid = 0, $showempty = 0, $action = '', $morecss = 'minwidth200', $excludeids = \null)
    {
    }
}