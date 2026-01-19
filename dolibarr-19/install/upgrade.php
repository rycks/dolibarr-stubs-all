<?php

/* Copyright (C) 2004       Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2018  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2010  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2015-2016  Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
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
 * Upgrade scripts can be ran from command line with syntax:
 *
 * cd htdocs/install
 * php upgrade.php 3.4.0 3.5.0 [dirmodule|ignoredbversion]
 * php upgrade2.php 3.4.0 3.5.0 [MODULE_NAME1_TO_ENABLE,MODULE_NAME2_TO_ENABLE]
 *
 * And for final step:
 * php step5.php 3.4.0 3.5.0
 *
 * Option 'dirmodule' allows to provide a path for an external module, so we migrate from command line using a script from a module.
 * Option 'ignoredbversion' allows to run migration even if database version does not match start version of migration
 * Return code is 0 if OK, >0 if error
 */
/**
 *		\file       htdocs/install/upgrade.php
 *      \brief      Run migration script
 */
\define('ALLOWED_IF_UPGRADE_UNLOCK_FOUND', 1);