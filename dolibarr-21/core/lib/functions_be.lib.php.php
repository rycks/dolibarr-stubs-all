<?php

/* Copyright (C) 2024		Alexandre Spangaro			<alexandre@inovea-conseil.com>
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
 *	\file			htdocs/core/lib/functions_be.lib.php
 *	\brief			A set of belgium functions for Dolibarr
 *					This file contains rare functions.
 */
/**
 * Calculate Structured Communication / BE Bank payment reference number
 *
 * @param 	string	$invoice_number	    Invoice number to generate payment reference
 * @param 	int     $invoice_type		Invoice type
 * @return 	string                      String structured communication for payment
 */
function dolBECalculateStructuredCommunication($invoice_number, $invoice_type)
{
}