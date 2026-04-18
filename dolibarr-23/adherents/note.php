<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alphanohtml');
// Initialize objects
$object = new \Adherent($db);
$result = $object->fetch($id);
$permissionnote = $user->hasRight('adherent', 'creer');
// Load member
$result = $object->fetch($id, $ref);
// Define variables to know what current user can do on users
$canadduser = $user->admin || $user->hasRight('user', 'user', 'creer');
// Define variables to determine what the current user can do on the members
$canaddmember = $user->hasRight('adherent', 'creer');
// Security check
$result = \restrictedArea($user, 'adherent', $object->id, '', '', 'socid', 'rowid', 0);
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $langs->trans("Member") . " - " . $langs->trans("Note");
$help_url = "EN:Module_Foundations|FR:Module_Adh&eacute;rents|ES:M&oacute;dulo_Miembros|DE:Modul_Mitglieder";
$form = new \Form($db);
$head = \member_prepare_head($object);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/adherents/list.php', ['restore_lastsearch_values' => 1]) . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/adherents/vcard.php', ['id' => $object->id]) . '" class="refid">';
$cssclass = 'titlefield';
$permission = $user->hasRight('adherent', 'creer');