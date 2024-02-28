<?php

/* Copyright (C) 2006-2012	Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2010-2017	Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2015	    Alexandre Spangaro	<aspangaro@open-dsi.fr>
 * Copyright (C) 2018       Ferran Marcet       <fmarcet@2byte.es>
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
 * or see http://www.gnu.org/
 */
/**
 *	    \file       htdocs/core/lib/usergroups.lib.php
 *		\brief      Ensemble de fonctions de base pour la gestion des utilisaterus et groupes
 */
/**
 * Prepare array with list of tabs
 *
 * @param   Object	$object		Object related to tabs
 * @return  array				Array of tabs to show
 */
function user_prepare_head($object)
{
}
/**
 * Prepare array with list of tabs
 *
 * @param 	UserGroup $object		Object group
 * @return	array				    Array of tabs
 */
function group_prepare_head($object)
{
}
/**
 * Prepare array with list of tabs
 *
 * @return  array				Array of tabs to show
 */
function user_admin_prepare_head()
{
}
/**
 * 	Show list of themes. Show all thumbs of themes
 *
 * 	@param	User|null	$fuser				User concerned or null for global theme
 * 	@param	int			$edit				1 to add edit form
 * 	@param	boolean		$foruserprofile		Show for user profile view
 * 	@return	void
 */
function show_theme($fuser, $edit = 0, $foruserprofile = \false)
{
}