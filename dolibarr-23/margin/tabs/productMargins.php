<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$object = new \Product($db);
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$result = \restrictedArea($user, 'produit|service', $fieldvalue, 'product&product', '', '', $fieldtype);
$search_invoice_date_start = '';
$search_invoice_date_end = '';
$query = "SELECT date_start, date_end";
$res = $db->query($query);
/*
 * View
 */
$invoicestatic = new \Facture($db);
$form = new \Form($db);
$totalMargin = 0;
$marginRate = '';
$markRate = '';
$result = $object->fetch($id, $ref);
$title = $langs->trans('ProductServiceCard');
$help_url = '';
$shortlabel = \dol_trunc($object->label, 16);
$param = "&id=" . $object->id;