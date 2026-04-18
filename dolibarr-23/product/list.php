<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$fourn_id = \GETPOSTINT("fourn_id");
// Search Criteria
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_id = \GETPOST("search_id", 'alpha');
$search_ref = \GETPOST("search_ref", 'alpha');
$search_ref_ext = \trim(\GETPOST("search_ref_ext", 'alpha'));
$search_ref_supplier = \GETPOST("search_ref_supplier", 'alpha');
// ref of supplier price
$search_barcode = \GETPOST("search_barcode", 'alpha');
$search_label = \GETPOST("search_label", 'alpha');
$search_default_workstation = \GETPOST("search_default_workstation", 'alpha');
$search_type = \GETPOST("search_type", "int");
$search_vatrate = \GETPOST("search_vatrate", 'alpha');
$searchCategoryProductOperator = 0;
$searchCategoryProductList = \GETPOST('search_category_product_list', 'array:int');
$catid = \GETPOSTINT('catid');
$search_tosell = \GETPOST("search_tosell");
$search_tobuy = \GETPOST("search_tobuy");
$search_country = \GETPOST("search_country", 'aZ09');
$search_state = \GETPOST("state_id", 'intcomma');
$search_tobatch = \GETPOST("search_tobatch");
$search_stockable_product = \GETPOST('search_stockable_product', 'int');
$search_accountancy_code_sell = \GETPOST("search_accountancy_code_sell", 'alpha');
$search_accountancy_code_sell_intra = \GETPOST("search_accountancy_code_sell_intra", 'alpha');
$search_accountancy_code_sell_export = \GETPOST("search_accountancy_code_sell_export", 'alpha');
$search_accountancy_code_buy = \GETPOST("search_accountancy_code_buy", 'alpha');
$search_accountancy_code_buy_intra = \GETPOST("search_accountancy_code_buy_intra", 'alpha');
$search_accountancy_code_buy_export = \GETPOST("search_accountancy_code_buy_export", 'alpha');
$search_import_key = \GETPOST("search_import_key", 'alpha');
$search_finished = \GETPOST("search_finished");
$search_units = \GETPOST('search_units', 'int');
$type = \GETPOST("type", 'alpha');
// Show/hide child product variants
$show_childproducts = 0;
$diroutputmassaction = $conf->product->dir_output . '/temp/massgeneration/' . $user->id;
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize context for list
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'productservicelist';
$contextpage = 'servicelist';
$contextpage = 'productlist';
// Initialize a technical object to manage hooks. Note that conf->hooks_modules contains array of hooks
$object = new \Product($db);
$extrafields = new \ExtraFields($db);
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$formproduct = new \FormProduct($db);
$formfile = new \FormFile($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Get object canvas (By default, this is not defined, so standard usage of dolibarr)
$canvas = \GETPOST("canvas");
$objcanvas = \null;
// Define virtualdiffersfromphysical
$virtualdiffersfromphysical = 0;
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('p.ref' => "Ref", 'p.label' => "ProductLabel", 'p.description' => "Description", "p.note" => "Note", 'pfp.ref_fourn' => 'RefSupplier');
$titlesellprice = $langs->trans("SellingPrice");
$isInEEC = \isInEEC($mysoc);
$alias_product_perentity = !\getDolGlobalString('MAIN_PRODUCT_PERENTITY_SHARED') ? "p" : "ppe";
$arraypricelevel = array();
// Definition of array of fields for columns
$arrayfields = array(
    'p.rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => '1', 'visible' => -2, 'noteditable' => 1, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id', 'css' => 'left'),
    'p.ref' => array('label' => 'ProductRef', 'checked' => '1', 'position' => 5),
    'p.ref_ext' => array('label' => 'RefExt', 'checked' => '-1', 'position' => 6, 'visible' => \getDolGlobalInt('MAIN_LIST_SHOW_REF_EXT')),
    //'pfp.ref_fourn'=>array('label'=>$langs->trans("RefSupplier"), 'checked'=>1, 'enabled'=>(isModEnabled('barcode'))),
    'thumbnail' => array('label' => 'Photo', 'checked' => '0', 'position' => 10),
    'p.description' => array('label' => 'Description', 'checked' => '0', 'position' => 10),
    'p.label' => array('label' => "Label", 'checked' => '1', 'position' => 10),
    'p.fk_product_type' => array('label' => "Type", 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && \isModEnabled("service")), 'position' => 11),
    'p.barcode' => array('label' => "Gencod", 'checked' => '1', 'enabled' => (string) (int) \isModEnabled('barcode'), 'position' => 12),
    'p.duration' => array('label' => "Duration", 'checked' => $contextpage != 'productlist', 'enabled' => (string) (int) (\isModEnabled("service") && (string) $type == '1'), 'position' => 13),
    'pac.fk_product_parent' => array('label' => "ParentProductOfVariant", 'checked' => '-1', 'enabled' => (string) (int) \isModEnabled('variants'), 'position' => 14),
    'p.finished' => array('label' => "Nature", 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && $type != '1'), 'position' => 19),
    'p.weight' => array('label' => 'Weight', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && $type != '1'), 'position' => 20),
    'p.weight_units' => array('label' => 'WeightUnits', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && $type != '1'), 'position' => 21),
    'p.length' => array('label' => 'Length', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_SIZE') && $type != '1'), 'position' => 22),
    'p.length_units' => array('label' => 'LengthUnits', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_SIZE') && $type != '1'), 'position' => 23),
    'p.width' => array('label' => 'Width', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_SIZE') && $type != '1'), 'position' => 24),
    'p.width_units' => array('label' => 'WidthUnits', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_SIZE') && $type != '1'), 'position' => 25),
    'p.height' => array('label' => 'Height', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_SIZE') && $type != '1'), 'position' => 26),
    'p.height_units' => array('label' => 'HeightUnits', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_SIZE') && $type != '1'), 'position' => 27),
    'p.surface' => array('label' => 'Surface', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_SURFACE') && $type != '1'), 'position' => 28),
    'p.surface_units' => array('label' => 'SurfaceUnits', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_SURFACE') && $type != '1'), 'position' => 29),
    'p.volume' => array('label' => 'Volume', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_VOLUME') && $type != '1'), 'position' => 30),
    'p.volume_units' => array('label' => 'VolumeUnits', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && !\getDolGlobalString('PRODUCT_DISABLE_VOLUME') && $type != '1'), 'position' => 31),
    'cu.label' => array('label' => "DefaultUnitToShow", 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled("product") && \getDolGlobalString('PRODUCT_USE_UNITS')), 'position' => 32),
    'p.fk_default_workstation' => array('label' => 'DefaultWorkstation', 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled('workstation') && $type == 1), 'position' => 33),
    'p.sellprice' => array('label' => "SellingPrice", 'checked' => '1', 'enabled' => (string) (int) (!\getDolGlobalString('PRODUIT_MULTIPRICES')), 'position' => 40),
    'p.tva_tx' => array('label' => "VATRate", 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalString('PRODUIT_MULTIPRICES')), 'position' => 41),
    'p.minbuyprice' => array('label' => "BuyingPriceMinShort", 'checked' => '1', 'enabled' => (string) (int) $user->hasRight('fournisseur', 'lire'), 'position' => 42),
    'p.numbuyprice' => array('label' => "BuyingPriceNumShort", 'checked' => '0', 'enabled' => (string) (int) $user->hasRight('fournisseur', 'lire'), 'position' => 43),
    'p.pmp' => array('label' => "PMPValueShort", 'checked' => '0', 'enabled' => (string) (int) $user->hasRight('fournisseur', 'lire'), 'position' => 44),
    'p.cost_price' => array('label' => "CostPrice", 'checked' => '0', 'enabled' => (string) (int) $user->hasRight('fournisseur', 'lire'), 'position' => 45),
    'p.seuil_stock_alerte' => array('label' => "StockLimit", 'checked' => '0', 'enabled' => (string) (int) (\isModEnabled('stock') && $user->hasRight('stock', 'lire') && ($contextpage != 'servicelist' || \getDolGlobalString('STOCK_SUPPORTS_SERVICES'))), 'position' => 50),
    'p.desiredstock' => array('label' => "DesiredStock", 'checked' => '1', 'enabled' => (string) (int) (\isModEnabled('stock') && $user->hasRight('stock', 'lire') && ($contextpage != 'servicelist' || \getDolGlobalString('STOCK_SUPPORTS_SERVICES'))), 'position' => 51),
    'p.stock' => array('label' => "PhysicalStock", 'checked' => '1', 'enabled' => (string) (int) (\isModEnabled('stock') && $user->hasRight('stock', 'lire') && ($contextpage != 'servicelist' || \getDolGlobalString('STOCK_SUPPORTS_SERVICES'))), 'position' => 52),
    'stock_virtual' => array('label' => "VirtualStock", 'checked' => '1', 'enabled' => (string) (int) (\isModEnabled('stock') && $user->hasRight('stock', 'lire') && ($contextpage != 'servicelist' || \getDolGlobalString('STOCK_SUPPORTS_SERVICES')) && $virtualdiffersfromphysical), 'position' => 53),
    'p.tobatch' => array('label' => "ManageLotSerial", 'checked' => '0', 'enabled' => (string) (int) \isModEnabled('productbatch'), 'position' => 60),
    'p.fk_country' => array('label' => "Country", 'checked' => '0', 'position' => 100),
    'p.fk_state' => array('label' => "State", 'checked' => '0', 'position' => 101),
    $alias_product_perentity . '.accountancy_code_sell' => array('label' => "ProductAccountancySellCode", 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalString('PRODUCT_DISABLE_ACCOUNTING')), 'position' => 400),
    $alias_product_perentity . '.accountancy_code_sell_intra' => array('label' => "ProductAccountancySellIntraCode", 'checked' => '0', 'enabled' => (string) (int) ($isInEEC && !\getDolGlobalString('PRODUCT_DISABLE_ACCOUNTING')), 'position' => 401),
    $alias_product_perentity . '.accountancy_code_sell_export' => array('label' => "ProductAccountancySellExportCode", 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalString('PRODUCT_DISABLE_ACCOUNTING')), 'position' => 402),
    $alias_product_perentity . '.accountancy_code_buy' => array('label' => "ProductAccountancyBuyCode", 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalString('PRODUCT_DISABLE_ACCOUNTING')), 'position' => 403),
    $alias_product_perentity . '.accountancy_code_buy_intra' => array('label' => "ProductAccountancyBuyIntraCode", 'checked' => '0', 'enabled' => (string) (int) ($isInEEC && !\getDolGlobalString('PRODUCT_DISABLE_ACCOUNTING')), 'position' => 404),
    $alias_product_perentity . '.accountancy_code_buy_export' => array('label' => "ProductAccountancyBuyExportCode", 'checked' => '0', 'enabled' => (string) (int) (!\getDolGlobalString('PRODUCT_DISABLE_ACCOUNTING')), 'position' => 405),
    'p.datec' => array('label' => "DateCreation", 'checked' => '0', 'position' => 500),
    'p.tms' => array('label' => "DateModificationShort", 'checked' => '0', 'position' => 500),
    'p.tosell' => array('label' => $langs->transnoentitiesnoconv("Status") . ' (' . $langs->transnoentitiesnoconv("Sell") . ')', 'checked' => '1', 'position' => 1000),
    'p.tobuy' => array('label' => $langs->transnoentitiesnoconv("Status") . ' (' . $langs->transnoentitiesnoconv("Buy") . ')', 'checked' => '1', 'position' => 1000),
    'p.import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => '1', 'visible' => -2, 'notnull' => -1, 'index' => 0, 'checked' => '-1', 'position' => 1100),
);
$arrayfields = \dol_sort_array($arrayfields, 'position');
/*
 * Actions
 */
$error = 0;
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$rightskey = 'produit';
// Mass actions
$objectclass = 'Product';
$permissiontoread = $user->hasRight($rightskey, 'lire');
$permissiontodelete = $user->hasRight($rightskey, 'supprimer');
$permissiontoadd = $user->hasRight($rightskey, 'creer');
$uploaddir = $conf->product->dir_output;
/*
 * View
 */
$product_static = new \Product($db);
$workstation_static = \null;
$product_fourn = new \ProductFournisseur($db);
$title = $langs->trans("ProductsAndServices");
// Build and execute select
// --------------------------------------------------------------------
$sql = 'SELECT p.rowid, p.ref, p.ref_ext, p.description, p.label, p.fk_product_type, p.barcode, p.price, p.tva_tx, p.price_ttc, p.price_base_type, p.entity,';
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// Clean $fieldstosearchall
$newfieldstosearchall = $fieldstosearchall;
$searchCategoryProductSqlList = array();
$listofcategoryid = '';
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
//$sqlforcount = preg_replace('/'.preg_quote($linktopfp, '/').'/', '', $sqlforcount);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
//print $sql;
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Output page
// --------------------------------------------------------------------
$helpurl = '';
$paramsCat = '';
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array('edit_extrafields' => \img_picto('', 'edit', 'class="pictofixedwidth"') . $langs->trans("ModifyValueExtrafields"));
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
$perm = \false;
$oldtype = $type;
$params = array();
$picto = 'product';
$topicmail = "Information";
$modelmail = "product";
$objecttmp = new \Product($db);
$trackid = 'prod' . $object->id;
// Filter on categories
$moreforfilter = '';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $object, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
// Managed_in_stock
$array = array('-1' => '&nbsp;', '0' => $langs->trans('No'), '1' => $langs->trans('Yes'));
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$hidegeneratedfilelistifempty = 1;
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $user->hasRight('product', 'lire');
$delallowed = $user->hasRight('product', 'creer');
$formfile = new \FormFile($db);