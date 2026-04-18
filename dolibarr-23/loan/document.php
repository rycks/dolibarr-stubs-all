<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$result = \restrictedArea($user, 'loan', $id, '', '');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Loan($db);
$upload_dir = $conf->loan->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'loan';
$permissiontoadd = $user->hasRight('loan', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_linkedfiles.inc.php
$morehtmlright = '';
/*
 * View
 */
$morehtmlright = '';
$form = new \Form($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("Loan") . ' - ' . $langs->trans("Documents");
$help_url = 'EN:Module_Loan|FR:Module_Emprunt';
$totalpaid = $object->getSumPayment();
$head = \loan_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/loan/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// To give a chance to dol_banner_tab to use already paid amount to show correct status
$morehtmlstatus = $morehtmlright;
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$modulepart = 'loan';
$permissiontoadd = $user->hasRight('loan', 'write');
$permtoedit = $user->hasRight('loan', 'write');
$param = '&id=' . $object->id;