<?php

/* Copyright (C) 2010 Laurent Destailleur         <eldy@users.sourceforge.net>
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
 *	\file			htdocs/core/class/google.class.php
 *	\brief			A set of functions for using Google APIs
 */
/**
 * Class to manage Google API
 */
class GoogleAPI
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $key;
    /**
     * Constructor
     *
     * @param 	DoliDB		$db			Database handler
     * @param	string		$key		Google key
     */
    public function __construct($db, $key)
    {
    }
    /**
     *  Return geo coordinates of an address
     *
     *  @param	string	$address	Address
     * 								Example: 68 Grande rue Charles de Gaulle,+94130,+Nogent sur Marne,+France
     *								Example: 188, rue de Fontenay,+94300,+Vincennes,+France
     *	@return	string				Coordinates
     */
    public function getGeoCoordinatesOfAddress($address)
    {
    }
}