<?php

/* Copyright (C) 2015	ATM Consulting	<support@atm-consulting.fr>
 * Copyright (C) 2018	Regis Houssin	<regis.houssin@inodbox.com>
 * Copyright (C) 2024		MDW				<mdeweerd@users.noreply.github.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *	\file		lib/multicurrency.lib.php
 *	\ingroup	multicurency
 *	\brief		This file is an example module library
 *				Put some comments here
 */
/**
 * Prepare array with list of tabs
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function multicurrencyAdminPrepareHead()
{
}
/**
 * Prepare array with list of currency tabs
 *
 * @param	string[]	$aCurrencies	Currencies array
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function multicurrencyLimitPrepareHead($aCurrencies)
{
}