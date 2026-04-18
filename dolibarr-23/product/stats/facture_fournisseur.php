<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$socid = '';
$option = '';
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_month = \GETPOSTINT('search_month');
$search_year = \GETPOSTINT('search_year');
$result = \restrictedArea($user, 'produit|service', $fieldvalue, 'product&product', '', '', $fieldtype);
/*
 * View
 */
$supplierinvoicestatic = new \FactureFournisseur($db);
$societestatic = new \Societe($db);
$form = new \Form($db);
$formother = new \FormOther($db);
$product = new \Product($db);
$result = $product->fetch($id, $ref);
$object = $product;
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $product, $action);