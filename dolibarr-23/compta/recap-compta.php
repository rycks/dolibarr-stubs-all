<?php

$id = \GETPOST('id') ? \GETPOSTINT('id') : \GETPOSTINT('socid');
$result = \restrictedArea($user, 'societe', $id, '&societe');
$object = new \Societe($db);
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$arrayfields = array('f.datef' => array('label' => "Date", 'checked' => 1));
/*
 * Actions
 */
$parameters = array('socid' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object);
// None
/*
 *	View
 */
$form = new \Form($db);
$userstatic = new \User($db);
$title = $langs->trans("ThirdParty") . ' - ' . $langs->trans("Summary");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$param = '';
$head = \societe_prepare_head($object);