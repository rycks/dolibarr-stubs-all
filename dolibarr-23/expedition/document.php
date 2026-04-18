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
$object = new \Expedition($db);
$typeobject = \null;
$upload_dir = $conf->expedition->dir_output . "/sending/" . \dol_sanitizeFileName($object->ref);
$result = \restrictedArea($user, 'expedition', $object->id, '');
$permissiontoadd = $user->hasRight('expedition', 'creer');
$form = new \Form($db);