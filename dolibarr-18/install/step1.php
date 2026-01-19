<?php

/* Copyright (C) 2004-2007  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2016  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2004       Benoit Mortier          <benoit.mortier@opensides.be>
 * Copyright (C) 2004       Sebastien Di Cintio     <sdicintio@ressource-toi.org>
 * Copyright (C) 2005-2011  Regis Houssin           <regis.houssin@inodbox.com>
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
 */
/**
 *		\file       htdocs/install/step1.php
 *		\ingroup	install
 *		\brief      Build conf file on disk
 */
\define('DONOTLOADCONF', 1);
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