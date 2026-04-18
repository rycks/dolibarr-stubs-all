<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$type = \GETPOST("type", 'intcomma');
// Initialize objects
$product_static = new \Product($db);
// Load $resultboxes
$resultboxes = \FormOther::getBoxesArea($user, "4");
$zone = \GETPOSTINT('areacode');
$userid = \GETPOSTINT('userid');
$boxorder = \GETPOST('boxorder', 'aZ09');
$result = \InfoBox::saveboxorder($db, $zone, $boxorder, $userid);
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
/*
 * View
 */
$producttmp = new \Product($db);
$warehouse = new \Entrepot($db);
$transAreaType = $langs->trans("ProductsAndServicesArea");
$helpurl = '';
/*
 * Number of products and/or services
 */
$graph = '';
$prodser = array();
$sql = "SELECT COUNT(p.rowid) as total, p.fk_product_type, p.tosell, p.tobuy";
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $product_static);
$result = $db->query($sql);
$graphcat = '';
$sql = "SELECT c.label, count(*) as nb";
$total = 0;
$result = $db->query($sql);
/*
 * Latest modified products
 */
$lastmodified = "";
$sql = "SELECT p.rowid, p.label, p.price, p.ref, p.fk_product_type, p.tosell, p.tobuy, p.tobatch, p.fk_price_expression,";
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $product_static);
//print $sql;
$result = $db->query($sql);
// Latest modified warehouses
$latestwarehouse = '';
$sql = "SELECT e.rowid, e.ref as label, e.lieu, e.statut as status";
$result = $db->query($sql);
// Latest movements
$latestmovement = '';
$sql = "SELECT p.rowid as product_id, p.ref as product_ref, p.label as product_label, p.tobatch, p.tosell, p.tobuy,";
$resql = $db->query($sql);
// TODO Move this into a page that should be available into menu "accountancy - report - turnover - per quarter"
// Also method used for counting must provide the 2 possible methods like done by all other reports into menu "accountancy - report - turnover":
// "commitment engagement" method and "cash accounting" method
$activity = '';
$boxlist = '<div class="twocolumns">';
$parameters = array('type' => $type, 'user' => $user);
$reshook = $hookmanager->executeHooks('dashboardProductsServices', $parameters, $product_static);
/**
 *  Print html activity for product type
 *
 *  @param      int $product_type   Type of product
 *  @return     string
 */
function activitytrim($product_type)
{
}