<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('account');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$numref = \GETPOST('num', 'alpha') ? \GETPOST('num', 'alpha') : \GETPOST('sectionid', 'alpha');
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
// Define number of receipt to show (current, previous or next one ?)
$found = \false;
// Recherche valeur pour num = numero releve precedent
$sql = "SELECT DISTINCT(b.num_releve) as num";
$resql = $db->query($sql);
$permissiontoadd = $user->hasRight('banque', 'modifier');
$backtopage = $_SERVER['PHP_SELF'] . "?account=" . \urlencode((string) $id) . "&num=" . \urlencode((string) $numref);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("FinancialAccount") . ' - ' . $langs->trans("Documents");
$helpurl = "";