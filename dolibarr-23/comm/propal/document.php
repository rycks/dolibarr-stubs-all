<?php

$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Propal($db);
$permissiontoadd = $user->hasRight('propal', 'creer');
// Security check
$socid = '';
$usercancreate = $user->hasRight("propal", "creer");
/*
 * View
 */
$title = $object->ref . " - " . $langs->trans('Documents');
$help_url = 'EN:Commercial_Proposals|FR:Proposition_commerciale|ES:Presupuestos';
$form = new \Form($db);
$upload_dir = $conf->propal->multidir_output[$object->entity ?? $conf->entity] . '/' . \dol_sanitizeFileName($object->ref);
$head = \propal_prepare_head($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
// Proposal card
$linkback = '<a href="' . \DOL_URL_ROOT . '/comm/propal/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$modulepart = 'propal';
$permissiontoadd = $user->hasRight('propal', 'creer');
$permtoedit = $user->hasRight('propal', 'creer');
$param = '&id=' . $object->id;