<?php

$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Security check
$socid = '';
$result = \restrictedArea($user, 'supplier_proposal', $id);
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \SupplierProposal($db);
$permissiontoadd = $user->hasRight('supplier_proposal', 'creer');
$usercancreate = $permissiontoadd;
/*
 * View
 */
$title = $object->ref . " - " . $langs->trans('Documents');
$help_url = 'EN:Ask_Price_Supplier|FR:Demande_de_prix_fournisseur';
$form = new \Form($db);
$upload_dir = $conf->supplier_proposal->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$head = \supplier_proposal_prepare_head($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
// Supplier proposal card
$linkback = '<a href="' . \DOL_URL_ROOT . '/supplier_proposal/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$modulepart = 'supplier_proposal';
$permissiontoadd = $user->hasRight('supplier_proposal', 'creer');
$permtoedit = $user->hasRight('supplier_proposal', 'creer');
$param = '&id=' . $object->id;