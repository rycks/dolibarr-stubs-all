<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$id = \GETPOSTINT('socid') ? \GETPOSTINT('socid') : \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Security check - Protection if external user
// if ($user->socid > 0) accessforbidden();
// if ($user->socid > 0) $socid = $user->socid;
// restrictedArea($user, 'bom', $id);
// Load variables for pagination
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
$object = new \BOM($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = \getMultidirOutput($object) . '/temp/massgeneration/' . $user->id;
// Must be 'include', not 'include_once'. Include fetch and fetch_thirdparty but not fetch_optionals
$upload_dir = \null;
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$permissiontoadd = $user->hasRight('bom', 'write');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("BillOfMaterials") . ' - ' . $langs->trans("Files");
$help_url = 'EN:Module_BOM';
$morehtmlref = "";