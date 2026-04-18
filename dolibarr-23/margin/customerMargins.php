<?php

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
$object = new \Societe($db);
// Security check
$socid = \GETPOSTINT('socid');
$TSelectedProducts = \GETPOST('products', 'array');
$TSelectedCats = \GETPOST('categories', 'array:int');
$result = \restrictedArea($user, 'societe', '', '');
$result = \restrictedArea($user, 'margins');
/*
 * View
 */
$companystatic = new \Societe($db);
$invoicestatic = new \Facture($db);
$form = new \Form($db);
$text = $langs->trans("Margins");
//print load_fiche_titre($text);
// Show tabs
$head = \marges_prepare_head();
$titre = $langs->trans("Margins");
$picto = 'margin';
$client = \false;
$soc = new \Societe($db);
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
// Products
$TRes = $form->select_produits_list(0, '', '', 0, 0, '', 1, 2, 1, 0, '', 1);
$TProducts = array();
// Categories
$TCats = $form->select_all_categories('product', 0, '', 64, 0, 3);
$invoice_status_except_list = array(\Facture::STATUS_DRAFT, \Facture::STATUS_ABANDONED);
$sql = "SELECT";
// TODO: calculate total to display then restore pagination
//$sql.= $db->plimit($conf->liste_limit +1, $offset);
$param = '&socid=' . (int) $socid;
$listofproducts = \GETPOST('products', 'array:int');
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
// affichage totaux marges
$totalMargin = $cumul_vente - $cumul_achat;
/*if ($totalMargin < 0)
	{
		$marginRate = ($cumul_achat != 0)?-1*(100 * $totalMargin / $cumul_achat):'';
		$markRate = ($cumul_vente != 0)?-1*(100 * $totalMargin / $cumul_vente):'';
	}
	else
	{*/
$marginRate = $cumul_achat != 0 ? 100 * $totalMargin / $cumul_achat : '';
$markRate = $cumul_vente != 0 ? 100 * $totalMargin / $cumul_vente : '';