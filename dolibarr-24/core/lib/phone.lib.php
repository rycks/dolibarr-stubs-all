<?php

/* Copyright (C) 2026	Open-Dsi	<support@open-dsi.fr>
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
 * \file       htdocs/core/lib/phone.lib.php
 * \ingroup    core
 * \brief      Helper functions for phone number formatting
 */
/**
 * Parse a stored phone number into country code and number parts
 *
 * Stored format is "+{code} {number}" (e.g. "+33 644986885").
 * If no code is found, returns empty code and the full string as number.
 *
 * @param	string	$phone		Stored phone number
 * @return	array{code:string,number:string}	Array with 'code' and 'number' keys
 */
function dol_parse_phone($phone)
{
}
/**
 * Build a normalized phone string from code and number parts
 *
 * Strips formatting characters (spaces, dashes, dots, parentheses) from number.
 * Also strips the national trunk prefix for the country matching $code
 * (e.g. leading "0" for France, "8" for Russia, "06" for Hungary).
 * Returns "+{code} {number}" or just the number if code is empty.
 *
 * @param	DoliDB	$db			Database handler
 * @param	string	$code		Country calling code (e.g. "+33")
 * @param	string	$number		Phone number (may contain formatting)
 * @return	string				Normalized phone string
 */
function dol_build_phone($db, $code, $number)
{
}
/**
 * Get the national trunk prefix for a phone code
 *
 * @param	DoliDB	$db			Database handler
 * @param	string	$phone_code	Phone code (e.g. "+33")
 * @return	string				Trunk prefix (e.g. "0") or empty string
 */
function dol_get_trunk_prefix($db, $phone_code)
{
}
/**
 * Get the phone calling code for a country
 *
 * @param	DoliDB	$db				Database handler
 * @param	int		$country_id		Country rowid
 * @return	string					Phone code (e.g. "+33") or empty string
 */
function dol_get_phone_code_from_country($db, $country_id)
{
}