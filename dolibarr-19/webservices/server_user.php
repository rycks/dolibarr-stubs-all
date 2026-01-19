<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Get produt or service
 *
 * @param	array		$authentication		Array of authentication information
 * @param	int			$id					Id of object
 * @param	string		$ref				Ref of object
 * @param	string		$ref_ext			Ref external of object
 * @return	mixed
 */
function getUser($authentication, $id, $ref = '', $ref_ext = '')
{
}
/**
 * getListOfGroups
 *
 * @param	array		$authentication		Array of authentication information
 * @return	array							Array result
 */
function getListOfGroups($authentication)
{
}
/**
 * Create an external user with thirdparty and contact
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$thirdpartywithuser Datas
 * @return	mixed
 */
function createUserFromThirdparty($authentication, $thirdpartywithuser)
{
}
/**
 * Set password of an user
 *
 * @param	array		$authentication		Array of authentication information
 * @param	array		$shortuser			Array of login/password info
 * @return	mixed
 */
function setUserPassword($authentication, $shortuser)
{
}