<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Reception($db);
$upload_dir = $conf->reception->dir_output . "/" . \dol_sanitizeFileName($object->ref);
$result = \restrictedArea($user, 'reception', $object->id, '');
$form = new \Form($db);