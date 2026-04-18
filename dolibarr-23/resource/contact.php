<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$object = new \Dolresource($db);
$result = \restrictedArea($user, 'resource', $object->id, 'resource');
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$help_url = '';
$head = \resource_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/resource/list.php' . (!empty($socid) ? '?id=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$permission = 1;