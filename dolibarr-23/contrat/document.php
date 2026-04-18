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
$object = new \Contrat($db);
$upload_dir = $conf->contrat->multidir_output[$object->entity ?? $conf->entity] . '/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'contract';
$permissiontoadd = $user->hasRight('contrat', 'creer');
// Used by the include of actions_dellink.inc.php
$result = \restrictedArea($user, 'contrat', $object->id);
/*
 *
 */
$form = new \Form($db);
$title = $langs->trans("Contract");
$help_url = 'EN:Module_Contracts|FR:Module_Contrat';
$head = \contract_prepare_head($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
// Contract card
$linkback = '<a href="' . \DOL_URL_ROOT . '/contrat/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '';
$modulepart = 'contract';
$permissiontoadd = $user->hasRight('contrat', 'creer');
$permtoedit = $user->hasRight('contrat', 'creer');
$param = '&id=' . $object->id;