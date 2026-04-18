<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$typeobject = \null;
$object = new \Expedition($db);
$objectsrc = clone $object;
$result = \restrictedArea($user, 'expedition', $object->id, '');
/*
 * Actions
 */
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$help_url = 'EN:Module_Shipments|FR:Module_Expéditions|ES:M&oacute;dulo_Expediciones|DE:Modul_Lieferungen';
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$formother = new \FormOther($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$head = \shipping_prepare_head($object);
// Shipment card
$linkback = '<a href="' . \DOL_URL_ROOT . '/expedition/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Contacts lines (modules that overwrite templates must declare this into descriptor)
$dirtpls = \array_merge($conf->modules_parts['tpl'], array('/core/tpl'));
$preselectedtypeofcontact = \dol_getIdFromCode($db, 'SHIPPING', 'c_type_contact', 'code', 'rowid');