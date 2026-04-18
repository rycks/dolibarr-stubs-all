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
$versionfrom = \GETPOST("versionfrom", 'alpha', 3) ? \GETPOST("versionfrom", 'alpha', 3) : (empty($argv[1]) ? '' : $argv[1]);
$versionto = \GETPOST("versionto", 'alpha', 3) ? \GETPOST("versionto", 'alpha', 3) : (empty($argv[2]) ? '' : $argv[2]);
$setuplang = \GETPOST('selectlang', 'aZ09', 3) ? \GETPOST('selectlang', 'aZ09', 3) : (empty($argv[3]) ? 'auto' : $argv[3]);
$action = \GETPOST('action', 'alpha') ? \GETPOST('action', 'alpha') : (empty($argv[4]) ? '' : $argv[4]);
// Define targetversion used to update MAIN_VERSION_LAST_INSTALL for first install
// or MAIN_VERSION_LAST_UPGRADE for upgrade.
$targetversion = \DOL_VERSION;
// If it's an old upgrade
$tmp = \explode('_', $action, 2);
$login = \GETPOST('login', 'alpha') ? \GETPOST('login', 'alpha') : (empty($argv[5]) ? '' : $argv[5]);
$pass = \GETPOST('pass', 'password') ? \GETPOST('pass', 'password') : (empty($argv[6]) ? '' : $argv[6]);
$pass_verif = \GETPOST('pass_verif', 'password') ? \GETPOST('pass_verif', 'password') : (empty($argv[7]) ? '' : $argv[7]);
$success = 0;
$useforcedwizard = \false;
$forcedfile = "./install.forced.php";
$useforcedwizard = \true;
$force_install_lockinstall = (int) (!empty($force_install_lockinstall) ? $force_install_lockinstall : (\GETPOST('installlock', 'aZ09') ? \GETPOST('installlock', 'aZ09') : (empty($argv[8]) ? '' : $argv[8])));
$error = 0;
/*
 *	View
 */
$morehtml = '';
$error = 0;
$db = \getDoliDBInstance($conf->db->type, $conf->db->host, $conf->db->user, $conf->db->pass, $conf->db->name, (int) $conf->db->port);
$hookmanager = new \HookManager($db);
$ok = 0;
$ret = 0;