<?php

/* Copyright (C) 2006-2010 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
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
 * \file       htdocs/core/lib/propal.lib.php
 * \brief      Ensemble de functions de base pour le module propal
 * \ingroup    propal
 */
/**
 * Prepare array with list of tabs
 *
 * @param   object	$object		Object related to tabs
 * @return  array				Array of tabs to show
 */
function propal_prepare_head($object)
{
}
/**
 *  Return array head with list of tabs to view object information.
 *
 *  @return	array   	        head array with tabs
 */
function propal_admin_prepare_head()
{
}
/**
 * Return a HTML table that contains a pie chart of customer proposals
 *
 * @param	int		$socid		(Optional) Show only results from the customer with this id
 * @return	string				A HTML table that contains a pie chart of customer invoices
 */
function getCustomerProposalPieChart($socid = 0)
{
}