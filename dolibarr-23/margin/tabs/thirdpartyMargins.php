<?php

// Security check
$socid = \GETPOSTINT('socid');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Societe($db);
$result = \restrictedArea($user, 'societe', $object->id, '');
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$search_invoice_date_start = '';
$search_invoice_date_end = '';
$query = "SELECT date_start, date_end";
$res = $db->query($query);
/*
 * View
 */
$invoicestatic = new \Facture($db);
$form = new \Form($db);
$title = $langs->trans("ThirdParty") . ' - ' . $langs->trans("Margins");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$param = "&socid=" . $socid;
$totalMargin = 0;
$marginRate = '';
$markRate = '';
$object = new \Societe($db);
// Show tabs
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// TODO Remove the DISTINCT
$sql = "SELECT DISTINCT s.nom, s.rowid as socid, s.code_client,";
$result = $db->query($sql);