<?php

$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$module = \GETPOST('module', 'alpha');
// Get parameters
$socid = \GETPOSTINT("socid");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$section = \GETPOST("section", 'alpha');
$urlfile = (string) \dol_sanitizePathName(\GETPOST("urlfile"), '_', 0);
// Load ecm object
$ecmdir = new \EcmDirectory($db);
$result = $ecmdir->fetch(\GETPOSTINT("section"));
$relativepath = $ecmdir->getRelativePath();
$upload_dir = $conf->ecm->dir_output . '/' . $relativepath;
$fullpath = $conf->ecm->dir_output . '/' . $relativepath . $urlfile;
$relativetodocument = 'ecm/' . $relativepath;
// $relativepath is relative to ECM dir, we need relative to document
$filepath = $relativepath . $urlfile;
$filepathtodocument = $relativetodocument . $urlfile;
// Try to load object from index
$object = new \EcmFiles($db);
$extrafields = new \ExtraFields($db);
$result = $object->fetch(0, '', $filepathtodocument);
// Permissions
$permissiontoread = $user->hasRight('ecm', 'read');
$permissiontoadd = $user->hasRight('ecm', 'setup');
$permissiontoupload = $user->hasRight('ecm', 'upload');
$action = '';
$error = 0;
$oldlabel = \GETPOST('urlfile', 'alpha');
$newlabel = \dol_sanitizeFileName(\GETPOST('label', 'alpha'), '_', 0);
$shareenabled = \GETPOST('shareenabled', 'alpha');
//$db->begin();
$olddir = $ecmdir->getRelativePath(0);
// Relative to ecm
$olddirrelativetodocument = 'ecm/' . $olddir;
// Relative to document
$newdirrelativetodocument = 'ecm/' . $olddir;
$olddir = $conf->ecm->dir_output . '/' . $olddir;
$newdir = $olddir;
$oldfile = $olddir . $oldlabel;
$newfile = $newdir . $newlabel;
$newfileformove = $newfile;
/*
 * View
 */
$form = new \Form($db);
$head = \ecm_file_prepare_head($object);
$s = '';
$tmpecmdir = new \EcmDirectory($db);
$result = 1;
$i = 0;
$urlfiletoshow = \preg_replace('/\\.noexe$/', '', $urlfile);
$s = \img_picto('', 'object_dir') . ' <a href="' . \DOL_URL_ROOT . '/ecm/index.php">' . $langs->trans("ECMRoot") . '</a> -> ' . $s . ' -> ';
$linkback = '';
$object = new \EcmFiles($db);
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
$modulepart = 'ecm';
$rellink = '/document.php?modulepart=' . $modulepart . '&attachment=1';
$fulllink = $urlwithroot . $rellink;