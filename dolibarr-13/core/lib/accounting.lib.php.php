<?php

/* Copyright (C) 2013-2014	Olivier Geffroy		<jeff@jeffinfo.com>
 * Copyright (C) 2013-2021	Alexandre Spangaro	<aspangaro@open-dsi.fr>
 * Copyright (C) 2014		Florian Henry		<florian.henry@open-concept.pro>
 * Copyright (C) 2019		Eric Seigne			<eric.seigne@cap-rel.fr>
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
 * 	\file		htdocs/core/lib/accounting.lib.php
 * 	\ingroup	Accountancy (Double entries)
 * 	\brief		Library of accountancy functions
 */
/**
 *	Check if a value is empty with some options
 *
 * @author	Michael - https://www.php.net/manual/fr/function.empty.php#90767
 * @param	mixed		$var			Value to test
 * @param	int|null	$allow_false 	Setting this to true will make the function consider a boolean value of false as NOT empty. This parameter is false by default.
 * @param	int|null	$allow_ws 		Setting this to true will make the function consider a string with nothing but white space as NOT empty. This parameter is false by default.
 * @return	boolean				  		True of False
 */
function is_empty($var, $allow_false = \false, $allow_ws = \false)
{
}
/**
 *	Prepare array with list of tabs
 *
 *	@param	AccountingAccount	$object		Accounting account
 *	@return	array				Array of tabs to show
 */
function accounting_prepare_head(\AccountingAccount $object)
{
}
/**
 * Return accounting account without zero on the right
 *
 * @param 	string	$account		Accounting account
 * @return	string          		String without zero on the right
 */
function clean_account($account)
{
}
/**
 * Return General accounting account with defined length (used for product and miscellaneous)
 *
 * @param 	string	$account		General accounting account
 * @return	string          		String with defined length
 */
function length_accountg($account)
{
}
/**
 * Return Auxiliary accounting account of thirdparties with defined length
 *
 * @param 	string	$accounta		Auxiliary accounting account
 * @return	string          		String with defined length
 */
function length_accounta($accounta)
{
}
/**
 *	Show header of a page used to transfer/dispatch data in accounting
 *
 *	@param	string				$nom            Name of report
 *	@param 	string				$variante       Link for alternate report
 *	@param 	string				$period         Period of report
 *	@param 	string				$periodlink     Link to switch period
 *	@param 	string				$description    Description
 *	@param 	integer	            $builddate      Date of generation
 *	@param 	string				$exportlink     Link for export or ''
 *	@param	array				$moreparam		Array with list of params to add into form
 *	@param	string				$calcmode		Calculation mode
 *  @param  string              $varlink        Add a variable into the address of the page
 *	@return	void
 */
function journalHead($nom, $variante, $period, $periodlink, $description, $builddate, $exportlink = '', $moreparam = array(), $calcmode = '', $varlink = '')
{
}
/**
 * Return Default dates for transfer based on periodicity option in accountancy setup
 *
 * @return	array		Dates of periodicity by default
 */
function getDefaultDatesForTransfer()
{
}