<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$confirm = \GETPOST('confirm', 'alpha');
// Result of a confirmation
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$backtopage = \GETPOST("backtopage", "alpha");
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$show_files = \GETPOST('show_files', 'aZ');
$mode = \GETPOST('mode', 'aZ');
// The output mode ('list', 'kanban', 'hierarchy', 'calendar', ...)
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$msid = \GETPOSTINT('msid');
$idproduct = \GETPOSTINT('idproduct');
$product_id = \GETPOSTINT('product_id');
$show_files = \GETPOSTINT('show_files');
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, \GETPOSTINT('search_date_startmonth'), \GETPOSTINT('search_date_startday'), \GETPOSTINT('search_date_startyear'), 'tzuserrel');
$search_date_end = \dol_mktime(23, 59, 59, \GETPOSTINT('search_date_endmonth'), \GETPOSTINT('search_date_endday'), \GETPOSTINT('search_date_endyear'), 'tzuserrel');
$search_ref = \GETPOST('search_ref', 'alpha');
$search_movement = \GETPOST("search_movement");
$search_product_ref = \trim(\GETPOST("search_product_ref"));
$search_product = \trim(\GETPOST("search_product"));
$search_warehouse = \trim(\GETPOST("search_warehouse"));
$search_inventorycode = \trim(\GETPOST("search_inventorycode"));
$search_user = \trim(\GETPOST("search_user"));
$search_batch = \trim(\GETPOST("search_batch"));
$search_qty = \trim(\GETPOST("search_qty"));
$search_type_mouvement = \GETPOST('search_type_mouvement');
$search_fk_project = \GETPOST("search_fk_project");
$type = \GETPOSTINT("type");
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$pdluoid = \GETPOSTINT('pdluoid');
// Initialize a technical objects
$object = new \MouvementStock($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->stock->dir_output . '/temp/massgeneration/' . $user->id;
// Note that conf->hooks_modules contains array of activated contexes
$formfile = new \FormFile($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$arrayfields = array(
    'm.rowid' => array('label' => "Ref", 'checked' => '1', 'position' => 1),
    'm.datem' => array('label' => "Date", 'checked' => '1', 'position' => 2),
    'p.ref' => array('label' => "ProductRef", 'checked' => '1', 'css' => 'maxwidth100', 'position' => 3),
    'p.label' => array('label' => "ProductLabel", 'checked' => '0', 'position' => 5),
    'm.batch' => array('label' => "BatchNumberShort", 'checked' => '1', 'position' => 8, 'enabled' => (string) (int) \isModEnabled('productbatch')),
    'pl.eatby' => array('label' => "EatByDate", 'checked' => '0', 'position' => 9, 'enabled' => (string) (int) \isModEnabled('productbatch')),
    'pl.sellby' => array('label' => "SellByDate", 'checked' => '0', 'position' => 10, 'enabled' => (string) (int) \isModEnabled('productbatch')),
    'e.ref' => array('label' => "Warehouse", 'checked' => '1', 'position' => 100, 'enabled' => (string) (int) (!($id > 0))),
    // If we are on specific warehouse, we hide it
    'm.fk_user_author' => array('label' => "Author", 'checked' => '0', 'position' => 120),
    'm.inventorycode' => array('label' => "InventoryCodeShort", 'checked' => '1', 'position' => 130),
    'm.label' => array('label' => "MovementLabel", 'checked' => '1', 'position' => 140),
    'm.type_mouvement' => array('label' => "TypeMovement", 'checked' => '0', 'position' => 150),
    'origin' => array('label' => "Origin", 'checked' => '1', 'position' => 155),
    'm.fk_projet' => array('label' => 'Project', 'checked' => '0', 'position' => 180),
    'm.value' => array('label' => "Qty", 'checked' => '1', 'position' => 200),
    'm.price' => array('label' => "UnitPurchaseValue", 'checked' => '0', 'position' => 210, 'enabled' => (string) (int) (!\getDolGlobalInt('STOCK_MOVEMENT_LIST_HIDE_UNIT_PRICE'))),
);
$tmpwarehouse = new \Entrepot($db);
$socid = 0;
// Security check
//$result=restrictedArea($user, 'stock', $id, 'entrepot&stock');
$result = \restrictedArea($user, 'stock');
$uploaddir = $conf->stock->dir_output . '/movements';
$permissiontoread = $user->hasRight('stock', 'mouvement', 'lire');
$permissiontoadd = $user->hasRight('stock', 'mouvement', 'creer');
$permissiontodelete = $user->hasRight('stock', 'mouvement', 'creer');
// There is no deletion permission for stock movement as we should never delete
$permissiontoeditextra = $permissiontoadd;
$usercanread = $user->hasRight('stock', 'mouvement', 'lire');
$usercancreate = $user->hasRight('stock', 'mouvement', 'creer');
$usercandelete = $user->hasRight('stock', 'mouvement', 'creer');
$error = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'MouvementStock';
$objectlabel = 'MouvementStock';
// @phan-suppress-current-line PhanTypeMismatchProperty
$attribute_name = \GETPOST('attribute', 'aZ09');
// Fill array 'array_options' with data from update form
$ret = $extrafields->setOptionalsFromPost(\null, $tmpwarehouse, $attribute_name);
$batch = '';
$eatby = \null;
$sellby = 0;
$qty = 0;
$price = '0';
$entrepot = 0;
$product = new \Product($db);
$error = 0;
$error = 0;
$product = new \Product($db);
$toselect = \array_map('intval', $toselect);
$sql = "SELECT rowid, label, inventorycode, datem";
$resql = $db->query($sql);
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$productlot = new \Productlot($db);
$productstatic = new \Product($db);
$warehousestatic = new \Entrepot($db);
$userstatic = new \User($db);
$now = \dol_now();
// Build and execute select
// --------------------------------------------------------------------
$sql = "SELECT p.rowid, p.ref as product_ref, p.label as produit, p.tosell, p.tobuy, p.tobatch, p.fk_product_type as type, p.entity,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Add table from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters, $object, $action);
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$product = new \Product($db);
$warehouse = new \Entrepot($db);
$result = $warehouse->fetch($id, $ref);
$i = 0;
$help_url = 'EN:Module_Stocks_En|FR:Module_Stock|ES:M&oacute;dulo_Stocks';
$head = \stock_prepare_head($warehouse);
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/stock/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$shownav = 1;
$calcproductsunique = $warehouse->nb_different_products();
$calcproducts = $warehouse->nb_products();
$valtoshow = \price2num($calcproducts['nb'], 'MS');
// Last movement
$sql = "SELECT MAX(m.datem) as datem";
$resqlbis = $db->query($sql);
$lastmovementdate = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $warehouse, $action);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $warehouse, $action);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
// Add code for pre mass action (confirmation or email presend form)
$topicmail = "SendStockMovement";
$modelmail = "movementstock";
$objecttmp = new \MouvementStock($db);
$trackid = 'mov' . $warehouse->id;
$setupstring = '';
$moreforfilter = '';
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('printFieldPreListTitle', $parameters, $warehouse, $action);
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $warehouse, $action);
$totalarray = array();
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $warehouse, $action);
$arrayofuniqueproduct = array();
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$totalarray = array();
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);
$hidegeneratedfilelistifempty = 1;
$formfile = new \FormFile($db);
// Show list of available documents
$urlsource = $_SERVER['PHP_SELF'] . '?sortfield=' . $sortfield . '&sortorder=' . $sortorder;
$filedir = $diroutputmassaction;
$genallowed = $permissiontoread;
$delallowed = $permissiontoadd;