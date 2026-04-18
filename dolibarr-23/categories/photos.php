<?php

$id = \GETPOSTINT('id');
$label = \GETPOST('label', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$object = new \Categorie($db);
$result = $object->fetch($id, $label);
$type = $object->type;
$upload_dir = $conf->categorie->multidir_output[$object->entity ?? $conf->entity];
// Security check
$result = \restrictedArea($user, 'categorie', $id, '&category');
$permissiontoadd = $user->hasRight('categorie', 'creer');
/*
 * Actions
 */
$parameters = array('id' => $id, 'label' => $label, 'confirm' => $confirm, 'type' => $type, 'uploaddir' => $upload_dir, 'sendfile' => \GETPOST("sendit") ? \true : \false);
// Note that $action and $object may be modified by some hooks
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$form = new \Form($db);
$formother = new \FormOther($db);
$title = $langs->trans("Categories");
$head = \categories_prepare_head($object, $type);
$backtolist = \GETPOST('backtolist') ? \GETPOST('backtolist') : \DOL_URL_ROOT . '/categories/categorie_list.php?leftmenu=cat&type=' . \urlencode($type);
$linkback = '<a href="' . \dol_sanitizeUrl($backtolist) . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<br><div class="refidno"><a href="' . \DOL_URL_ROOT . '/categories/categorie_list.php?leftmenu=cat&type=' . $type . '">' . $langs->trans("Root") . '</a> >> ';
$ways = $object->print_all_ways("auto", '', 1);