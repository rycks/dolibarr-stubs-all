<?php

/* Copyright (C) 2008-2011 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2008-2017 Regis Houssin        <regis.houssin@inodbox.com>
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
 *  \file		htdocs/core/lib/security2.lib.php
 *  \ingroup    core
 *  \brief		Set of function used for dolibarr security (not common functions).
 *  			Warning, this file must not depends on other library files, except function.lib.php
 *  			because it is used at low code level.
 */
/**
 *  Return user/group account of web server
 *
 *  @param	string	$mode       'user' or 'group'
 *  @return string				Return user or group of web server
 */
function dol_getwebuser($mode)
{
}
/**
 *  Return a login if login/pass was successfull
 *
 *	@param		string	$usertotest			Login value to test
 *	@param		string	$passwordtotest		Password value to test
 *	@param		string	$entitytotest		Instance of data we must check
 *	@param		array	$authmode			Array list of selected authentication mode array('http', 'dolibarr', 'xxx'...)
 *	@param		string	$context			Context checkLoginPassEntity was created for ('api', 'dav', 'ws', '')
 *  @return		string						Login or '' or '--bad-login-validity--'
 */
function checkLoginPassEntity($usertotest, $passwordtotest, $entitytotest, $authmode, $context = '')
{
}
/**
 * Show Dolibarr default login page.
 * Part of this code is also duplicated into main.inc.php::top_htmlhead
 *
 * @param       Translate   $langs      Lang object (must be initialized by a new).
 * @param       Conf        $conf       Conf object
 * @param       Societe     $mysoc      Company object
 * @return      void
 */
function dol_loginfunction($langs, $conf, $mysoc)
{
}
/**
 *  Fonction pour initialiser un salt pour la fonction crypt.
 *
 *  @param		int		$type		2=>renvoi un salt pour cryptage DES
 *									12=>renvoi un salt pour cryptage MD5
 *									non defini=>renvoi un salt pour cryptage par defaut
 *	@return		string				Salt string
 */
function makesalt($type = \CRYPT_SALT_LENGTH)
{
}
/**
 *  Encode or decode database password in config file
 *
 *  @param   	int		$level   	Encode level: 0 no encoding, 1 encoding
 *	@return		int					<0 if KO, >0 if OK
 */
function encodedecode_dbpassconf($level = 0)
{
}
/**
 * Return a generated password using default module
 *
 * @param		boolean		$generic				true=Create generic password (32 chars/numbers), false=Use the configured password generation module
 * @param		array		$replaceambiguouschars	Discard ambigous characters. For example array('I').
 * @param       int         $length                 Length of random string (Used only if $generic is true)
 * @return		string		    					New value for password
 * @see dol_hash(), dolJSToSetRandomPassword()
 */
function getRandomPassword($generic = \false, $replaceambiguouschars = \null, $length = 32)
{
}
/**
 * Ouput javacript to autoset a generated password using default module into a HTML element.
 *
 * @param		string 		$htmlname			HTML name of element to insert key into
 * @param		string		$htmlnameofbutton	HTML name of button
 * @param		int			$generic			1=Return a generic pass, 0=Return a pass following setup rules
 * @return		string		    				HTML javascript code to set a password
 * @see getRandomPassword()
 */
function dolJSToSetRandomPassword($htmlname, $htmlnameofbutton = 'generate_token', $generic = 1)
{
}