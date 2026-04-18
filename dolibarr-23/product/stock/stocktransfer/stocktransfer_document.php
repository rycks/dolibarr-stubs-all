<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$id = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST("sortfield", 'alpha');
$sortorder = \GETPOST("sortorder", 'alpha');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
//if (! $sortfield) $sortfield="position_name";
// Initialize a technical objects
$object = new \StockTransfer($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->stocktransfer->dir_output . '/temp/massgeneration/' . $user->id;
// Must be 'include', not 'include_once'. Include fetch and fetch_thirdparty but not fetch_optionals
//if ($id > 0 || !empty($ref)) $upload_dir = $conf->stocktransfer->multidir_output[$object->entity?$object->entity:$conf->entity] . "/stocktransfer/" . dol_sanitizeFileName((string) $object->id);
$upload_dir = \null;
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
//restrictedArea($user, 'stocktransfer', $object->id);
$permissiontoadd = $user->hasRight('stocktransfer', 'stocktransfer', 'write');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("ModuleStockTransferName") . ' - ' . $langs->trans("Files");
$help_url = '';