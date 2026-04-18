<?php

$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$type = \GETPOST('type', 'intcomma');
$mode = \GETPOST('mode', 'alpha') ? \GETPOST('mode', 'alpha') : '';
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
/*
 * View
 */
$form = new \Form($db);
$tmpproduct = new \Product($db);
$helpurl = '';
$title = $langs->trans("Statistics");
$param = '';
$title = $langs->trans("ListProductServiceByPopularity");
$h = 0;
$head = array();
// Array of lines to show
$infoprod = array();
// Add lines for object
$sql = "SELECT p.rowid, p.label, p.ref, p.fk_product_type as type, p.tobuy, p.tosell, p.tobatch, p.barcode, SUM(pd.qty) as c";
$textforqty = 'Qty';
$num = 0;
$totalnboflines = 0;
$result = $db->query($sql);
$resql = $db->query($sql);
//var_dump($infoprod);
$arrayofmode = array('propal' => 'Proposals', 'commande' => 'Orders', 'facture' => 'Facture');