<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$result = \restrictedArea($user, 'resource', $id, 'resource');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Dolresource($db);
// Must be 'include', not 'include_once'.
$upload_dir = $conf->resource->dir_output . '/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'resource';
$result = \restrictedArea($user, 'resource', $object->id, 'resource');
$permissiontoadd = $user->hasRight('resource', 'write');
/*
 * View
 */
$form = new \Form($db);
$help_url = '';