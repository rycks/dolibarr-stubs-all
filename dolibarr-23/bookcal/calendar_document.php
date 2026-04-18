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
$object = new \Calendar($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->bookcal->dir_output . '/temp/massgeneration/' . $user->id;
$upload_dir = \null;
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$enablepermissioncheck = 0;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("Calendar") . ' - ' . $langs->trans("Files");
$help_url = '';