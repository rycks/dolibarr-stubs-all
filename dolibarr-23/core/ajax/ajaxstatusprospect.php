<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$idstatus = \GETPOSTINT('id');
$idprospect = \GETPOSTINT('prospectid');
$action = \GETPOST('action', 'aZ09');
$prospectstatic = new \Client($db);
// var_dump(	$user, 'societe', $idprospect, '&societe');
$result = \restrictedArea($user, 'societe', $idprospect, '&societe');
$permisstiontoupdate = $user->hasRight('societe', 'creer');
$response = "";
// Load thirdparty
$prospect = new \Societe($db);
$result = $prospect->fetch($idprospect);