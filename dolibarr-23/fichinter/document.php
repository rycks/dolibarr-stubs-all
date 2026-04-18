<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$result = \restrictedArea($user, 'ficheinter', $id, 'fichinter');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Fichinter($db);
$upload_dir = $conf->ficheinter->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'fichinter';
$permissiontoadd = $user->hasRight('ficheinter', 'creer');
/*
 * View
 */
$form = new \Form($db);
$head = \fichinter_prepare_head($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
// Intervention card
$linkback = '<a href="' . \DOL_URL_ROOT . '/fichinter/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$modulepart = 'ficheinter';
$permtoedit = $user->hasRight('ficheinter', 'creer');
$param = '&id=' . $object->id;