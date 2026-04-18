<?php

// Get parameters
$id = \GETPOST('id') ? \GETPOSTINT('id') : \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
// Initialize objects
$object = new \Societe($db);
// Permissions
$permissionnote = $user->hasRight('societe', 'creer');
$result = \restrictedArea($user, 'societe', $object->id, '&societe');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans("ThirdParty") . ' - ' . $langs->trans("Notes");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
/*
 * Show tabs
 */
$head = \societe_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$cssclass = 'titlefield';