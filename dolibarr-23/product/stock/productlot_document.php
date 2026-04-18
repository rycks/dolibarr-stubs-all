<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : '';
$fieldtype = 'rowid';
$result = \restrictedArea($user, 'produit|service');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$modulepart = 'product_batch';
$object = new \Productlot($db);
$productid = 0;
$batch = '';
$usercanread = $user->hasRight('produit', 'lire');
$usercancreate = $user->hasRight('produit', 'creer');
$usercandelete = $user->hasRight('produit', 'supprimer');
$permissiontoread = $usercanread;
$permissiontoadd = $usercancreate;
$permtoedit = $user->hasRight('produit', 'creer');
$socid = 0;
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$help_url = '';
$shortlabel = \dol_trunc($object->batch, 16);
$title = $langs->trans('Batch') . " " . $shortlabel . " - " . $langs->trans('Documents');
$help_url = 'EN:Module_Products|FR:Module_Produits|ES:M&oacute;dulo_Productos';
$head = \productlot_prepare_head($object);
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/stock/productlot_list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$shownav = 1;
$producttmp = new \Product($db);
$param = '&id=' . $object->id;