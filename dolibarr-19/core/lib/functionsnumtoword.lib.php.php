<?php

/* Copyright (C) 2015 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2015 Víctor Ortiz Pérez   <victor@accett.com.mx>
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
 *  \file			htdocs/core/lib/functionsnumtoword.lib.php
 *	\brief			A set of functions for Dolibarr
 *					This file contains all frequently used functions.
 */
/**
 * Function to return a number into a text.
 * May use module NUMBERWORDS if found.
 *
 * @param	float       $num			Number to convert (must be a numeric value, like reported by price2num())
 * @param	Translate   $langs			Language
 * @param	string      $currency		''=number to translate | 'XX'=currency code to use into text
 * @param	boolean     $centimes		false=no cents/centimes | true=there is cents/centimes
 * @return 	string|false			    Text of the number
 */
function dol_convertToWord($num, $langs, $currency = '', $centimes = \false)
{
}
/**
 * Function to return number or amount in text.
 *
 * @deprecated
 * @param	float 	    $numero			Number to convert
 * @param	Translate	$langs			Language
 * @param	string	    $numorcurrency	'number' or 'amount'
 * @return 	string|int  	       			Text of the number or -1 in case TOO LONG (more than 1000000000000.99)
 */
function dolNumberToWord($numero, $langs, $numorcurrency = 'number')
{
}
/**
 * hundreds2text
 *
 * @param integer $hundreds     Hundreds
 * @param integer $tens         Tens
 * @param integer $units        Units
 * @return string
 */
function hundreds2text($hundreds, $tens, $units)
{
}