<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
// Get parameters
$socid = \GETPOSTINT("socid");
$backtopage = \GETPOST('backtopage', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$section = \GETPOST("section", 'alpha');
$urlfile = (string) \dol_sanitizePathName(\GETPOST("urlfile"));
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
$permissionnote = $user->hasRight('ecm', 'setup');
// Used by the include of actions_setnotes.inc.php
$permissiontoread = $user->hasRight('ecm', 'read');
$form = new \Form($db);
$head = \ecm_file_prepare_head($object);
$s = '';
$tmpecmdir = new \EcmDirectory($db);
$result = 1;
$i = 0;
$urlfiletoshow = \preg_replace('/\\.noexe$/', '', $urlfile);
$s = \img_picto('', 'object_dir') . ' <a href="' . \DOL_URL_ROOT . '/ecm/index.php">' . $langs->trans("ECMRoot") . '</a> -> ' . $s . ' -> ';
$linkback = '';
$cssclass = "titlefield";
$moreparam = '&amp;section=' . $section . '&amp;urlfile=' . $urlfile;