<?php

/* Copyright (C) 2013-2018	Jean-François FERRY	<hello@librethic.io>
 * Copyright (C) 2016		Christophe Battarel	<christophe@altairis.fr>
 * Copyright (C) 2019-2024  Frédéric France     <frederic.france@free.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
/**
 * \file       core/lib/ticket.lib.php
 * \ingroup    ticket
 * \brief      This file is a library for Ticket module
 */
/**
 * Build tabs for admin page
 *
 * @return array<array{0:string,1:string,2:string}>
 */
function ticketAdminPrepareHead()
{
}
/**
 *  Build tabs for a Ticket object
 *
 *  @param	Ticket	  $object		Object Ticket
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function ticket_prepare_head($object)
{
}
/**
 * Return string with full Url. The file qualified is the one defined by relative path in $object->last_main_doc
 *
 * @param   Object	$object				Object
 * @return	string						Url string
 */
function showDirectPublicLink($object)
{
}
/**
 *  Generate a random id
 *
 *  @param  int 	$car 	Length of string to generate key
 *  @return string
 */
function generate_random_id($car = 16)
{
}
/**
 * Show http header, open body tag and show HTML header banner for public pages for tickets
 *
 * @param  string		$title       Title
 * @param  string		$head        Head array
 * @param  int<0,1>		$disablejs   More content into html header
 * @param  int<0,1>		$disablehead More content into html header
 * @param  string[]		$arrayofjs   Array of complementary js files
 * @param  string[]		$arrayofcss  Array of complementary css files
 * @return void
 */
function llxHeaderTicket($title, $head = "", $disablejs = 0, $disablehead = 0, $arrayofjs = [], $arrayofcss = [])
{
}