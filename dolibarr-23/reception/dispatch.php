<?php

// Security check
$id = \GETPOSTINT("id");
$ref = \GETPOST('ref');
$lineid = \GETPOSTINT('lineid');
$action = \GETPOST('action', 'aZ09');
$fk_default_warehouse = \GETPOSTINT('fk_default_warehouse');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$error = 0;
$errors = array();
// Recuperation de l'id de projet
$projectid = 0;
$object = new \Reception($db);
$result = $object->fetch($id, $ref);
$result = $object->fetch_thirdparty();
// $id is id of a reception
$result = \restrictedArea($user, 'reception', $object->id);
$usercancreate = $user->hasRight('reception', 'creer');
$permissiontoadd = $usercancreate;
// Used by the include of actions_addupdatedelete.inc.php
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$supplierorderdispatch = new \CommandeFournisseurDispatch($db);
$pos = 0;
/*
 * View
 */
$now = \dol_now();
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$warehouse_static = new \Entrepot($db);
$supplierorderdispatch = new \CommandeFournisseurDispatch($db);
$title = $object->ref . " - " . $langs->trans('ReceptionDistribution');
$help_url = 'EN:Module_Suppliers_Orders|FR:CommandeFournisseur|ES:Módulo_Pedidos_a_proveedores';
$morejs = array('/fourn/js/lib_dispatch.js.php');
$numline = 0;
$typeobject = '';
$soc = new \Societe($db);
$author = new \User($db);
$head = \reception_prepare_head($object);
$title = $langs->trans("SupplierOrder");
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('lineid' => $lineid);
// Note that $action and $object may be modified by hook
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Reception card
$linkback = '<a href="' . \DOL_URL_ROOT . '/reception/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$disabled = 0;
// This is used to disable or not the bulk selection of target warehouse. No reason to have it disabled so forced to 0.
$nbproduct = 0;