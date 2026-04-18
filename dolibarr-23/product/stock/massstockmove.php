<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$confirm = \GETPOST('confirm', 'alpha');
$filetoimport = \GETPOST('filetoimport');
$result = \restrictedArea($user, 'produit|service');
//checks if a product has been ordered
$action = \GETPOST('action', 'aZ09');
$id_product = \GETPOSTINT('productid');
$id_sw = \GETPOSTINT('id_sw');
$id_tw = \GETPOSTINT('id_tw');
$batch = \GETPOST('batch');
$qty = \GETPOST('qty');
$idline = \GETPOST('idline');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$listofdata = array();
$listofdata = \json_decode($_SESSION['massstockmove'], \true);
$error = 0;
$permissiontodelete = $user->hasRight('stock', 'mouvement', 'creer');
$error = 0;
$nowyearmonth = \dol_print_date(\dol_now(), '%Y%m%d%H%M%S');
$fullpath = $conf->stock->dir_temp . "/" . $user->id . '-csvfiletotimport.csv';
$resultupload = \dol_move_uploaded_file($_FILES['userfile']['tmp_name'], $fullpath, 1);
$file = $conf->stock->dir_temp . '/' . \GETPOST('urlfile');
$ret = \dol_delete_file($file);
/*
 * View
 */
$now = \dol_now();
$error = 0;
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$productstatic = new \Product($db);
$warehousestatics = new \Entrepot($db);
$warehousestatict = new \Entrepot($db);
$help_url = 'EN:Module_Stocks_En|FR:Module_Stock|ES:Módulo_Stocks|DE:Modul_Bestände';
$title = $langs->trans('MassMovement');
$titletoadd = $langs->trans("Select");
$buttonrecord = $langs->trans("RecordMovements");
$titletoaddnoent = $langs->transnoentitiesnoconv("Select");
$buttonrecordnoent = $langs->transnoentitiesnoconv("RecordMovements");
$importcsv = new \ImportCsv($db, 'massstocklist');
$maxfilesizearray = \getMaxFileSizeArray();
$maxmin = $maxfilesizearray['maxmin'];
$out = !\getDolGlobalString('MAIN_UPLOAD_DOC') ? ' disabled' : '';
$out = '';
$max = \getDolGlobalString('MAIN_UPLOAD_DOC');
// In Kb
$maxphp = @\ini_get('upload_max_filesize');
$maxphp2 = @\ini_get('post_max_size');
// Now $max and $maxphp and $maxphp2 are in Kb
$maxmin = $max;
$maxphptoshow = $maxphptoshowparam = '';
$param = '';
$filtertype = 0;
/**
 * Verify if $haystack startswith $needle
 *
 * @param string $haystack string to test
 * @param string $needle string to find
 * @return bool false if Ko true else
 */
function startsWith($haystack, $needle)
{
}
/**
 * Fetch object with ref
 *
 * @param CommonObject $static_object static object to fetch
 * @param string $tmp_ref ref of the object to fetch
 * @return int Return integer <0 if Ko or Id of object
 */
function fetchref($static_object, $tmp_ref)
{
}