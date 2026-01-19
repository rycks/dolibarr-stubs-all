<?php

/* Copyright (C) 2010 Laurent Destailleur         <eldy@users.sourceforge.net>
 * Copyright (C) 2024 Mikko Virtanen
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
 *	\file			htdocs/core/lib/functions_fi.lib.php
 *	\brief			A set of finish functions for Dolibarr
 *					This file contains rare functions.
 */
/**
 * Calculate Creditor Reference RF / FI Bank payment reference number
 *
 * @param 	string	$invoice_number	    Invoice number to generate payment reference
 * @param 	int     $statut             Invoice status, if draft (0), no reference generating
 * @param   string  $use_rf             false/(0) generate FI Bank payment reference
 *                                      true/(1) Generate European Reference number based on the global
 *                                      Structured Creditor Reference standard (SEPA RF creditor reference)
 * @return 	string                      String Payment reference number or RF creditor reference
 */
function dolFICalculatePaymentReference($invoice_number, $statut, $use_rf)
{
}
/**
 * Calculate payment Barcode data with FI/RF bank payment reference number
 *
 * @param 	string $recipient_account	Account number for pank payment
 * @param 	string $amount				Amount of invoice payment
 * @param 	string $bank_reference		FI Payment reference number or RF creditor reference
 * @param 	string $due_date			Payments due to date
 * @return 	string String              	String for FI/RF Payment barcode
 */
function dolFIGenerateInvoiceBarcodeData($recipient_account, $amount, $bank_reference, $due_date)
{
}