<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('account');
$ref = \GETPOST('ref', 'alpha');
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
$object = new \Account($db);
$result = \restrictedArea($user, 'banque', $object->id, 'bank_account', '', '');
$permissiontoadd = $user->hasRight('banque', 'modifier');
/*
 * View
 */
$title = $object->ref . ' - ' . $langs->trans("Documents");
$help_url = "EN:Module_Banks_and_Cash|FR:Module_Banques_et_Caisses";
$form = new \Form($db);