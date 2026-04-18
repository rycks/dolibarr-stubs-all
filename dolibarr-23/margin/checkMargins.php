<?php

$action = \GETPOST('action', 'alpha');
$massaction = \GETPOST('massaction', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'margindetail';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$optioncss = \GETPOST('optioncss', 'alpha');
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
$startdate = \dol_mktime(0, 0, 0, \GETPOSTINT('startdatemonth'), \GETPOSTINT('startdateday'), \GETPOSTINT('startdateyear'));
$enddate = \dol_mktime(23, 59, 59, \GETPOSTINT('enddatemonth'), \GETPOSTINT('enddateday'), \GETPOSTINT('enddateyear'));
$search_ref = \GETPOST('search_ref', 'alpha');
// Security check
$result = \restrictedArea($user, 'margins');
$permissiontocreate = $user->hasRight('facture', 'creer');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$userstatic = new \User($db);
$companystatic = new \Societe($db);
$invoicestatic = new \Facture($db);
$productstatic = new \Product($db);
$form = new \Form($db);
$title = $langs->trans("MarginDetails");
// print load_fiche_titre($text);
$param = '';
// Show tabs
$head = \marges_prepare_head();
$picto = 'margin';
$arrayfields = array();
$massactionbutton = '';
$invoice_status_except_list = array(\Facture::STATUS_DRAFT, \Facture::STATUS_ABANDONED);
$sql = "SELECT";
$parameters = array();
$nbtotalofrecords = '';
$result = $db->query($sql);
$nbtotalofrecords = $db->num_rows($result);
$result = $db->query($sql);
$num = $db->num_rows($result);
$moreforfilter = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
//$selectedfields=$form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);	// This also change content of $arrayfields
//if ($massactionbutton) $selectedfields.=$form->showCheckAddButtons('checkforselect', 1);
$selectedfields = '';
$i = 0;