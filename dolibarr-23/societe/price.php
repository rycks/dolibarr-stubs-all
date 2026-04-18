<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$search_prod = \GETPOST('search_prod', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$search_label = \GETPOST('search_label', 'alpha');
$search_price = \GETPOST('search_price');
$search_price_ttc = \GETPOST('search_price_ttc');
// Security check
$socid = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$result = \restrictedArea($user, 'societe', $socid, '&societe');
// Initialize objects
$object = new \Societe($db);
$error = 0;
/*
 * Actions
 */
$parameters = array('id' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$object = new \Societe($db);
$result = $object->fetch($socid);
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$tmpcheck = $object->check_codeclient();
$tmpcheck = $object->check_codefournisseur();
$prodcustprice = new \ProductCustomerPrice($db);
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Build filter to display only related lines
$filter = array('t.fk_soc' => (string) $object->id);