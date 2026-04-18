<?php

$mesg = '';
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$startdate = $enddate = '';
$startdateday = \GETPOSTINT('startdateday');
$startdatemonth = \GETPOSTINT('startdatemonth');
$startdateyear = \GETPOSTINT('startdateyear');
$enddateday = \GETPOSTINT('enddateday');
$enddatemonth = \GETPOSTINT('enddatemonth');
$enddateyear = \GETPOSTINT('enddateyear');
// Security check
$result = \restrictedArea($user, 'margins');
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \User($db);
/*
 * Actions
 */
// None
/*
 * View
 */
$userstatic = new \User($db);
$companystatic = new \Societe($db);
$invoicestatic = new \Facture($db);
$form = new \Form($db);
$text = $langs->trans("Margins");
//print load_fiche_titre($text);
// Show tabs
$head = \marges_prepare_head();
$titre = $langs->trans("Margins");
$picto = 'margin';
$invoice_status_except_list = array(\Facture::STATUS_DRAFT, \Facture::STATUS_ABANDONED);
$sql = "SELECT";
$param = '';
$totalMargin = 0;
$marginRate = '';
$markRate = '';
$result = $db->query($sql);
$num = $db->num_rows($result);
$moreforfilter = '';
$i = 0;
$totalMargin = $cumul_vente - $cumul_achat;
$marginRate = $cumul_achat != 0 ? 100 * $totalMargin / $cumul_achat : '';
$markRate = $cumul_vente != 0 ? 100 * $totalMargin / $cumul_vente : '';