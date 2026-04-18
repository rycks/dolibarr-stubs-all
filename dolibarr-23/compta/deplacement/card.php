<?php

// Security check
$id = \GETPOSTINT('id');
$result = \restrictedArea($user, 'deplacement', $id, '');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$object = new \Deplacement($db);
$permissionnote = $user->hasRight('deplacement', 'creer');
$form = new \Form($db);
$datec = \dol_mktime(12, 0, 0, \GETPOSTINT('remonth'), \GETPOSTINT('reday'), \GETPOSTINT('reyear'));
$doleditor = new \DolEditor('note_public', \GETPOST('note_public', 'restricthtml'), '', 200, 'dolibarr_notes', 'In', \false, \true, !\getDolGlobalString('FCKEDITOR_ENABLE_NOTE_PUBLIC') ? 0 : 1, \ROWS_8, '90%');
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);