<?php

/* Copyright (C) 2001-2002  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2006-2013  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2010       Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2015       Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
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
 *     	\file       htdocs/public/demo/index.php
 *		\ingroup    core
 *		\brief      Entry page to access demo
 */
\define("NOLOGIN", 1);
// This means this output page does not require to be logged.
\define("NOCSRFCHECK", 1);
/**
 * Show header for demo
 *
 * @param 	string		$title		Title
 * @param 	string		$head		Head string
 * @return	void
 */
function llxHeaderVierge($title, $head = "")
{
}
/**
 * Show footer for demo
 *
 * @return	void
 */
function llxFooterVierge()
{
}