<?php

// Security check
$id = \GETPOSTINT("id");
$ref = \GETPOST('ref');
$lineid = \GETPOSTINT('lineid');
$action = \GETPOST('action', 'aZ09');
$fk_default_warehouse = \GETPOSTINT('fk_default_warehouse');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
// Recuperation de l'id de projet
$projectid = 0;
$object = new \CommandeFournisseur($db);
$result = $object->fetch($id, $ref);
$result = $object->fetch_thirdparty();
// $id is id of a purchase order.
$result = \restrictedArea($user, 'fournisseur', $object, 'commande_fournisseur', 'commande');
$usercancreate = $user->hasRight("fournisseur", "commande", "creer") || $user->hasRight("supplier_order", "creer");
$permissiontoadd = $usercancreate;
// Used by the include of actions_addupdatedelete.inc.php
/*
 * Actions
 */
$error = 0;
$errors = [];
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$supplierorderdispatch = new \CommandeFournisseurDispatch($db);
$result = $supplierorderdispatch->fetch($lineid);
$supplierorderdispatch = new \CommandeFournisseurDispatch($db);
$result = $supplierorderdispatch->fetch($lineid);
$supplierorderdispatch = new \CommandeFournisseurDispatch($db);
$result = $supplierorderdispatch->fetch($lineid);
$saveprice = "savepriceIsNotSet";
$notrigger = 0;
$pos = 0;
$batch = '';
$eatby = \null;
$sellby = 0;
$qty = 0;
$price = '0';
$entrepot = 0;
$supplierorderdispatch = new \CommandeFournisseurDispatch($db);
$result = $supplierorderdispatch->fetch($lineid);
$supplierorderdispatch = new \CommandeFournisseurDispatch($db);
$result = $supplierorderdispatch->fetch($lineid);
/*
 * View
 */
$now = \dol_now();
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$warehouse_static = new \Entrepot($db);
$supplierorderdispatch = new \CommandeFournisseurDispatch($db);
$title = $object->ref . " - " . $langs->trans('OrderDispatch');
$help_url = 'EN:Module_Suppliers_Orders|FR:CommandeFournisseur|ES:Módulo_Pedidos_a_proveedores';
$morejs = array('/fourn/js/lib_dispatch.js.php');
$soc = new \Societe($db);
$author = new \User($db);
$head = \ordersupplier_prepare_head($object);
$title = $langs->trans("SupplierOrder");
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('lineid' => $lineid);
// Note that $action and $object may be modified by hook
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Supplier order card
$linkback = '<a href="' . \DOL_URL_ROOT . '/fourn/commande/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
$disabled = 0;
$listwarehouses = array();
// List of lines already dispatched
$sql = "SELECT p.rowid as pid, p.ref, p.label,";
$resql = $db->query($sql);