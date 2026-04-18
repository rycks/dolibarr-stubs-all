<?php

$action = \GETPOST('action', 'aZ09') ? \GETPOST('action', 'aZ09') : 'view';
// The action 'add', 'create', 'edit', 'update', 'view', ...
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'myobjectlist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// Go back to a dedicated page
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$mode = \GETPOST('mode', 'aZ');
$sref = \GETPOST("sref", 'alpha');
$snom = \GETPOST("snom", 'alpha');
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$type = \GETPOSTISSET('type') ? \GETPOSTINT('type') : \Product::TYPE_PRODUCT;
$search_barcode = \GETPOST("search_barcode", 'alpha');
$search_warehouse = \GETPOST('search_warehouse', 'alpha');
$search_batch = \GETPOST('search_batch', 'alpha');
$search_toolowstock = \GETPOST('search_toolowstock');
$search_subjecttolotserial = \GETPOST('search_subjecttolotserial');
$tosell = \GETPOST("tosell");
$tobuy = \GETPOST("tobuy");
$fourn_id = \GETPOSTINT("fourn_id");
$sbarcode = \GETPOSTINT("sbarcode");
$search_stock_physique = \GETPOST('search_stock_physique', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize array of search criteria
$object = new \Product($db);
$search_sale = \GETPOST("search_sale");
$search_warehouse_categ = \GETPOSTINT('search_warehouse_categ');
//$extrafields->fetch_name_optionals_label($object->table_element_line);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search = array();
$key = 'sellby';
$key = 'eatby';
// Get object canvas (By default, this is not defined, so standard usage of dolibarr)
$canvas = \GETPOST("canvas");
$objcanvas = \null;
// Definition of array of fields for columns
$arrayfields = array(array('type' => 'varchar', 'label' => 'Ref', 'checked' => 1, 'enabled' => 1, 'position' => 1), array('type' => 'varchar', 'label' => 'Label', 'checked' => 1, 'enabled' => 1, 'position' => 1), array('type' => 'int', 'label' => 'Warehouse', 'checked' => 1, 'enabled' => 1, 'position' => 1), array('type' => 'varchar', 'label' => 'Lot', 'checked' => 1, 'enabled' => 1, 'position' => 1), array('type' => 'varchar', 'label' => 'DLC', 'checked' => 1, 'enabled' => 1, 'position' => 1), array('type' => 'varchar', 'label' => 'DLUO', 'checked' => 1, 'enabled' => 1, 'position' => 1), array('type' => 'int', 'label' => 'Stock', 'checked' => 1, 'enabled' => 1, 'position' => 1), array('type' => 'int', 'label' => 'StatusSell', 'checked' => 1, 'enabled' => 1, 'position' => 1), array('type' => 'int', 'label' => 'StatusBuy', 'checked' => 1, 'enabled' => 1, 'position' => 1));
//$arrayfields['anotherfield'] = array('type'=>'integer', 'label'=>'AnotherField', 'checked'=>1, 'enabled'=>1, 'position'=>90, 'csslist'=>'right');
$arrayfields = \dol_sort_array($arrayfields, 'position');
$result = \restrictedArea($user, 'produit|service', 0, 'product&product');
$result = \restrictedArea($user, 'stock');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$htmlother = new \FormOther($db);
$now = \dol_now();
$helpurl = 'EN:Module_Stocks_En|FR:Module_Stock|ES:M&oacute;dulo_Stocks';
$title = $langs->trans("ProductsAndServices");
$morejs = array();
$morecss = array();
$sql = 'SELECT p.rowid, p.ref, p.label, p.barcode, p.price, p.price_ttc, p.price_base_type, p.entity,';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object);
// Link on unique key
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
$natural_search_physique = \natural_search('__SEARCH_PHYSIQUE__', $search_stock_physique, 1, 1);
$natural_search_physique = " " . \substr(\str_replace('__SEARCH_PHYSIQUE__', 'SUM(COALESCE(pb.qty, ps.reel, 0))', $natural_search_physique), 1, -1);
// Add HAVING from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListHaving', $parameters, $object);
//print $sql;
// Count total nb of records
$nbtotalofrecords = '';
$resql = $db->query($sql);
$nbtotalofrecords = $db->num_rows($resql);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$param = '';
/*
if ($search_categ > 0) {
	print "<div id='ways'>";
	$c = new Categorie($db);
	$c->fetch($search_categ);
	$ways = $c->print_all_ways('auto', 'product/reassortlot.php');
	print " &gt; ".$ways[0]."<br>\n";
	print "</div><br>";
}
*/
// Filter on categories
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters);
$totalarray = array();
// Hook fields
$parameters = array('param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters);
$product_static = new \Product($db);
$product_lot_static = new \Productlot($db);
$warehousetmp = new \Entrepot($db);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$imaxinloop = $limit ? \min($num, $limit) : $num;