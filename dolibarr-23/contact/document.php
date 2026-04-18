<?php

// Get parameters
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$object = new \Contact($db);
$objcanvas = \null;
$canvas = !empty($object->canvas) ? $object->canvas : \GETPOST("canvas");
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT('page');
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$upload_dir = $conf->societe->multidir_output[$object->entity ?? $conf->entity] . '/contact/' . \dol_sanitizeFileName($object->ref);
$modulepart = 'contact';
$result = \restrictedArea($user, 'contact', $id, 'socpeople&societe', '', '', 'rowid', 0);
// If we create a contact with no company (shared contacts), no check on write permission
$permissiontoadd = $user->hasRight('societe', 'contact', 'creer');
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("ContactLinkedFiles");
$help_url = 'EN:Module_Third_Parties|FR:Module_Tiers|ES:Empresas';
$head = \contact_prepare_head($object);
$title = \getDolGlobalString('SOCIETE_ADDRESSES_MANAGEMENT') ? $langs->trans("Contacts") : $langs->trans("ContactsAddresses");
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$linkback = '<a href="' . \DOL_URL_ROOT . '/contact/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<a href="' . \DOL_URL_ROOT . '/contact/vcard.php?id=' . $object->id . '" class="refid">';
$modulepart = 'contact';
$permissiontoadd = $user->hasRight('societe', 'contact', 'creer');
$permtoedit = $user->hasRight('societe', 'contact', 'creer');
$param = '&id=' . $object->id;