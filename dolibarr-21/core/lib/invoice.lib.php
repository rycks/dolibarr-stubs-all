<?php

/* Copyright (C) 2005-2012	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012	Regis Houssin			<regis.houssin@inodbox.com>
 * Copyright (C) 2013		Florian Henry			<florian.henry@open-concept.pro>
 * Copyright (C) 2015       Juanjo Menent			<jmenent@2byte.es>
 * Copyright (C) 2017      	Charlie Benke			<charlie@patas-monkey.com>
 * Copyright (C) 2017       ATM-CONSULTING			<contact@atm-consulting.fr>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
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
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function facture_prepare_head($object)
{
}
/**
 * Return array head with list of tabs to view object information.
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function invoice_admin_prepare_head()
{
}
/**
 * Return array head with list of tabs to view object information.
 *
 * @param   FactureRec  $object     Invoice model object
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function invoice_rec_prepare_head($object)
{
}
/**
 * Return array head with list of tabs to view object information.
 *
 * @param   Facture|FactureFournisseurRec     $object     Invoice object
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function supplier_invoice_rec_prepare_head($object)
{
}
/**
 * Return an HTML table that contains a pie chart of the number of customers or supplier invoices
 *
 * @param 	string 	$mode 		Can be 'customers' or 'suppliers'
 * @return 	string 				A HTML table that contains a pie chart of customers or supplier invoices
 */
function getNumberInvoicesPieChart($mode)
{
}
/**
 * Return a HTML table that contains a list with customer invoice drafts
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the customer with this id
 * @return	string				A HTML table that contains a list with customer invoice drafts
 */
function getCustomerInvoiceDraftTable($maxCount = 500, $socid = 0)
{
}
/**
 * Return a HTML table that contains a list with customer invoice drafts
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the customer with this id
 * @return	string				A HTML table that contains a list with customer invoice drafts
 */
function getDraftSupplierTable($maxCount = 500, $socid = 0)
{
}
/**
 * Return a HTML table that contains a list with latest edited customer invoices
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the customer with this id
 * @return	string				A HTML table that contains a list with latest edited customer invoices
 */
function getCustomerInvoiceLatestEditTable($maxCount = 5, $socid = 0)
{
}
/**
 * Return a HTML table that contains a list with latest edited supplier invoices
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the supplier with this id
 * @return	string				A HTML table that contains a list with latest edited supplier invoices
 */
function getPurchaseInvoiceLatestEditTable($maxCount = 5, $socid = 0)
{
}
/**
 * Return a HTML table that contains of unpaid customers invoices
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the supplier with this id
 * @return	string				A HTML table that contains a list with open (unpaid) supplier invoices
 */
function getCustomerInvoiceUnpaidOpenTable($maxCount = 500, $socid = 0)
{
}
/**
 * Return a HTML table that contains of unpaid purchase invoices
 *
 * @param	int		$maxCount	(Optional) The maximum count of elements inside the table
 * @param	int		$socid		(Optional) Show only results from the supplier with this id
 * @return	string				A HTML table that contains a list with open (unpaid) supplier invoices
 */
function getPurchaseInvoiceUnpaidOpenTable($maxCount = 500, $socid = 0)
{
}