<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$id = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Initialize objects
$object = new \Societe($db);
$upload_dir = \null;
$permissiontoadd = $user->hasRight('societe', 'creer');
$result = \restrictedArea($user, 'societe', $object->id, '&societe');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("ThirdParty") . ' - ' . $langs->trans("Files");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
// Show tabs
$head = \societe_prepare_head($object);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$linkback = '<a href="' . \DOL_URL_ROOT . '/societe/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$tmpcheck = $object->check_codeclient();
$tmpcheck = $object->check_codefournisseur();
$modulepart = 'company';
$permissiontoadd = $user->hasRight('societe', 'creer');
$permtoedit = $user->hasRight('societe', 'creer');
$param = '&id=' . $object->id;
$relativepathwithnofile = $object->id . '/';