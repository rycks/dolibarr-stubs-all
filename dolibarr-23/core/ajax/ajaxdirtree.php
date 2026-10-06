<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
/**
 * treeOutputForAbsoluteDir
 *
 * @param	array<int,array{id:int,id_mere:int,fulllabel:string,fullpath:string,fullrelativename:string,label:string,description:string,cachenbofdoc:int,date_c:int,fk_user_c:int,statut_c:int,login_c:string,id_children?:int[],level:int}>	$sqltree				Sqltree
 * @param	string	$selecteddir			Selected dir
 * @param	string	$fullpathselecteddir	Full path of selected dir
 * @param	string	$modulepart				Modulepart
 * @param	string	$websitekey				Website key
 * @param	int		$pageid					Page id
 * @param	string	$preopened				Current open dir
 * @param	string	$fullpathpreopened		Full path of current open dir
 * @param	int		$depth					Depth
 * @return	void
 */
function treeOutputForAbsoluteDir($sqltree, $selecteddir, $fullpathselecteddir, $modulepart, $websitekey, $pageid, $preopened, $fullpathpreopened, $depth = 0)
{
}