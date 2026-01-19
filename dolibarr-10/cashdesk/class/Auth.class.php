<?php

/* Copyright (C) 2007-2008 Jeremie Ollivier      <jeremie.o@laposte.net>
 * Copyright (C) 2008-2011 Laurent Destailleur   <eldy@uers.sourceforge.net>
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
 */
/**
 * Class ot manage authentication for pos module (cashdesk)
 */
class Auth
{
    protected $db;
    private $login;
    private $passwd;
    private $reponse;
    public $sqlQuery;
    /**
     * Enter description here ...
     *
     * @param	DoliDB	$db			Database handler
     * @return	void
     */
    public function __construct($db)
    {
    }
    /**
     * Enter description here ...
     *
     * @param 	string	$aLogin		Login
     * @return	void
     */
    public function login($aLogin)
    {
    }
    /**
     * Enter description here ...
     *
     * @param 	string	$aPasswd	Password
     * @return	void
     */
    public function passwd($aPasswd)
    {
    }
    /**
     * Enter description here ...
     *
     * @param 	string 	$aReponse	Response
     * @return	void
     */
    public function reponse($aReponse)
    {
    }
    /**
     * Validate login/pass
     *
     * @param	string	$aLogin		Login
     * @param	string	$aPasswd	Password
     * @return	int					0 or 1
     */
    public function verif($aLogin, $aPasswd)
    {
    }
}