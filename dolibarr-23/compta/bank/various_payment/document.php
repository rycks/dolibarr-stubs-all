<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Security check
$socid = \GETPOSTINT("socid");
$result = \restrictedArea($user, 'banque', '', '', '');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \PaymentVarious($db);
$upload_dir = $conf->bank->dir_output . '/' . \dol_sanitizeFileName((string) $object->id);
$modulepart = 'banque';
$permissiontoadd = $user->hasRight('banque', 'modifier');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("VariousPayment") . ' - ' . $langs->trans("Documents");
$help_url = '';
$head = \various_payment_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/bank/various_payment/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlstatus = '';
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$modulepart = 'banque';
$permissiontoadd = $user->hasRight('banque', 'modifier');
$param = '&id=' . $object->id;