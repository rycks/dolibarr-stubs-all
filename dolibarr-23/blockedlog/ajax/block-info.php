<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
$id = \GETPOSTINT('id');
$block = new \BlockedLog($db);
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