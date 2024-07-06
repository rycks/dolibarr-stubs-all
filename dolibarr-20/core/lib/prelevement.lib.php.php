<?php

/* Copyright (C) 2010-2011 	Juanjo Menent		<jmenent@2byte.es>
 * Copyright (C) 2010		Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2011      	Regis Houssin		<regis.houssin@inodbox.com>
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
 *	\file       htdocs/core/lib/prelevement.lib.php
 *	\brief      Ensemble de functions de base pour le module prelevement
 *	\ingroup    propal
 */
/**
 * Prepare array with list of tabs
 *
 * @param   BonPrelevement	$object		Object related to tabs
 * @return  array				Array of tabs to show
 */
function prelevement_prepare_head(\BonPrelevement $object)
{
}
/**
 *	Check need data to create standigns orders receipt file
 *
 *	@param	string	$type		'bank-transfer' or 'direct-debit'
 *
 *	@return    	int		-1 if ko 0 if ok
 */
function prelevement_check_config($type = 'direct-debit')
{
}
/**
 *  Return array head with list of tabs to view object information
 *
 *  @param	BonPrelevement	$object         	Member
 *  @param  int     		$nbOfInvoices   	No of invoices
 *  @param  int     		$nbOfSalaryInvoice  No of salary invoices
 *  @return array           					head
 */
function bon_prelevement_prepare_head(\BonPrelevement $object, $nbOfInvoices, $nbOfSalaryInvoice)
{
}