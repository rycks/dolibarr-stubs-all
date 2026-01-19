<?php

/* Copyright (C) 2000-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2003      Jean-Louis Bergamo   <jlb@j1b.org>
 * Copyright (C) 2004-2009 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2009 Regis Houssin        <regis.houssin@inodbox.com>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * or see http://www.gnu.org/
 */
/**
 *      \file       htdocs/core/class/antivir.class.php
 *      \brief      File of class to scan viruses
 *      \author	    Laurent Destailleur.
 */
/**
 *      Class to scan for virus
 */
class AntiVir
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var string Used to return message
     */
    public $output;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Scan a file with antivirus.
     *  This function runs the command defined in setup. This antivirus command must return 0 if OK.
     *  Return also true (virus found) if file end with '.virus' (so we can make test safely).
     *
     *	@param	string	$file		File to scan
     *	@return	int					<0 if KO (-98 if error, -99 if virus), 0 if OK
     */
    public function dol_avscan_file($file)
    {
    }
    /**
     *	Get full Command Line to run
     *
     *	@param	string	$file		File to scan
     *	@return	string				Full command line to run
     */
    public function getCliCommand($file)
    {
    }
}