<?php

$action = \GETPOST('action', 'aZ09');
$sref = \GETPOST("sref", 'alpha');
$snom = \GETPOST("snom", 'alpha');
$sall = \trim(\GETPOST('search_all', 'alphanohtml'));
$type = \GETPOSTISSET('type') ? \GETPOSTINT('type') : \Product::TYPE_PRODUCT;
$search_barcode = \GETPOST("search_barcode", 'alpha');
$search_toolowstock = \GETPOST('search_toolowstock');
$tosell = \GETPOST("tosell");
$tobuy = \GETPOST("tobuy");
$fourn_id = \GETPOSTINT("fourn_id");
$sbarcode = \GETPOSTINT("sbarcode");
$search_stock_physique = \GETPOST('search_stock_physique', 'alpha');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
// If $page is not defined, or '' or -1
$offset = $limit * $page;
// Load sale and categ filters
$search_sale = \GETPOST("search_sale");
// Get object canvas (By default, this is not defined, so standard usage of dolibarr)
$canvas = \GETPOST("canvas");
$objcanvas = \null;
// Define virtualdiffersfromphysical
$virtualdiffersfromphysical = 0;
$result = \restrictedArea($user, 'produit|service', 0, 'product&product');
$result = \restrictedArea($user, 'stock');
$object = new \Product($db);
/*
 * View
 */
$helpurl = 'EN:Module_Stocks_En|FR:Module_Stock|ES:M&oacute;dulo_Stocks';
$form = new \Form($db);
$htmlother = new \FormOther($db);
$sql = 'SELECT p.rowid, p.ref, p.label, p.barcode, p.price, p.price_ttc, p.price_base_type, p.entity,';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object);
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object);
// Add GROUP BY from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListGroupBy', $parameters, $object);
$sql_having = '';
// Add HAVING from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListHaving', $parameters, $object);
// Count total nb of records
$nbtotalofrecords = '';
$result = $db->query($sql);
$nbtotalofrecords = $db->num_rows($result);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '';
// Filter on categories
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$formProduct = new \FormProduct($db);
$warehouses_list = $formProduct->cache_warehouses;
$nb_warehouse = \count($warehouses_list);
$colspan_warehouse = 1;
$colspan = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
// Hook fields
$parameters = array('param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);