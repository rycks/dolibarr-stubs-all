<?php

\define('DISABLE_JS_GRAPH', 1);
// Get parameters
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'alpha');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$module = \GETPOST('module', 'alpha');
$website = \GETPOST('website', 'alpha');
$pageid = \GETPOSTINT('pageid');
$section = $urlsection = \GETPOST('section', 'alpha');
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
// Permissions
$permissiontoadd = 0;
$permissiontodelete = 0;
$permissiontoupload = 0;
$ref = (string) \GETPOST("ref", 'alpha');
$label = \dol_sanitizeFileName(\GETPOST("label", 'alpha'));
$desc = (string) \GETPOST("desc", 'alpha');
$catParent = \GETPOST("catParent", 'alpha');
$error = 0;
$form = new \Form($db);
$formecm = new \FormEcm($db);
$title = $langs->trans("ECMNewSection");