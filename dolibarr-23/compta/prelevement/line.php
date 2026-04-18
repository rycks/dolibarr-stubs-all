<?php

// Get supervariables
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$socid = \GETPOSTINT('socid');
$type = \GETPOST('type', 'aZ09');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$error = 0;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("WithdrawalsLine");
$head = array();
$h = 0;
$hselected = (string) $h;
$lipre = new \LignePrelevement($db);
$bon = \null;
/*
 * List of invoices
 */
$sql = "SELECT pf.rowid";
$sqlfields = $sql;
// Count total nb of records
$nbtotalofrecords = '';
$result = $db->query($sql);
$result = $db->query($sql);