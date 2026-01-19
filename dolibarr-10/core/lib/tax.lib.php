<?php

/* Copyright (C) 2004-2009 Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2006-2007 Yannick Warnier		<ywarnier@beeznest.org>
 * Copyright (C) 2011	   Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2012-2017 Juanjo Menent		<jmenent@2byte.es>
 * Copyright (C) 2012      Cédric Salvador      <csalvador@gpcsolutions.fr>
 * Copyright (C) 2012-2014 Raphaël Doursenaud   <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2015      Marcos García        <marcosgdf@gmail.com>
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
 */
/**
 *      \file       htdocs/core/lib/tax.lib.php
 *      \ingroup    tax
 *      \brief      Library for tax module
 */
/**
 * Prepare array with list of tabs
 *
 * @param   ChargeSociales	$object		Object related to tabs
 * @return  array						Array of tabs to show
 */
function tax_prepare_head(\ChargeSociales $object)
{
}
/**
 *  Look for collectable VAT clients in the chosen year (and month)
 *
 *  @param	string	$type          	Tax type, either 'vat', 'localtax1' or 'localtax2'
 *  @param	DoliDB	$db          	Database handle
 *  @param  int		$y           	Year
 *  @param  string	$date_start  	Start date
 *  @param  string	$date_end    	End date
 *  @param  int		$modetax     	Not used
 *  @param  string	$direction   	'sell' or 'buy'
 *  @param  int		$m				Month
 *  @param  int		$q           	Quarter
 *  @return array|int               Array with details of VATs (per third parties), -1 if no accountancy module, -2 if not yet developped, -3 if error
 */
function tax_by_thirdparty($type, $db, $y, $date_start, $date_end, $modetax, $direction, $m = 0, $q = 0)
{
}
/**
 *  Gets Tax to collect for the given year (and given quarter or month)
 *  The function gets the Tax in split results, as the Tax declaration asks
 *  to report the amounts for different Tax rates as different lines.
 *
 *  @param	string	$type          	Tax type, either 'vat', 'localtax1' or 'localtax2'
 *  @param	DoliDB	$db          	Database handler object
 *  @param  int		$y           	Year
 *  @param  int		$q           	Quarter
 *  @param  string	$date_start  	Start date
 *  @param  string	$date_end    	End date
 *  @param  int		$modetax     	Not used
 *  @param  int		$direction   	'sell' (customer invoice) or 'buy' (supplier invoices)
 *  @param  int		$m           	Month
 *  @return array|int               Array with details of VATs (per rate), -1 if no accountancy module, -2 if not yet developped, -3 if error
 */
function tax_by_rate($type, $db, $y, $q, $date_start, $date_end, $modetax, $direction, $m = 0)
{
}