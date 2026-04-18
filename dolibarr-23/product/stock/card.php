<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$projectid = \GETPOSTINT('projectid');
$id = \GETPOSTINT('id');
$socid = \GETPOSTINT('socid');
$ref = \GETPOST('ref', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
// Security check
$result = \restrictedArea($user, 'stock', $id, 'entrepot&stock');
$object = new \Entrepot($db);
$extrafields = new \ExtraFields($db);
$ret = $object->fetch($id, $ref);
$usercanread = $user->hasRight('stock', 'lire');
$usercancreate = $user->hasRight('stock', 'creer');
$usercandelete = $user->hasRight('stock', 'supprimer');
$permissiontoeditextra = $usercancreate;
/*
 * Actions
 */
$error = 0;
$parameters = array('context' => 'warehousecard', 'id' => $id, 'ref' => $ref);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/product/stock/list.php';
// Actions to build doc
$upload_dir = $conf->stock->dir_output;
$permissiontoadd = $user->hasRight('stock', 'creer');
/*
 * View
 */
$productstatic = new \Product($db);
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$formcompany = new \FormCompany($db);
$formfile = new \FormFile($db);
$formproject = \null;
$title = $langs->trans("WarehouseCard");
$help_url = 'EN:Module_Stocks_En|FR:Module_Stock|ES:M&oacute;dulo_Stocks';
$doleditor = new \DolEditor('desc', !empty($object->description) ? $object->description : '', '', 180, 'dolibarr_notes', 'In', \false, \true, \isModEnabled('fckeditor'), \ROWS_5, '90%');
/*
 * Documents generated
 */
$modulepart = 'stock';