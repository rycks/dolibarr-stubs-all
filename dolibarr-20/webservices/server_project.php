<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
// Full methods code
/**
 * Create project
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$project			Project info
 * @return	array							array of new order
 */
function createProject($authentication, $project)
{
}
/**
 * Get a project
 *
 * @param	array		$authentication		Array of authentication information
 * @param	string		$id		    		internal id
 * @param	string		$ref		    	internal reference
 * @return	array							Array result
 */
function getProject($authentication, $id = '', $ref = '')
{
}