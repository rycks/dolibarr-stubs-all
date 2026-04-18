<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$TSelectedCats = \GETPOST('categories', 'array:int');
$socid = 0;
$mesg = '';
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
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Product($db);
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$result = \restrictedArea($user, 'produit|service', $fieldvalue, 'product&product', '', '', $fieldtype);
/*
 * View
 */
$product_static = new \Product($db);
$invoicestatic = new \Facture($db);
$form = new \Form($db);
$text = $langs->trans("Margins");
//print load_fiche_titre($text);
// Show tabs
$head = \marges_prepare_head();
$titre = $langs->trans("Margins");
$picto = 'margin';
// Categories
$TCats = $form->select_all_categories('product', 0, '', 64, 0, 3);
$invoice_status_except_list = array(\Facture::STATUS_DRAFT, \Facture::STATUS_ABANDONED);
$sql = "SELECT p.label, p.rowid, p.fk_product_type, p.ref, p.entity as pentity,";
// TODO: calculate total to display then restore pagination
//$sql.= $db->plimit($conf->liste_limit +1, $offset);
$param = '&id=' . (int) $id;
$listofcateg = \GETPOST('categories', 'array:int');
$totalMargin = 0;
$marginRate = '';
$markRate = '';
$result = $db->query($sql);
$num = $db->num_rows($result);
$moreforfilter = '';
$i = 0;
$cumul_achat = 0;
$cumul_vente = 0;
$cumul_qty = 0;
// affichage totaux marges
$totalMargin = $cumul_vente - $cumul_achat;
$marginRate = $cumul_achat != 0 ? 100 * $totalMargin / $cumul_achat : '';
$markRate = $cumul_vente != 0 ? 100 * $totalMargin / $cumul_vente : '';