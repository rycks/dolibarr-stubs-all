<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$object = new \Expedition($db);
$typeobject = \null;
$upload_dir = $conf->expedition->dir_output . "/sending/" . \dol_sanitizeFileName($object->ref);
$permissionnote = $user->hasRight('expedition', 'creer');
$result = \restrictedArea($user, 'expedition', $object->id, '');
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
$form = new \Form($db);
$head = \shipping_prepare_head($object);
// Shipment card
$linkback = '<a href="' . \DOL_URL_ROOT . '/expedition/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = 'titlefield';