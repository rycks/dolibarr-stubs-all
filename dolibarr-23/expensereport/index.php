<?php

$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'expensereport', '', '');
/*
 * View
 */
$tripandexpense_static = new \ExpenseReport($db);
$childids = $user->getAllChildIds();
$help_url = "EN:Module_Expense_Reports|FR:Module_Notes_de_frais";
$label = $somme = array();
$totalnb = $totalsum = 0;
$sql = "SELECT tf.code, tf.label, count(de.rowid) as nb, sum(de.total_ht) as km";
$result = $db->query($sql);
$listoftype = $tripandexpense_static->listOfTypes();
$dataseries = array();
// Sort array with most important first
$dataseries = \dol_sort_array($dataseries, '1', 'desc');
// Merge all entries after the $KEEPNFIRST one into one entry called "Other..." (to avoid to have too much entries in graphic).
$KEEPNFIRST = 7;
// Keep first $KEEPNFIRST one + 1 with the remain
$i = 0;
$sql = "SELECT u.rowid as uid, u.lastname, u.firstname, u.login, u.statut as user_status, u.photo, u.email, u.admin,";
$result = $db->query($sql);
$var = \false;
$num = $db->num_rows($result);
$i = 0;
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardExpenseReport', $parameters, $object);