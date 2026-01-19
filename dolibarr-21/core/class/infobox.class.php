<?php

/* Copyright (C) 2003		Rodolphe Quiedeville	<rodolphe@quiedeville.org>
 * Copyright (C) 2004-2012	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012	Regis Houssin			<regis.houssin@inodbox.com>
 * Copyright (C) 2019		Nicolas ZABOURI			<info@inovea-conseil.com>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
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
 *	\file       htdocs/core/class/infobox.class.php
 *	\brief      File of class to manage widget boxes
 */
/**
 *	Class to manage boxes on pages. This is an utility class (all is static)
 */
class InfoBox
{
    /**
     * Name of positions (See below)
     *
     * @return	string[]		Array with list of zones
     */
    public static function getListOfPagesForBoxes()
    {
    }
    /**
     *  Return array of boxes qualified for area and user
     *
     *  @param	DoliDB		$dbs			Database handler
     *  @param	string		$mode			'available' or 'activated'
     *  @param	int			$zone			Name or area (-1 for all, 0 for Homepage, 1 for Accountancy, 2 for xxx, ...)
     *  @param  ?User		$user	  		Object user to filter
     *  @param	int[]		$excludelist	Array of box id (box.box_id = boxes_def.rowid) to exclude
     *  @param  int         $includehidden  Include also hidden boxes
     *  @return ModeleBoxes[]|array{error:string}	Array of boxes or error info
     */
    public static function listBoxes($dbs, $mode, $zone, $user = \null, $excludelist = array(), $includehidden = 1)
    {
    }
    /**
     *  Save order of boxes for area and user
     *
     *  @param	DoliDB		$dbs			Database handler
     *  @param	int|string	$zone       	Key of area ('0' for Homepage, '1', 'pagename', ...)
     *  @param  string  	$boxorder   	List of boxes with correct order 'A:123,456,...-B:789,321...'
     *  @param  int     	$userid     	Id of user
     *  @return int         	          	Return integer <0 if KO, 0=Nothing done, > 0 if OK
     */
    public static function saveboxorder($dbs, $zone, $boxorder, $userid = 0)
    {
    }
}