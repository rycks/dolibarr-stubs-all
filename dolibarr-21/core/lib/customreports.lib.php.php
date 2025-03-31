<?php

/* Copyright (C) 2024       Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2024		Frédéric France			<frederic.france@free.fr>
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
 * or see https://www.gnu.org/
 */
/**
 *  \file		htdocs/core/lib/customreports.lib.php
 *  \brief		Set of function to manipulate custom reports
 */
/**
 * Fill arrayofmesures for an object
 *
 * @param 	mixed		$object			Any object
 * @param	string		$tablealias		Alias of table
 * @param	string		$labelofobject	Label of object
 * @param	array<string,array{label:string,labelnohtml:string,position:int,table:string,tablefromt:string}>		$arrayofmesures	Array of measures already filled
 * @param	int			$level 			Level
 * @param	int			$count			Count
 * @param	string		$tablepath		Path of all tables ('t' or 't,contract' or 't,contract,societe'...)
 * @return	array<string,array{label:string,labelnohtml:string,position:int,table:string,tablefromt:string}>		Array of measures
 */
function fillArrayOfMeasures($object, $tablealias, $labelofobject, &$arrayofmesures, $level = 0, &$count = 0, &$tablepath = '')
{
}
/**
 * Fill arrayofmesures for an object
 *
 * @param 	mixed		$object			Any object
 * @param	string		$tablealias		Alias of table ('t' for example)
 * @param	string		$labelofobject	Label of object
 * @param	array<string,array{label:string,labelnohtml:string,position:int,table:string,tablefromt:string}>		$arrayofxaxis	Array of xaxis already filled
 * @param	int			$level 			Level
 * @param	int			$count			Count
 * @param	string		$tablepath		Path of all tables ('t' or 't,contract' or 't,contract,societe'...)
 * @return	array<string,array{label:string,labelnohtml:string,position:int,table:string,tablefromt:string}>		Array of xaxis
 */
function fillArrayOfXAxis($object, $tablealias, $labelofobject, &$arrayofxaxis, $level = 0, &$count = 0, &$tablepath = '')
{
}
/**
 * Fill arrayofgroupby for an object
 *
 * @param 	CommonObject	$object			Any object
 * @param	string		$tablealias		Alias of table
 * @param	string		$labelofobject	Label of object
 * @param	array<string,array{label:string,labelnohtml:string,position:int,table:string,tablefromt:string}>	$arrayofgroupby	Array of groupby already filled
 * @param	int			$level 			Level
 * @param	int			$count			Count
 * @param	string		$tablepath		Path of all tables ('t' or 't,contract' or 't,contract,societe'...)
 * @return	array<string,array{label:string,labelnohtml:string,position:int,table:string,tablefromt:string}>		Array of groupby
 */
function fillArrayOfGroupBy($object, $tablealias, $labelofobject, &$arrayofgroupby, $level = 0, &$count = 0, &$tablepath = '')
{
}
/**
 * Fill array of possible filter fields for an object
 *
 * @param 	CommonObject	$object			Any object
 * @param	string		$tablealias		Alias of table ('t' for example)
 * @param	string		$labelofobject	Label of object
 * @param	array<string,array{label:string,labelnohtml:string,position:int,table:string,tablefromt:string,type:string}>	$arrayoffields	Array of fields already filled
 * @param	int			$level 			Level
 * @param	int			$count			Count
 * @param	string		$tablepath		Path of all tables ('t' or 't,contract' or 't,contract,societe'...)
 * @return	array<string,array{label:string,labelnohtml:string,position:int,table:string,tablefromt:string,type:string}>	Array of fields
 */
function fillArrayOfFilterFields($object, $tablealias, $labelofobject, &$arrayoffields, $level = 0, &$count = 0, &$tablepath = '')
{
}