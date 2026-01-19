<?php

/* Copyright (C) 2004       Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2017  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2004       Benoit Mortier          <benoit.mortier@opensides.be>
 * Copyright (C) 2004       Sebastien DiCintio      <sdicintio@ressource-toi.org>
 * Copyright (C) 2005-2012  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2015-2016  Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2025		MDW						<mdeweerd@users.noreply.github.com>
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
 *       \file      htdocs/install/step5.php
 *       \ingroup   install
 *       \brief     Last page of upgrade / install process
 *
 *       This page is called with parameter action=set by step4.php or action=upgrade by upgrade2.php
 *       For installation:
 *         It creates the login admin and set the MAIN_SECURITY_SALT to a random value.
 *         It set the value for MAIN_VERSION_LAST_INSTALL
 *         It activates some modules
 *         It creates the install.lock and shows the final message.
 *       For upgrade:
 *         It updates the value for MAIN_VERSION_LAST_UPGRADE.
 *         It (re)creates the install.lock and shows the final message.
 */
\define('ALLOWED_IF_UPGRADE_UNLOCK_FOUND', 1);