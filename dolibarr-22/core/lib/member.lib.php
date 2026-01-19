<?php

/* Copyright (C) 2006-2015	Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2015-2016	Alexandre Spangaro	<aspangaro@open-dsi.fr>
 * Copyright (C) 2015		Raphaël Doursenaud	<rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2017		Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 * \file       htdocs/core/lib/member.lib.php
 * \brief      Functions for module members
 */
/**
 *  Return array head with list of tabs to view object information
 *
 *  @param	Adherent	$object				Member
 *  @return array<int,array<int,string>>	head links
 */
function member_prepare_head(\Adherent $object)
{
}
/**
 *  Return array head with list of tabs to view object information
 *
 *  @param	AdherentType	$object         Member
 *  @return array<int,array<int,string>>	head links
 */
function member_type_prepare_head(\AdherentType $object)
{
}
/**
 *  Return array head with list of tabs to view object information
 *
 *  @return array<int,array<int,string>>	head links
 */
function member_admin_prepare_head()
{
}
/**
 *  Return array head with list of tabs to view object stats information
 *
 *  @param	Adherent	$object         Member or null
 *  @return array<int,array<int,string>>	head links
 */
function member_stats_prepare_head($object)
{
}
/**
 *  Return array head with list of tabs to view object information
 *
 *  @param	Subscription	$object		Subscription
 *  @return array<int,array<int,string>>	head links
 */
function subscription_prepare_head(\Subscription $object)
{
}