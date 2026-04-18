<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$id = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
//if (! $sortfield) $sortfield="position_name";
// Initialize a technical objects
$object = new \Partnership($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->partnership->dir_output . '/temp/massgeneration/' . $user->id;
// Must be 'include', not 'include_once'. Include fetch and fetch_thirdparty but not fetch_optionals
$upload_dir = $conf->partnership->multidir_output[$object->entity ?: $conf->entity] . "/partnership/" . \get_exdir(0, 0, 0, 1, $object);
$permissiontoread = $user->hasRight('partnership', 'read');
$permissiontoadd = $user->hasRight('partnership', 'write');
// Used by the include of actions_addupdatedelete.inc.php
$managedfor = \getDolGlobalString('PARTNERSHIP_IS_MANAGED_FOR', 'thirdparty');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("Partnership") . ' - ' . $langs->trans("Files");
$help_url = '';