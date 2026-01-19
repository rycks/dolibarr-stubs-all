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
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,label:string,thirdparty_id:int,public:int,status:int,date_start:string,date_end:string,budget:int,description:string,elements:array<array{id:int,user:int}>}		$project			Project info
 * @return array{id?:int,ref?:string,result:array{result_code:string,result_label:string}} Array result
 */
function createProject($authentication, $project)
{
}
/**
 * Get a project
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	string		$id		    		internal id
 * @param	string		$ref		    	internal reference
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getProject($authentication, $id = '', $ref = '')
{
}