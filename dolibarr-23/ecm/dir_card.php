<?php

$action = \GETPOST('action', 'alpha');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$module = \GETPOST('module', 'alpha');
$website = \GETPOST('website', 'alpha');
$pageid = \GETPOSTINT('pageid');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$section = \GETPOST("section", 'alpha') ? \GETPOST("section", 'alpha') : \GETPOST("relativedir", 'alpha');
// Load ecm object
$ecmdir = new \EcmDirectory($db);
// $section should be an int except if it is dir not yet created into EcmDirectory
$result = \preg_match('/^\\d+$/', $section) ? $ecmdir->fetch((int) $section) : 0;
// Permissions
$permissiontoread = 0;
$permissiontoadd = 0;
$permissiontoupload = 0;
$file = $upload_dir . "/" . \GETPOST('urlfile');
// Do not use urldecode here
$ret = \dol_delete_file($file);
$result = $ecmdir->changeNbOfFiles('-');
$backtourl = \DOL_URL_ROOT . "/ecm/index.php";
$deletedirrecursive = \GETPOST('deletedirrecursive', 'alpha') == 'on' ? 1 : 0;
$error = 0;
$oldlabel = '';
/*
 * View
 */
$form = new \Form($db);
$formecm = new \FormEcm($db);
$object = new \EcmDirectory($db);
// Need to create a new one instance
$extrafields = new \ExtraFields($db);
// Built the file List
$filearrayall = \dol_dir_list($upload_dir, "all", 0, '', '', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$head = \ecm_prepare_head($ecmdir, $module, $section);
$morehtml = '';
$morehtmlref = '/' . $module . '/' . $relativepath;
$s = '';
$result = 1;
$i = 0;
$tmpecmdir = new \EcmDirectory($db);
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/ecm/index.php">' . $langs->trans("ECMRoot") . '</a> -> ' . $s;
$nbofiles = \count($filearray);
$relativepathwithoutslash = \preg_replace('/[\\/]$/', '', $relativepath);
$formquestion = [];