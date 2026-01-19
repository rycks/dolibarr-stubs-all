<?php

/* Copyright (C) 2008-2014 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2009 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2011	   Juanjo Menent        <jmenent@2byte.es>
 * Copyright (C) 2022-2025  Frédéric France				<frederic.france@free.fr>
 * Copyright (C) 2024-2025	MDW					<mdeweerd@users.noreply.github.com>
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
 * or see https://www.gnu.org/
 */
/**
 * \file		htdocs/core/lib/agenda.lib.php
 * \brief		Set of function for the agenda module
 */
/**
 * Show filter form in agenda view
 *
 * @param	Form			$form				Form object
 * @param	int				$canedit			Can edit filter fields
 * @param	string			$status				Status see FormActions::form_select_status_action
 * @param 	int				$year				Year
 * @param 	int				$month				Month
 * @param 	int				$day				Day
 * @param 	int				$showbirthday		Show birthday
 * @param 	string			$filtera			Filter on create by user
 * @param 	string			$filtert			Filter on assigned to user
 * @param 	string			$filtered			Filter of done by user
 * @param 	int				$pid				Product id
 * @param 	int				$socid				Third party id
 * @param	string			$action				Action string
 * @param	array<array{type:string,sr:string,name:string,offsettz:int,color:string,default:string,buggedfile:string}>|int<-1,-1>		$showextcals		Array with list of external calendars (used to show links to select calendar), or -1 to show no legend
 * @param	string|string[]	$actioncode			Preselected value(s) of actioncode for filter on event type
 * @param	int|int[]		$usergroupid		Id of group to filter on users
 * @param	''|'systemauto'|'system'	$excludetype	A type to exclude ('systemauto', 'system', '')
 * @param	int   			$resourceid			Preselected value of resource for filter on resource
 * @param	int     		$search_categ_cus	Tag id
 * @return	void
 */
function print_actions_filter($form, $canedit, $status, $year, $month, $day, $showbirthday, $filtera, $filtert, $filtered, $pid, $socid, $action, $showextcals = array(), $actioncode = '', $usergroupid = 0, $excludetype = '', $resourceid = 0, $search_categ_cus = 0)
{
}
/**
 *  Show actions to do array
 *
 *  @param	int		$max		Max nb of records
 *  @return	void
 */
function show_array_actions_to_do($max = 5)
{
}
/**
 *  Show last actions array
 *
 *  @param	int		$max		Max nb of records
 *  @return	void
 */
function show_array_last_actions_done($max = 5)
{
}
/**
 * Prepare array with list of tabs
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function agenda_prepare_head()
{
}
/**
 * Prepare array with list of tabs
 *
 * @param   object	$object		Object related to tabs
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function actions_prepare_head($object)
{
}
/**
 *  Define head array for tabs of agenda setup pages
 *
 *  @param	string	$param		Parameters to add to url
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function calendars_prepare_head($param)
{
}