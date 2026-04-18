<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Get parameters
$limit = \GETPOST('limit', 'int') ? \GETPOST('limit', 'int') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Load object
$object = new \Paiement($db);
$permissiontoadd = $user->hasRight('facture', 'creer');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('Payment') . " - " . $langs->trans('Documents');