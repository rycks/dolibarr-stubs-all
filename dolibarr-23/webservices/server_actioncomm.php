<?php

\define('NOCSRFCHECK', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define("NOLOGIN", '1');
\define("NOSESSION", '1');
/**
 * Get ActionComm
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}	$authentication		Array of authentication information
 * @param	int			$id					Id of object
 * @return	mixed
 */
function getActionComm($authentication, $id)
{
}
/**
 * Get getListActionCommType
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @return	mixed
 */
function getListActionCommType($authentication)
{
}
/**
 * Create ActionComm
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,type_id:string,type_code:string,type:string,label:string,datep:int,datef:int,datec:int,datem:int,note:string,percentage:string,author:string,usermod:string,userownerid:string,priority:string,fulldayevent:string,location:string,socid:string,contactid:string,projectid:string,fk_element:string,elementtype:string}	$actioncomm		    $actioncomm
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function createActionComm($authentication, $actioncomm)
{
}
/**
 * Create ActionComm
 *
 * @param	array{login:string,password:string,entity:?int,dolibarrkey:string}		$authentication		Array of authentication information
 * @param	array{id:string,ref:string,ref_ext:string,type_id:string,type_code:string,type:string,label:string,datep:int,datef:int,datec:int,datem:int,note:string,percentage:string,author:string,usermod:string,userownerid:string,priority:string,fulldayevent:string,location:string,socid:string,contactid:string,projectid:string,fk_element:string,elementtype:string}	$actioncomm		    $actioncomm
 * @return array{result:array{result_code:string,result_label:string}} Array result
 */
function updateActionComm($authentication, $actioncomm)
{
}