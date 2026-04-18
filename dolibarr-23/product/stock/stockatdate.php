<?php

//checks if a product has been ordered
$action = \GETPOST('action', 'aZ09');
$type = \GETPOSTINT('type');
$mode = \GETPOST('mode', 'alpha');
$ext = \GETPOSTISSET('output') && \in_array(\GETPOST('output'), array('csv')) ? \GETPOST('output') : '';
$date = '';
$dateendofday = '';
$search_ref = \GETPOST('search_ref', 'alphanohtml');
$search_nom = \GETPOST('search_nom', 'alphanohtml');
$now = \dol_now();
$productid = \GETPOSTINT('productid');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$offset = $limit * $page;
$object = new \Entrepot($db);
$result = \restrictedArea($user, 'produit|service');
// Must have permission to read product
$result = \restrictedArea($user, 'stock');
// Must have permission to read stock
$dateIsValid = \true;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$warehouseStatus = array();
// Get array with current stock per product, warehouse
$stock_prod_warehouse = array();
$stock_prod = array();
// Avoid heavy sql if mandatory date is not defined
$sql = "SELECT ps.fk_product, ps.fk_entrepot as fk_warehouse,";
//print $sql;
$resql = $db->query($sql);
// Get array with list of stock movements between date and now (for product/warehouse=
$movements_prod_warehouse = array();
$movements_prod = array();
$movements_prod_warehouse_nb = array();
$movements_prod_nb = array();
$sql = "SELECT sm.fk_product, sm.fk_entrepot, SUM(sm.value) AS stock, COUNT(sm.rowid) AS nbofmovement";
$resql = $db->query($sql);
//var_dump($movements_prod_warehouse);
//var_dump($movements_prod);
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$prod = new \Product($db);
$num = 0;
$title = $langs->trans('StockAtDate');
$sql = 'SELECT p.rowid, p.ref, p.label, p.description, p.price, p.pmp,';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sqlfields = $sql;
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListJoin', $parameters, $object, $action);
$sqlGroupBy = ' GROUP BY p.rowid, p.ref, p.label, p.description, p.price, p.pmp, p.price_ttc, p.price_base_type, p.fk_product_type, p.desiredstock, p.seuil_stock_alerte,';
$parameters = array('sqlGroupBy' => $sqlGroupBy);
$reshook = $hookmanager->executeHooks('printFieldListGroupBy', $parameters, $object, $action);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
// Count total nb of records
$nbtotalofrecords = '';
$num = $db->num_rows($resql);
$i = 0;
$helpurl = 'EN:Module_Stocks_En|FR:Module_Stock|';
$stocklabel = $langs->trans('StockAtDate');
$totalbuyingprice = 0;
$totalsellingprice = 0;
$totalcurrentstock = 0;
$totalvirtualstock = 0;
$i = 0;
$parameters = array('sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters);
$colspan = 8;