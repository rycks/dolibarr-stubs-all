<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$projectid = \GETPOST('projectid') ? \GETPOSTINT('projectid') : 0;
$object = new \Don($db);
$result = \restrictedArea($user, 'don', $object->id);
$permissiontoadd = $user->hasRight('don', 'creer');
/*
 * View
 */
$title = $langs->trans('Donation') . " - " . $langs->trans('Info');
$help_url = 'EN:Module_Donations|FR:Module_Dons|ES:M&oacute;dulo_Donaciones|DE:Modul_Spenden';
$formproject = \null;
$form = new \Form($db);
$head = \donation_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/don/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';