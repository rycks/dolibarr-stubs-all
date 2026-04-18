<?php

$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$object = new \Contact($db);
$result = \restrictedArea($user, 'contact', $id, 'socpeople&societe');
$permissionnote = $user->hasRight('societe', 'creer');
// Used by the include of actions_setnotes.inc.php
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$now = \dol_now();
$title = $langs->trans("ContactNotes");
$form = new \Form($db);
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$head = \contact_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/contact/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/contact/vcard.php?id=' . $object->id . '" class="refid">';
$cssclass = 'titlefield';
$cssclass = "titlefield";