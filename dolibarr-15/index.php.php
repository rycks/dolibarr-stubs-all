<?php

/* Copyright (C) 2001-2004	Rodolphe Quiedeville	<rodolphe@quiedeville.org>
 * Copyright (C) 2004-2020	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2005-2017	Regis Houssin			<regis.houssin@inodbox.com>
 * Copyright (C) 2011-2012	Juanjo Menent			<jmenent@2byte.es>
 * Copyright (C) 2015		Marcos García			<marcosgdf@gmail.com>
 * Copyright (C) 2021		Frédéric France			<frederic.france@netlogic.fr>
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
 *	\file       htdocs/index.php
 *	\brief      Dolibarr home page
 */
\define('CSRFCHECK_WITH_TOKEN', 1);
/**
 *  Show weather logo. Logo to show depends on $totallate and values for
 *  $conf->global->MAIN_METEO_LEVELx
 *
 *  @param      int     $totallate      Nb of element late
 *  @param      string  $text           Text to show on logo
 *  @param      string  $options        More parameters on img tag
 *  @param      string  $morecss        More CSS
 *  @return     string                  Return img tag of weather
 */
function showWeather($totallate, $text, $options, $morecss = '')
{
}
/**
 *  get weather level
 *  $conf->global->MAIN_METEO_LEVELx
 *
 *  @param      int     $totallate      Nb of element late
 *  @return     stdClass                Return img tag of weather
 */
function getWeatherStatus($totallate)
{
}