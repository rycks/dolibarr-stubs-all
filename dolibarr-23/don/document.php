<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$projectid = \GETPOST('projectid') ? \GETPOSTINT('projectid') : 0;
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$formproject = \null;
$object = new \Don($db);
$upload_dir = \null;
$modulepart = 'don';
$result = \restrictedArea($user, 'don', $object->id);
$permissiontoadd = $user->hasRight('don', 'creer');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('Donation') . " - " . $langs->trans('Documents');
$help_url = 'EN:Module_Donations|FR:Module_Dons|ES:M&oacute;dulo_Donaciones|DE:Modul_Spenden';
$head = \donation_prepare_head($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$linkback = '<a href="' . \DOL_URL_ROOT . '/don/list.php' . (!empty($socid) ? '?socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$modulepart = 'don';
$permissiontoadd = $user->hasRight('don', 'creer');
$permtoedit = $user->hasRight('don', 'creer');
$param = '&id=' . $object->id;