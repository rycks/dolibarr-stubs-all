<?php

/* Copyright (C) 2004-2013 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2013      Juanjo Menent 		<jmenent@2byte.es>
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
 */
/**
 *	    \file       htdocs/admin/security_headers_http.php
 *      \ingroup    core
 *      \brief      Security options setup
 */
// We force the CSP to none on thispage, so if we make an error, we can still have access to fix it
\define('MAIN_SECURITY_FORCECSP', '*');
/**
 * Function to fix a bad security CSP string
 *
 * @param string $securitycsp	Value of Content-Security-Policy to check and sanitize
 * @return string				New value
 */
function cleanSecurityCSP($securitycsp)
{
}