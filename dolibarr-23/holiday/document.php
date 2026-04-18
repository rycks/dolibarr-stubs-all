<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$childids = $user->getAllChildIds(1);
$morefilter = '';
$object = new \Holiday($db);
$extrafields = new \ExtraFields($db);
$permissiontoapprove = $user->hasRight('holiday', 'approve');
// Check current user can read this leave request
$canread = 0;
$upload_dir = $conf->holiday->multidir_output[$object->entity ?? $conf->entity] . '/' . \get_exdir(0, 0, 0, 1, $object, '');
$modulepart = 'holiday';
$result = \restrictedArea($user, 'holiday', $object->id, 'holiday');
$permissiontoadd = $user->hasRight('holiday', 'write');
/*
 * View
 */
$form = new \Form($db);
$listhalfday = array('morning' => $langs->trans("Morning"), "afternoon" => $langs->trans("Afternoon"));
$title = $langs->trans("Leave") . ' - ' . $langs->trans("Files");
$help_url = 'EN:Module_Holiday';
$valideur = new \User($db);
$userRequest = new \User($db);
$head = \holiday_prepare_head($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$linkback = '<a href="' . \DOL_URL_ROOT . '/holiday/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$typeleaves = $object->getTypes(1, -1);
$starthalfday = $object->halfday == -1 || $object->halfday == 2 ? 'afternoon' : 'morning';
$endhalfday = $object->halfday == 1 || $object->halfday == 2 ? 'morning' : 'afternoon';
$htmlhelp = $langs->trans('NbUseDaysCPHelp');
$includesaturday = \getDolGlobalInt('MAIN_NON_WORKING_DAYS_INCLUDE_SATURDAY', 1);
$includesunday = \getDolGlobalInt('MAIN_NON_WORKING_DAYS_INCLUDE_SUNDAY', 1);
$permissiontoadd = $user->hasRight('holiday', 'write');
$permtoedit = $user->hasRight('holiday', 'write');
$param = '&id=' . $object->id;
$relativepathwithnofile = \get_exdir(0, 0, 0, 1, $object, '') . '/';
$savingdocmask = \dol_sanitizeFileName($object->ref) . '-__file__';