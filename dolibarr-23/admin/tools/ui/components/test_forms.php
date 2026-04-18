<?php

/* Copyright (C) 2024       Frédéric France         <frederic.france@free.fr>
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
\define("NOCSRFCHECK", 1);
$form = new \Form($db);
$offsettz = (empty($_SESSION['dol_tz']) ? 0 : $_SESSION['dol_tz']) * 60 * 60;
$offsetdst = (empty($_SESSION['dol_dst']) ? 0 : $_SESSION['dol_dst']) * 60 * 60;
$array = array(1 => 'Value 1', 2 => 'Value 2', 3 => 'Value 3 with a very long text. aze eazeae e ae aeae a e a ea ea ea e a e aea e ae aeaeaeaze.');
$selected = 3;
$array = array(1 => 'Value 1', 2 => 'Value 2', 3 => 'Value 3');
$selected = 3;
$array = array(1 => 'Value 1', 2 => 'Value 2', 3 => 'Value 3');
$selected = -1;
$array = array(1 => 'Value 1', 2 => 'Value 2', 3 => 'Value 3');
$arrayselected = array(1, 3);