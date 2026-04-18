<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Facture($db);
$upload_dir = $conf->invoice->multidir_output[empty($object->entity) ? 1 : $object->entity] . '/' . \dol_sanitizeFileName($object->ref);
$permissiontoadd = $user->hasRight('facture', 'creer');
$result = \restrictedArea($user, 'facture', $object->id, '');
$usercancreate = $user->hasRight("facture", "creer");
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$help_url = "EN:Customers_Invoices|FR:Factures_Clients|ES:Facturas_a_clientes";