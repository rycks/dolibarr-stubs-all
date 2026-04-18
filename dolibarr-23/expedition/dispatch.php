<?php

$is_mod_batch_enabled = \isModEnabled('productbatch');
$is_eat_by_enabled = !\getDolGlobalInt('PRODUCT_DISABLE_EATBY');
$is_sell_by_enabled = !\getDolGlobalInt('PRODUCT_DISABLE_SELLBY');
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
$object = new \Expedition($db);
$objectorder = new \Commande($db);
$result = $object->fetch($id, $ref);
$result = $object->fetch_thirdparty();
// $id is id of a purchase order.
$result = \restrictedArea($user, 'expedition', $object, '');
$usercancreate = $user->hasRight('expedition', 'creer');
$permissiontoadd = $usercancreate;
// Used by the include of actions_addupdatedelete.inc.php
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$now = \dol_now();
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$warehouse_static = new \Entrepot($db);
$title = $object->ref . " - " . $langs->trans('ShipmentDistribution');
$help_url = 'EN:Module_Shipments|FR:Module_Expéditions|ES:M&oacute;dulo_Expediciones|DE:Modul_Lieferungen';
$morejs = array('/expedition/js/lib_dispatch.js.php');
$typeobject = \null;
$lines = $object->lines;
// This is an array of detail of line, on line per source order line found intolines[]->fk_elementdet, then each line may have sub data
//var_dump($lines[0]->fk_elementdet); exit;
$num_prod = \count($lines);
$soc = new \Societe($db);
$author = new \User($db);
$head = \shipping_prepare_head($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('lineid' => $lineid);
// Note that $action and $object may be modified by hook
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Shipment card
$linkback = '<a href="' . \DOL_URL_ROOT . '/expedition/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$disabled = 0;