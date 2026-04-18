<?php

$action = \GETPOST('action', 'aZ');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$socid = '';
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost('facture', '', 'search_');
$showmessage = \GETPOST('showmessage');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$option = '';
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$result = \restrictedArea($user, 'produit|service', $fieldvalue, 'product&product', '', '', $fieldtype);
/*
 * View
 */
$invoicestatic = new \Facture($db);
$societestatic = new \Societe($db);
$form = new \Form($db);
$formother = new \FormOther($db);
$product = new \Product($db);
$result = $product->fetch($id, $ref);
$object = $product;
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $product, $action);
$title = $langs->trans('ProductServiceCard');
$helpurl = '';
$shortlabel = \dol_trunc($object->label, 16);