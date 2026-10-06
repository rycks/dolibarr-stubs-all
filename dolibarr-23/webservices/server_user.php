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
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
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
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function getListOfGroups($authentication)
{
}
/**
 * Create an external user with thirdparty and contact
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param array{name:string,firstname:string,name_thirdparty:string,ref_ext:string,client:string,fournisseur:string,address:string,zip:string,town:string,country_id:string,country_code:string,phone:string,phone_mobile:string,fax:string,email:string,url:string,profid1:string,profid2:string,profid3:string,profid4:string,profid5:string,profid6:string,capital:string,tva_assuj:string,tva_intra:string,login:string,password:string,group_id:string}		$thirdpartywithuser Datas
 * @return array{id?:int,result:array{result_code:string,result_label:string}} Array result
 */
function createUserFromThirdparty($authentication, $thirdpartywithuser)
{
}
/**
 * Set password of an user
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param	array{login:string,password:string}		$shortuser			Array of login/password info
 * @return	mixed
 */
function setUserPassword($authentication, $shortuser)
{
}