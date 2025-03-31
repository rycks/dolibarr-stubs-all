<?php

/* Copyright (C) 2011 		Laurent Destailleur  	<eldy@users.sourceforge.net>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024		Frédéric France			<frederic.france@free.fr>
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
 *  \file		htdocs/core/lib/ws.lib.php
 *  \ingroup	webservices
 *  \brief		Set of functions for manipulating web services
 */
/**
 *  Check authentication array and set error, errorcode, errorlabel
 *
 *  @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication     Array with authentication information ('login'=>,'password'=>,'entity'=>,'dolibarrkey'=>)
 *  @param 	int		$error				Number of errors
 *  @param  string	$errorcode			Error string code
 *  @param  string	$errorlabel			Error string label
 *  @return User						Return user object identified by login/pass/entity into authentication array
 */
function check_authentication($authentication, &$error, &$errorcode, &$errorlabel)
{
}