<?php

/* Copyright (C) 2009-2012  Laurent Destailleur         <eldy@users.sourceforge.net>
 * Copyright (C) 2024       Frédéric France             <frederic.france@free.fr>
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
 *  \file		htdocs/core/class/dolgeoip.class.php
 * 	\ingroup	geoip
 *  \brief		File of class to manage module geoip
 */
/**
 * 		\class      DolGeoIP
 *      \brief      Class to manage GeoIP conversion
 *      			Usage:
 *					$geoip=new GeoIP('country',$datfile);
 *					$geoip->getCountryCodeFromIP($ip);
 *					$geoip->close();
 */
class DolGeoIP
{
    /**
     * @var \GeoIp2\Database\Reader|\GeoIP|string
     */
    public $gi;
    /**
     * @var string
     */
    public $error;
    /**
     * @var string
     */
    public $errorlabel;
    /**
     * Constructor
     *
     * @param 	'country'|'city'	$type		'country' or 'city'
     * @param	string	$datfile	Data file
     */
    public function __construct($type, $datfile)
    {
    }
    /**
     * Return in lower case the country code from an ip
     *
     * @param	string	$ip		IP to scan
     * @return	string			Country code (two letters)
     */
    public function getCountryCodeFromIP($ip)
    {
    }
    /**
     * Return in lower case the country code from a host name
     *
     * @param	string	$name	FQN of host (example: myserver.xyz.com)
     * @return	string			Country code (two letters)
     */
    public function getCountryCodeFromName($name)
    {
    }
    /**
     * Return version of data file
     *
     * @return  string      Version of datafile
     */
    public function getVersion()
    {
    }
    /**
     * Close geoip object
     *
     * @return	void
     */
    public function close()
    {
    }
}