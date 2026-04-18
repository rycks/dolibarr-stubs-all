<?php

/* Copyright (C) 2006		Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2006-2021	Regis Houssin			<regis.houssin@inodbox.com>
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
 * \file       htdocs/core/lib/ldap.lib.php
 * \brief      Ensemble de functions de base pour le module LDAP
 * \ingroup    ldap
 */
/**
 * Initialize the array of tabs for customer invoice
 *
 * @return	array<array{0:string,1:string,2:string}>	Array of tabs to show
 */
function ldap_prepare_head()
{
}
/**
 *  Show button test LDAP synchro
 *
 *  @param	string	$butlabel		Label
 *  @param	string	$testlabel		Label
 *  @param	string	$key			Key
 *  @param	string	$dn				Dn
 *  @param	string	$objectclass	Class
 *  @return	void
 */
function show_ldap_test_button($butlabel, $testlabel, $key, $dn, $objectclass)
{
}
/**
 * Show a LDAP array into an HTML output array.
 *
 * @param	array<'count'|int|string,int|string|mixed[]>	$result	Array to show. This array is already encoded into charset_output
 * @param   int			$level		Level
 * @param   int			$count		Count
 * @param   bool		$var		Var deprecated (replaced by css oddeven)
 * @param   int<0,1>	$hide		Hide
 * @param   int			$subcount	Subcount
 * @return  int
 */
function show_ldap_content($result, $level, $count, $var, $hide = 0, $subcount = 0)
{
}