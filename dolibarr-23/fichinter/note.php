<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'ficheinter', $id, 'fichinter');
$object = new \Fichinter($db);
$permissionnote = $user->hasRight('ficheinter', 'creer');
// Used by the include of actions_setnotes.inc.php
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
$form = new \Form($db);
$head = \fichinter_prepare_head($object);
// Intervention card
$linkback = '<a href="' . \DOL_URL_ROOT . '/fichinter/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = "titlefield";