<?php

/* Copyright (C) 2008-2009 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2007 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 *	\file			htdocs/paybox/lib/paybox.lib.php
 *	\ingroup		paybox
 *  \brief			Library for common paybox functions
 */
/**
 * Create a redirect form to paybox form
 *
 * @param	int   	$PRICE		Price
 * @param   string	$CURRENCY	Currency
 * @param   string	$EMAIL		EMail
 * @param   string	$urlok		Url to go back if payment is OK
 * @param   string	$urlko		Url to go back if payment is KO
 * @param   string	$TAG		Full tag
 * @return  int              	1 if OK, -1 if ERROR
 */
function print_paybox_redirect($PRICE, $CURRENCY, $EMAIL, $urlok, $urlko, $TAG)
{
}