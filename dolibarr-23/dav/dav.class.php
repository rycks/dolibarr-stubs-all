<?php

/* Copyright (C) 2018	Destailleur Laurent	<eldy@users.sourceforge.net>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
 * Copyright (C) 2025		MDW							<mdeweerd@users.noreply.github.com>
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
 *      \file       htdocs/dav/dav.class.php
 *      \ingroup    dav
 *      \brief      Server DAV
 */
/**
 * Define Common function to access calendar items and format it in vCalendar
 */
class CdavLib
{
    /**
     * @var DoliDB
     */
    private $db;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Translate
     */
    private $langs;
    // @phpstan-ignore-line
    /**
     * Constructor
     *
     * @param   User        $user   user
     * @param   DoliDB      $db     Database handler
     * @param   Translate   $langs  translation
     */
    public function __construct($user, $db, $langs)
    {
    }
    /**
     * Base sql request for calendar events
     *
     * @param 	int 		$calid 			Calendar id
     * @param 	int|bool	$oid			Oid
     * @param	int|bool	$ouri			Ouri
     * @return string
     */
    public function getSqlCalEvents($calid, $oid = \false, $ouri = \false)
    {
    }
    /**
     * Convert calendar row to VCalendar string
     *
     * @param 	int		$calid		Calendar id
     * @param	Object	$obj		Object id
     * @return string
     */
    public function toVCalendar($calid, $obj)
    {
    }
    /**
     * getFullCalendarObjects
     *
     * @param int	 	$calendarId			Calendar id
     * @param int		$bCalendarData		Add calendar data
     * @return array|string[][]
     */
    public function getFullCalendarObjects($calendarId, $bCalendarData)
    {
    }
}