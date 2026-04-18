<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'inventorycard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$listoffset = \GETPOST('listoffset', 'alpha');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$limit = \GETPOSTINT('limit') > 0 ? \GETPOSTINT('limit') : $conf->liste_limit;
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$fk_warehouse = \GETPOSTINT('fk_warehouse');
$fk_product = \GETPOSTINT('fk_product');
$lineid = \GETPOSTINT('lineid');
$batch = \GETPOST('batch', 'alphanohtml');
$totalExpectedValuation = 0;
$totalRealValuation = 0;
// Initialize a technical objects
$object = new \Inventory($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->stock->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
//restrictedArea($user, 'mymodule', $id);
//Parameters Page
$paramwithsearch = '&sortfield=' . \urlencode($sortfield);
$now = \dol_now();
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/product/inventory/list.php';
$backtopage = \DOL_URL_ROOT . '/product/inventory/inventory.php?id=' . $object->id . '&page=' . $page . $paramwithsearch;
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$help_url = '';
$param = '';
$res = $object->fetch_optionals();
$head = \inventoryPrepareHead($object);
$formconfirm = '';
$form = new \Form($db);
$formquestion = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/inventory/list.php">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$parameters = array();
$reshook = $hookmanager->executeHooks('addMoreActionsButtons', $parameters, $object, $action);
$formother = new \FormOther($db);
// Request to show lines of inventory (prefilled after start/validate step)
$sql = 'SELECT id.rowid, id.datec as date_creation, id.tms as date_modification, id.fk_inventory, id.fk_warehouse,';
$cacheOfProducts = array();
$cacheOfWarehouses = array();
//$sql = '';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$hasinput = \false;
$totalarray = array();