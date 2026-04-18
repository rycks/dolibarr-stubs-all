<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \CommandeFournisseur($db);
$upload_dir = $conf->fournisseur->commande->dir_output . '/' . \dol_sanitizeFileName($object->ref);
// Security check
$socid = 0;
$result = \restrictedArea($user, 'fournisseur', $id, 'commande_fournisseur', 'commande');
$permissiontoadd = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
// Used by the include of actions_setnotes.inc.php
$caneditproject = \false;
/*
 * View
 */
$form = new \Form($db);
$title = $object->ref . " - " . $langs->trans('Documents');
$help_url = 'EN:Module_Suppliers_Orders|FR:CommandeFournisseur|ES:Módulo_Pedidos_a_proveedores';
$author = new \User($db);
$head = \ordersupplier_prepare_head($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
// Supplier order card
$linkback = '<a href="' . \DOL_URL_ROOT . '/fourn/commande/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$modulepart = 'commande_fournisseur';
$permissiontoadd = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
$permtoedit = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
$param = '&id=' . $object->id;