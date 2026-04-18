<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
// For ajax call
$res = @(include '../../main.inc.php');
$openeddir = \GETPOST('openeddir');
$modulepart = \GETPOST('modulepart');
$selecteddir = \jsUnEscape(\GETPOST('dir'));
// relative path. We must decode using same encoding function used by javascript: escape()
$preopened = \GETPOST('preopened');
$websitekey = \GETPOST('websitekey', 'alpha');
$pageid = \GETPOSTINT('pageid');
// Define fullpathselecteddir.
$fullpathselecteddir = '<none>';
$fullpathpreopened = '';
//print '<!-- selecteddir (relative dir we click on) = '.$selecteddir.', openeddir = '.$openeddir.', modulepart='.$modulepart.', preopened='.$preopened.' -->'."\n";
$userstatic = new \User($db);
$form = new \Form($db);
$ecmdirstatic = new \EcmDirectory($db);
// Try to find selected dir id into $sqltree and save it into $current_ecmdir_id
$current_ecmdir_id = -1;
// ----- This section will show a tree from a fulltree array -----
// $section must also be defined
// ----------------------------------------------------------------
// Define fullpathselected ( _x_y_z ) of $section parameter (!! not into ajaxdirtree)
$fullpathselected = '';
//print "fullpathselected=".$fullpathselected."<br>";
// Update expandedsectionarray in session
$expandedsectionarray = array();
//print $_SESSION['dol_ecmexpandedsectionarray'].'<br>';
$nbofentries = 0;
$oldvallevel = 0;
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