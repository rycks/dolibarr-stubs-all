<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$id = \GETPOSTINT('id');
/**
 * formatObject
 *
 * @param 	Object|array<string,mixed>	$objtoshow		Object to show
 * @param	string	$prefix			Prefix of key
 * @return	string					String formatted
 */
function formatObject($objtoshow, $prefix)
{
}