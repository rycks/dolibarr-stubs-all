<?php

// Get supervariables
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$type = \GETPOST('type', 'aZ09');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \BonPrelevement($db);
// Must be 'include', not 'include_once'. Include fetch and fetch_thirdparty but not fetch_optionals
// Check if salary or invoice
$salaryBonPl = $object->checkIfSalaryBonPrelevement();
$type = $object->type;
/*
 * View
 */
$form = new \Form($db);
$thirdpartystatic = new \Societe($db);
$invoicestatic = new \Facture($db);
$invoicesupplierstatic = new \FactureFournisseur($db);
$rej = new \RejetPrelevement($db, $user, $type);
// List errors
$sql = "SELECT pl.rowid, pl.amount, pl.statut";
// Count total nb of records
$nbtotalofrecords = '';
$result = $db->query($sql);
$nbtotalofrecords = $db->num_rows($result);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$param = '&id=' . (int) $object->id;
$total = 0;