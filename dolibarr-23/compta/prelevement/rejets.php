<?php

$type = \GETPOST('type', 'aZ09');
// Get supervariables
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Security check
$socid = \GETPOSTINT('socid');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("WithdrawsRefused");
$rej = new \RejetPrelevement($db, $user, $type);
$line = new \LignePrelevement($db);
$thirdpartystatic = new \Societe($db);
$userstatic = new \User($db);
// List of invoices
$sql = "SELECT pl.rowid, pr.motif, p.ref, pl.statut, p.rowid as bonId,";
$result = $db->query($sql);
$num = $db->num_rows($result);
$param = '';
$bon = new \BonPrelevement($db);