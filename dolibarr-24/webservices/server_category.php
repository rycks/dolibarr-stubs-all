<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Get category infos and children
 *
 * @param	array{login:string,password:string,entity?:int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	int			$id					Id of object
 * @return	mixed
 */
function getCategory($authentication, $id)
{
}