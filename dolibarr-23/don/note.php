<?php

$id = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('facid');
// For backward compatibility
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$projectid = \GETPOST('projectid') ? \GETPOSTINT('projectid') : 0;
$object = new \Don($db);
// Security check
$socid = 0;
$result = \restrictedArea($user, 'don', $object->id, '');
$permissiontoadd = $user->hasRight('don', 'creer');
$permissionnote = $user->hasRight('don', 'creer');
// Used by the include of actions_setnotes.inc.php
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$title = $langs->trans('Donation') . " - " . $langs->trans('Notes');
$help_url = 'EN:Module_Donations|FR:Module_Dons|ES:M&oacute;dulo_Donaciones|DE:Modul_Spenden';
$form = new \Form($db);
$formproject = \null;
$object = new \Don($db);
$head = \donation_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/don/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$cssclass = "titlefield";