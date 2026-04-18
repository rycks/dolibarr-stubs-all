<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$label = \GETPOST('label', 'alphanohtml');
$projectid = \GETPOSTINT('projectid') ? \GETPOSTINT('projectid') : \GETPOSTINT('fk_project');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Salary($db);
$extrafields = new \ExtraFields($db);
$childids = $user->getAllChildIds(1);
// Check current user can read this salary
$canread = 0;
$upload_dir = $conf->salaries->dir_output . '/' . \dol_sanitizeFileName((string) $object->id);
$modulepart = 'salaries';
// Security check
$socid = \GETPOSTINT('socid');
$permissiontoread = $user->hasRight('salaries', 'read');
$permissiontoadd = $user->hasRight('salaries', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('salaries', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_UNPAID;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('Salary') . " - " . $langs->trans('Documents');
$help_url = "";
$head = \salaries_prepare_head($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$linkback = '<a href="' . \DOL_URL_ROOT . '/salaries/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$userstatic = new \User($db);
$usercancreate = $permissiontoadd;
$totalpaid = $object->getSommePaiement();
$modulepart = 'salaries';
// $permissiontoadd = $permissiontoadd;
$param = '&id=' . $object->id;