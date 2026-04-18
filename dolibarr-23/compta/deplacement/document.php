<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Deplacement($db);
$upload_dir = $conf->deplacement->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'trip';
$result = \restrictedArea($user, 'deplacement', $id, '');
$permissiontoadd = $user->hasRight('deplacement', 'creer');
/*
 * View
 */
$form = new \Form($db);