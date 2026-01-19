<?php

/* Copyright (C) 2007-2011 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2008-2021 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2024-2025	MDW					<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024      William Mead         <william.mead@manchenumerique.fr>
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
 *
 */
/**
 *       \file       htdocs/core/login/functions_ldap.php
 *       \ingroup    core
 *       \brief      Authentication functions for LDAP
 */
/**
 * Check validity of user/password/entity
 * If test is ko, reason must be filled into $_SESSION["dol_loginmesg"]
 *
 * @param	string	$usertotest		Login
 * @param	string	$passwordtotest	Password
 * @param   int		$entitytotest   Numero of instance (always 1 if module multicompany not enabled)
 * @return	string					Login if OK, '' if KO
 */
function check_user_password_ldap($usertotest, $passwordtotest, $entitytotest)
{
}