<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$childids = $user->getAllChildIds(1);
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \ExpenseReport($db);
$upload_dir = $conf->expensereport->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'trip';
$result = \restrictedArea($user, 'expensereport', $id, 'expensereport');
// Check current user can read this expense report
$canread = 0;
$permissiontoadd = $user->hasRight('expensereport', 'creer');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("ExpenseReport") . " - " . $langs->trans("Documents");
$help_url = "EN:Module_Expense_Reports|FR:Module_Notes_de_frais";