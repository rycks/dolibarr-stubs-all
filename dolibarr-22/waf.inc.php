<?php

/* Copyright (C) 2004-2025  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2025       Frédéric France         <frederic.france@free.fr>
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
 *	\file       htdocs/waf.inc.php
 *	\ingroup	core
 *	\brief      File with WAF controls
 *				WARNING: This file must have absolutely no dependency with any other code.
 *				It should be usable in any project.
 */
// To disable the WAF for GET and POST and PHP_SELF, uncomment this
//define('NOSCANPHPSELFFORINJECTION', 1);
//define('NOSCANGETFORINJECTION', 1);
//define('NOSCANPOSTFORINJECTION', 1 or array('param1', 'param2'...));
//define('NOSCANAUDIOFORINJECTION', 1);
//define('NOSCANIFRAMEFORINJECTION', 1);
//define('NOSCANOBJECTFORINJECTION', 1);
/**
 * Return array of Emojis. We can't move this function inside a common lib because we need it for security before loading any file.
 *
 * @return 	array<string,array<string>>			Array of Emojis in hexadecimal
 * @see getArrayOfEmojiBis()
 */
function getArrayOfEmoji()
{
}
/**
 * Return the real char for a numeric entities.
 * WARNING: This function is required by testSqlAndScriptInject() and the GETPOST 'restricthtml'. Regex calling must be similar.
 *
 * @param	array<int,string>	$matches			Array with a decimal numeric entity like '&#x2f;' into key 0, value without the &# like 'x2f;' into the key 1
 * @return	string									New value
 */
function realCharForNumericEntities($matches)
{
}
/**
 * Security: WAF layer for SQL Injection and XSS Injection (scripts) protection (Filters on GET, POST, SERVER['PHP_SELF']).
 * Warning: Such a protection seems enough for SERVER['PHP_SELF'] but can't be enough for GET and POST. It is not reliable as it will always be possible
 * to bypass this. Good protection can only be guaranteed by escaping data during output.
 *
 * @param		string		$val		Brute value found into $_GET, $_POST or PHP_SELF
 * @param		int<0, 3>	$type		0=POST, 1=GET, 2=PHP_SELF, 3=GET without sql reserved keywords (the less tolerant test)
 * @return		int						>0 if there is an injection, 0 if none
 */
function testSqlAndScriptInject($val, $type)
{
}
/**
 * Return true if security check on parameters are OK, false otherwise.
 *
 * @param		string|array<int|string,string>	$var		Variable name
 * @param		int<0,3>		$type		0=POST, 1=GET, 2=PHP_SELF, 3=GET without sql reserved keywords (the less tolerant test)
 * @param		int<0,1>		$stopcode	0=No stop code, 1=Stop code (default) if injection found
 * @return		boolean						True if there is no injection.
 */
function analyseVarsForSqlAndScriptsInjection(&$var, $type, $stopcode = 1)
{
}