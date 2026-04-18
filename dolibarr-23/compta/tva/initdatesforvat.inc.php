<?php

/* Copyright (C) 2021 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *  \file           htdocs/compta/tva/initdatesforvat.inc.php
 *  \brief          Set value for date_start and date_end
 */
/**
 * @var Conf $conf
 */
$now = \dol_now();
$current_date = \dol_getdate($now);
// Date range
$year = \GETPOSTINT("year");
$date_start = \dol_mktime(0, 0, 0, \GETPOSTINT("date_startmonth"), \GETPOSTINT("date_startday"), \GETPOSTINT("date_startyear"), 'tzserver');
$date_end = \dol_mktime(23, 59, 59, \GETPOSTINT("date_endmonth"), \GETPOSTINT("date_endday"), \GETPOSTINT("date_endyear"), 'tzserver');
// We define date_start and date_end
$q = \GETPOSTINT("q");
//print dol_print_date($date_start, 'day').' '.dol_print_date($date_end, 'day');
$tmp = \dol_getdate($date_start);
$date_start_day = $tmp['mday'];
$date_start_month = $tmp['mon'];
$date_start_year = $tmp['year'];
$tmp = \dol_getdate($date_end);
$date_end_day = $tmp['mday'];
$date_end_month = $tmp['mon'];
$date_end_year = $tmp['year'];