<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$socid = 0;
$result = \restrictedArea($user, 'produit|service', $fieldvalue, 'product&product', '', '', $fieldtype);
/*
 * View
 */
$staticcontrat = new \Contrat($db);
$staticcontratligne = new \ContratLigne($db);
$form = new \Form($db);
$product = new \Product($db);
$result = $product->fetch($id, $ref);
$object = $product;
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $product, $action);