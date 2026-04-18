<?php

$id = \GETPOSTISSET('id') ? \GETPOSTINT('id') : \GETPOSTINT('rowid');
$ref = \GETPOST('ref', 'alphanohtml');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Adherent($db);
$membert = new \AdherentType($db);
$result = $object->fetch($id, $ref);
$upload_dir = $conf->adherent->dir_output . "/" . \get_exdir(0, 0, 0, 1, $object, 'member');
// Load member
$result = $object->fetch($id, $ref);
// Define variables to know what current user can do on users
$canadduser = $user->admin || $user->hasRight('user', 'user', 'creer');
// Define variables to determine what the current user can do on the members
$canaddmember = $user->hasRight('adherent', 'creer');
$permissiontoadd = $canaddmember;
// Security check
$result = \restrictedArea($user, 'adherent', $object->id, '', '', 'socid', 'rowid', 0);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("Member") . " - " . $langs->trans("Documents");
$help_url = "EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder";
$result = $membert->fetch($object->typeid);