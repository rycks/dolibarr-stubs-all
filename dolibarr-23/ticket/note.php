<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'ticket', $id, 'ticket');
$object = new \Ticket($db);
$permissiontoadd = $user->hasRight('ticket', 'write');
$permissionnote = $user->hasRight('ticket', 'write');
// Used by the include of actions_setnotes.inc.php
// Store current page url
$url_page_current = \DOL_URL_ROOT . '/ticket/document.php';
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
$form = new \Form($db);
$head = \ticket_prepare_head($object);
// Ticket card
$linkback = '<a href="' . \DOL_URL_ROOT . '/ticket/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = "titlefield";