<?php

$result = \restrictedArea($user, 'ecm', '');
// Get parameters
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$section = \GETPOST('section');
$module = \GETPOST('module', 'alpha');
$website = \GETPOST('website', 'alpha');
$pageid = \GETPOSTINT('pageid');
$upload_dir = $conf->ecm->dir_output . '/' . $section;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$ecmdir = new \EcmDirectory($db);
$result = $ecmdir->fetch((int) $section);
$permissiontoread = $user->hasRight('ecm', 'read');
$form = new \Form($db);
$ecmdirstatic = new \EcmDirectory($db);
$userstatic = new \User($db);
// Ajout rubriques automatiques
$rowspan = 0;
$sectionauto = array();
// Tool bar
$head = \ecm_prepare_head_fm($ecmdir);
$buthtml = '<td rowspan="' . $rowspan . '"><input type="submit" value="' . $langs->trans("Search") . '" class="button"></td>';
$butshown = 0;
// Right area
$relativepath = $ecmdir->getRelativePath();
$upload_dir = $conf->ecm->dir_output . '/' . $relativepath;
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$formfile = new \FormFile($db);
$param = '&section=' . \urlencode($section);
$textifempty = $section ? $langs->trans("NoFileFound") : $langs->trans("ECMSelectASection");