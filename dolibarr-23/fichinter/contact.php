<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$result = \restrictedArea($user, 'ficheinter', $id, 'fichinter');
$object = new \Fichinter($db);
$result = $object->fetch($id, $ref);
$usercancreate = $user->hasRight('ficheinter', 'creer');
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$formproject = new \FormProjets($db);
$head = \fichinter_prepare_head($object);
// Intervention card
$linkback = '<a href="' . \DOL_URL_ROOT . '/fichinter/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Contacts lines (modules that overwrite templates must declare this into descriptor)
$dirtpls = \array_merge($conf->modules_parts['tpl'], array('/core/tpl'));