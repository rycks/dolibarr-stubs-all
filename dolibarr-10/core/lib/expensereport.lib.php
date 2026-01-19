<?php

/* Copyright (C) 2011	Regis Houssin	<regis.houssin@inodbox.com>
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
 *	    \file       htdocs/core/lib/expensereport.lib.php
 *		\brief      Functions for module expensereport
 */
/**
 * Prepare array with list of tabs
 *
 * @param   Object	$object		Object related to tabs
 * @return  array				Array of tabs to show
 */
function expensereport_prepare_head($object)
{
}
/**
 * Returns an array with the tabs for the "Expense report payment" section
 * It loads tabs from modules looking for the entity payment
 *
 * @param	Paiement	$object		Current payment object
 * @return	array					Tabs for the payment section
 */
function payment_expensereport_prepare_head(\PaymentExpenseReport $object)
{
}
/**
 *  Return array head with list of tabs to view object informations.
 *
 *  @return	array   	        head array with tabs
 */
function expensereport_admin_prepare_head()
{
}