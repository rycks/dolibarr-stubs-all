<?php

$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width', '380');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height', '160');
$id = \GETPOSTINT('id');
// For this page, id can also be 'all'
$ref = \GETPOST('ref', 'alpha');
$mode = \GETPOST('mode', 'alpha') ? \GETPOST('mode', 'alpha') : 'byunit';
$search_year = \GETPOSTINT('search_year');
$search_categ = \GETPOSTINT('search_categ');
$notab = \GETPOSTINT('notab');
$type = \GETPOST('type', 'alpha');
// Can be '' or '0' or '1'
$error = 0;
$mesg = '';
$graphfiles = array();
$socid = \GETPOSTINT('socid');
// Security check
$fieldvalue = $id > 0 ? $id : $ref;
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$tmp = \dol_getdate(\dol_now());
$currentyear = $tmp['year'];
$moreforfilter = "";
$object = new \Product($db);
$result = \restrictedArea($user, 'produit|service', $fieldvalue, 'product&product', '', '', $fieldtype);
/*
 * Actions
 */
// None
/*
 *	View
 */
$form = new \Form($db);
$htmlother = new \FormOther($db);
$notab = 1;
$helpurl = '';
$picto = 'product';
$h = 0;
$head = array();
$title = $langs->trans("ListProductServiceByPopularity");
$arrayyears = array();
$param = '';
// Generation of graphs
$dir = !empty($conf->product->multidir_temp[$conf->entity]) ? $conf->product->multidir_temp[$conf->entity] : $conf->service->multidir_temp[$conf->entity];
$arrayforlabel = array('byunit' => 'NumberOfUnits', 'bynumber' => 'NumberOf', 'byamount' => 'AmountIn');
$px = new \DolGraph();
// Show graphs
$i = 0;