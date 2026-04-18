<?php

$backtopage = \GETPOST('backtopage', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$stocklimit = \GETPOSTFLOAT('seuil_stock_alerte');
$desiredstock = \GETPOSTFLOAT('desiredstock');
$cancel = \GETPOST('cancel', 'alpha');
$fieldid = \GETPOSTISSET("ref") ? 'ref' : 'rowid';
$d_eatby = \dol_mktime(0, 0, 0, \GETPOSTINT('eatbymonth'), \GETPOSTINT('eatbyday'), \GETPOSTINT('eatbyyear'));
$d_sellby = \dol_mktime(0, 0, 0, \GETPOSTINT('sellbymonth'), \GETPOSTINT('sellbyday'), \GETPOSTINT('sellbyyear'));
$pdluoid = \GETPOSTINT('pdluoid');
$batchnumber = \GETPOST('batch_number', 'aZ09comma');
$cost_price = \GETPOST('cost_price', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Product($db);
$extrafields = new \ExtraFields($db);
$modulepart = 'product';
// Get object canvas (By default, this is not defined, so standard usage of dolibarr)
$canvas = !empty($object->canvas) ? $object->canvas : \GETPOST("canvas");
$objcanvas = \null;
$error = 0;
$usercanread = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'lire') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'lire');
$usercancreate = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'creer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'creer');
$usercancreadprice = \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') ? $user->hasRight('product', 'product_advance', 'read_prices') : $user->hasRight('product', 'lire');
$usercancreadsupplierprice = \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') ? $user->hasRight('product', 'product_advance', 'read_supplier_prices') : $user->hasRight('product', 'lire');
$usercanupdatestock = $user->hasRight('stock', 'mouvement', 'creer');
$parameters = array('id' => $id, 'ref' => $ref, 'objcanvas' => $objcanvas);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$seuil_stock_alerte = \GETPOST('seuil_stock_alerte');
$desiredstock = \GETPOST('desiredstock');
$maj_ok = \true;
$desiredstock = (float) $desiredstock;
$pse = new \ProductStockEntrepot($db);
$action = '';
$object = new \Product($db);
$result = $object->fetch($id);
$result = $object->update($object->id, $user, 0, 'update');
//else
//	setEventMessages($lans->trans("SavedRecordSuccessfully"), null, 'mesgs');
$action = '';
$object = new \Product($db);
$result = $object->fetch($id);
$result = $object->update($object->id, $user, 0, 'update');
$action = '';
$batch = '';
$sellby = 0;
$eatby = 0;
$pdluo = new \Productbatch($db);
$result = $pdluo->fetch(\GETPOSTINT('pdluoid'));
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$formproject = \null;
$variants = \false;
$iskit = 0;
$object = new \Product($db);
$result = $object->fetch($id, $ref);
$iskit = $object->hasFatherOrChild(1);
$variants = $object->hasVariants();
// This include the load_virtual_stock()
$title = $langs->trans('ProductServiceCard');
$helpurl = '';
$shortlabel = \dol_trunc($object->label, 16);
$showstockdetails = 1;
// Actions buttons
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
$sql = "SELECT e.rowid, e.ref, e.lieu, e.fk_parent, e.statut as status, ps.reel, ps.rowid as product_stock_id, p.pmp";
$entrepotstatic = new \Entrepot($db);
$product_lot_static = new \Productlot($db);
$num = 0;
$total = 0;
$totalvalue = $totalvaluesell = 0;
$totalwithpmp = 0;
$resql = $db->query($sql);
$prodstatic = new \Product($db);
$prodcomb = new \ProductCombination($db);
$comb2val = new \ProductCombination2ValuePair($db);
$productCombinations = $prodcomb->fetchAllByFkProductParent($object->id);
// load variants
$title = $langs->trans("ProductCombinations");