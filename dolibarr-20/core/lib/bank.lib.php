<?php

/* Copyright (C) 2006-2016	Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2012		Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2015		Alexandre Spangaro	<aspangaro@open-dsi.fr>
 * Copyright (C) 2016		Juanjo Menent   	<jmenent@2byte.es>
 * Copyright (C) 2019	    Nicolas ZABOURI     <info@inovea-conseil.com>
 * Copyright (C) 2021		Ferran Marcet		<fmarcet@2byte.es>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
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
 * \file       htdocs/core/lib/bank.lib.php
 * \ingroup    bank
 * \brief      Ensemble de functions de base pour le module banque
 */
/**
 * Prepare array with list of tabs
 *
 * @param   Account	$object		Object related to tabs
 * @return  array				Array of tabs to show
 */
function bank_prepare_head(\Account $object)
{
}
/**
 * Prepare array with list of tabs
 *
 * @param   Object	$object		Object related to tabs
 * @return  array				Array of tabs to shoc
 */
function bank_admin_prepare_head($object)
{
}
/**
 * Prepare array with list of tabs
 *
 * @param   Object	$object		Object related to tabs
 * @param   string	$num		val to account statement
 * @return  array				Array of tabs to shoc
 */
function account_statement_prepare_head($object, $num)
{
}
/**
 * Prepare array with list of tabs
 *
 * @param   CommonObject	$object		Object related to tabs
 * @return  array						Array of tabs to shoc
 */
function various_payment_prepare_head($object)
{
}
/**
 *      Check SWIFT information for a bank account
 *
 *      @param  ?Account	$account    A bank account (used to get BIC/SWIFT)
 *      @param	?string		$swift		Swift value (used to get BIC/SWIFT, param $account non used if provided)
 *      @return boolean                 True if information are valid, false otherwise
 */
function checkSwiftForAccount(\Account $account = \null, $swift = \null)
{
}
/**
 *      Check IBAN number information for a bank account.
 *
 *      @param  ?Account	$account    	A bank account
 *      @param	?string		$ibantocheck	Bank account number (used to get BAN, $account not used if provided)
 *      @return boolean                 	True if information are valid, false otherwise
 */
function checkIbanForAccount(\Account $account = \null, $ibantocheck = \null)
{
}
/**
 * Returns the iban human readable
 *
 * @param Account $account Account object
 * @return string
 */
function getIbanHumanReadable(\Account $account)
{
}
/**
 * 		Check account number information for a bank account
 *
 * 		@param	Account		$account    A bank account
 * 		@return boolean           		True if information are valid, false otherwise
 */
function checkBanForAccount($account)
{
}
/**
 * 	Returns the key for Spanish Banks Accounts
 *
 *  @param	string	$IentOfi	IentOfi
 *  @param	string	$InumCta	InumCta
 *  @return	string				Key
 */
function checkES($IentOfi, $InumCta)
{
}