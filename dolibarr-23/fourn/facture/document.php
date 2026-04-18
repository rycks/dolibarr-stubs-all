<?php

$id = \GETPOSTINT('facid') ? \GETPOSTINT('facid') : \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$ref = \GETPOST('ref', 'alpha');
$result = \restrictedArea($user, 'fournisseur', $id, 'facture_fourn', 'facture');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \FactureFournisseur($db);
$upload_dir = \null;
$permissiontoadd = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
/*
 * View
 */
$form = new \Form($db);
$title = $object->ref . " - " . $langs->trans('Documents');
$helpurl = "EN:Module_Suppliers_Invoices|FR:Module_Fournisseurs_Factures|ES:Módulo_Facturas_de_proveedores";
$head = \facturefourn_prepare_head($object);
$totalpaid = $object->getSommePaiement();
$linkback = '<a href="' . \DOL_URL_ROOT . '/fourn/facture/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$modulepart = 'facture_fournisseur';
$permission = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$permtoedit = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$param = '&facid=' . $object->id;
$defaulttpldir = '/core/tpl';
$dirtpls = \array_merge($conf->modules_parts['tpl'], array($defaulttpldir));