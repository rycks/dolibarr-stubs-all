<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$id = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
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
$object = new \Evaluation($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->hrm->dir_output . '/temp/massgeneration/' . $user->id;
// Must be 'include', not 'include_once'. Include fetch and fetch_thirdparty but not fetch_optionals
$upload_dir = \null;
// Permissions
$permissiontoadd = $user->hasRight('hrm', 'evaluation', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_linkedfiles.inc.php
$permissiontoread = $user->hasRight('hrm', 'evaluation', 'read');
// Security check (enable the most restrictive one)
$isdraft = $object->status == \Evaluation::STATUS_DRAFT ? 1 : 0;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("Evaluation") . ' - ' . $langs->trans("Files");
$help_url = '';