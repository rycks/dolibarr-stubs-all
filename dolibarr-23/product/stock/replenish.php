<?php

$result = \restrictedArea($user, 'produit|service');
//checks if a product has been ordered
$action = \GETPOST('action', 'aZ09');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_label = \GETPOST('search_label', 'alpha');
$sall = \trim(\GETPOST('search_all', 'alphanohtml'));
$type = \GETPOSTINT('type');
$tobuy = \GETPOSTFLOAT('tobuy');
$salert = \GETPOST('salert', 'alpha');
$includeproductswithoutdesiredqty = \GETPOST('includeproductswithoutdesiredqty', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$draftorder = \GETPOST('draftorder', 'alpha');
$fourn_id = \GETPOSTINT('fourn_id');
$fk_supplier = \GETPOSTINT('fk_supplier');
$fk_entrepot = \GETPOSTINT('fk_entrepot');
// List all visible warehouses
$resWar = $db->query("SELECT rowid FROM " . \MAIN_DB_PREFIX . "entrepot WHERE entity IN (" . $db->sanitize(\getEntity('stock')) . ")");
$listofqualifiedwarehousesid = "";
$lastWarehouseID = 0;
$count = 0;
$texte = '';
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$offset = $limit * $page;
// Define virtualdiffersfromphysical
$virtualdiffersfromphysical = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$draftchecked = "";
$linecount = \GETPOSTINT('linecount');
$box = 0;
$errorQty = 0;
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$prod = new \Product($db);
$title = $langs->trans('MissingStocks');
$sql = 'SELECT p.rowid, p.ref, p.label, p.description, p.price,';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
$list_warehouse = empty($listofqualifiedwarehousesid) ? '0' : $listofqualifiedwarehousesid;
$list_warehouse_selected = $fk_entrepot < 0 || empty($fk_entrepot) ? $list_warehouse : $fk_entrepot;
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListJoin', $parameters);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
$parameters = array();
$sqlHookVirtualStock = "0";
$reshook = $hookmanager->executeHooks('printFieldListHavingVirtualStock', $parameters);
$includeproductswithoutdesiredqtychecked = '';
$nbtotalofrecords = '';
$result = $db->query($sql);
$nbtotalofrecords = $db->num_rows($result);
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$helpurl = 'EN:Module_Stocks_En|FR:Module_Stock|';
$head = array();
$filter = '(fournisseur:=:1)';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters);
$filters = '&search_ref=' . \urlencode($search_ref) . '&search_label=' . \urlencode($search_label);
$param = isset($type) ? '&type=' . \urlencode((string) $type) : '';
$stocklabel = $langs->trans('Stock');
$stocklabelbis = $langs->trans('Stock');
$stocktooltip = '';
$texte = $langs->trans('Replenishment');
// Fields from hook
$parameters = array('param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$searchpicto = $form->showFilterAndCheckAddButtons(0);
// Hook fields
$parameters = array('param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
$colspan = 9;
$parameters = array('sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters);
$value = $langs->trans("CreateOrders");