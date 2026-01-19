<?php

/* Copyright (C) 2005-2012	Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012	Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2013		Florian Henry		<florian.henry@open-concept.pro>
 * Copyright (C) 2015      Juanjo Menent		<jmenent@2byte.es>
 * Copyright (C) 2017      	Charlie Benke		<charlie@patas-monkey.com>
 * Copyright (C) 2017       ATM-CONSULTING		<contact@atm-consulting.fr>
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
 *	    \file       htdocs/core/lib/invoice.lib.php
 *		\brief      Functions used by invoice module
 * 		\ingroup	invoice
 */
/**
 * Initialize the array of tabs for customer invoice
 *
 * @param	Facture		$object		Invoice object
 * @return	array					Array of head tabs
 */
function facture_prepare_head($object)
{
}
/**
 * Return array head with list of tabs to view object informations.
 *
 * @return array head array with tabs
 */
function invoice_admin_prepare_head()
{
}
/**
 * Return array head with list of tabs to view object informations.
 *
 * @param   Facture     $object     Invoice object
 * @return array                    head array with tabs
 */
function invoice_rec_prepare_head($object)
{
}