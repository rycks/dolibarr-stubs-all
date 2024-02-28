<?php

/* Copyright (C) 2009-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
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
 *  \file		htdocs/core/class/dolgeoip.class.php
 * 	\ingroup	geoip
 *  \brief		File of class to manage module geoip
 */
/**
 * 		\class      DolGeoIP
 *      \brief      Classe to manage GeoIP
 *      			Usage:
 *					$geoip=new GeoIP('country',$datfile);
 *					$geoip->getCountryCodeFromIP($ip);
 *					$geoip->close();
 */
class DolGeoIP
{
    public $gi;
    /**
     * Constructor
     *
     * @param 	string	$type		'country' or 'city'
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
     * Return verion of data file
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