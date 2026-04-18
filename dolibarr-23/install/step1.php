<?php

/* Copyright (C) 2004-2007  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2016  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2004       Benoit Mortier          <benoit.mortier@opensides.be>
 * Copyright (C) 2004       Sebastien Di Cintio     <sdicintio@ressource-toi.org>
 * Copyright (C) 2005-2011  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2015-2016  Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2024-2025	MDW						<mdeweerd@users.noreply.github.com>
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
 */
/**
 *		\file       htdocs/install/step1.php
 *		\ingroup	install
 *		\brief      Build conf file on disk
 */
\define('DONOTLOADCONF', 1);
$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : (empty($argv[1]) ? '' : $argv[1]);
$setuplang = \GETPOST('selectlang', 'aZ09', 3) ? \GETPOST('selectlang', 'aZ09', 3) : (empty($argv[2]) ? 'auto' : $argv[2]);
// Dolibarr pages directory
$main_dir = \GETPOST('main_dir') ? \GETPOST('main_dir') : (empty($argv[3]) ? '' : $argv[3]);
// Directory for generated documents (invoices, orders, ecm, etc...)
$main_data_dir = \GETPOST('main_data_dir') ? \GETPOST('main_data_dir') : (empty($argv[4]) ? $main_dir . '/documents' : $argv[4]);
// Dolibarr root URL
$main_url = \GETPOST('main_url') ? \GETPOST('main_url') : (empty($argv[5]) ? '' : $argv[5]);
// Database login information
$userroot = \GETPOST('db_user_root', 'alpha') ? \GETPOST('db_user_root', 'alpha') : (empty($argv[6]) ? '' : $argv[6]);
$passroot = \GETPOST('db_pass_root', 'password') ? \GETPOST('db_pass_root', 'password') : (empty($argv[7]) ? '' : $argv[7]);
// Database server
$db_type = \GETPOST('db_type', 'aZ09') ? \GETPOST('db_type', 'aZ09') : (empty($argv[8]) ? '' : $argv[8]);
$db_host = \GETPOST('db_host', 'alpha') ? \GETPOST('db_host', 'alpha') : (empty($argv[9]) ? '' : $argv[9]);
$db_name = \GETPOST('db_name', 'aZ09') ? \GETPOST('db_name', 'aZ09') : (empty($argv[10]) ? '' : $argv[10]);
$db_user = \GETPOST('db_user', 'alpha') ? \GETPOST('db_user', 'alpha') : (empty($argv[11]) ? '' : $argv[11]);
$db_pass = \GETPOST('db_pass', 'password') ? \GETPOST('db_pass', 'password') : (empty($argv[12]) ? '' : $argv[12]);
$db_port = \GETPOSTINT('db_port') ? \GETPOSTINT('db_port') : (empty($argv[13]) ? '' : $argv[13]);
$db_prefix = \GETPOST('db_prefix', 'aZ09') ? \GETPOST('db_prefix', 'aZ09') : (empty($argv[14]) ? '' : $argv[14]);
$db_create_database = \GETPOST('db_create_database', 'alpha') ? \GETPOST('db_create_database', 'alpha') : (empty($argv[15]) ? '' : $argv[15]);
$db_create_user = \GETPOST('db_create_user', 'alpha') ? \GETPOST('db_create_user', 'alpha') : (empty($argv[16]) ? '' : $argv[16]);
// Force https
$main_force_https = \GETPOST("main_force_https", 'alpha') && (\GETPOST("main_force_https", 'alpha') == "on" || \GETPOST("main_force_https", 'alpha') == 1) ? '1' : '0';
// Use alternative directory
$main_use_alt_dir = \GETPOST("main_use_alt_dir", 'alpha') == '' || (\GETPOST("main_use_alt_dir", 'alpha') == "on" || \GETPOST("main_use_alt_dir", 'alpha') == 1) ? '' : '//';
// Alternative root directory name
$main_alt_dir_name = \GETPOST("main_alt_dir_name", 'alpha') && \GETPOST("main_alt_dir_name", 'alpha') != '' ? \GETPOST("main_alt_dir_name", 'alpha') : 'custom';
$dolibarr_main_distrib = 'standard';
//$_SESSION['dol_save_passroot']=$passroot;
// Now we load forced values from install.forced.php file.
$useforcedwizard = \false;
$forcedfile = "./install.forced.php";
$useforcedwizard = \true;
$error = 0;
// Check parameters
$is_sqlite = \false;
$main_dir = \dol_sanitizePathName($main_dir);
$main_data_dir = \dol_sanitizePathName($main_data_dir);
$result = @(include_once $main_dir . "/core/db/" . $db_type . '.class.php');
$db_character_set = $defaultCharacterSet;
$db_collation = $defaultDBSortingCollation;
// Table prefix
$main_db_prefix = !empty($db_prefix) ? $db_prefix : 'llx_';
$ret = 0;
/**
 *  Create main file. No particular permissions are set by installer.
 *
 *  @param  string		$mainfile       Full path name of main file to generate/update
 *  @param	string		$main_dir		Full path name to main.inc.php file
 *  @return	void
 */
function write_main_file($mainfile, $main_dir)
{
}
/**
 *  Create master file. No particular permissions are set by installer.
 *
 *  @param  string		$masterfile     Full path name of master file to generate/update
 *  @param	string		$main_dir		Full path name to master.inc.php file
 *  @return	void
 */
function write_master_file($masterfile, $main_dir)
{
}
/**
 *  Save configuration file. No particular permissions are set by installer.
 *
 *  @param  string		$conffile        Path to conf file to generate/update
 *  @return	integer
 */
function write_conf_file($conffile)
{
}