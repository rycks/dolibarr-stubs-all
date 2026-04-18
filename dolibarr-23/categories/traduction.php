<?php

$id = \GETPOSTINT('id');
$label = \GETPOST('label', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$langtodelete = \GETPOST('langtodelete', 'alpha');
$object = new \Categorie($db);
$result = $object->fetch($id, $label);
$type = $object->type;
// Security check
$result = \restrictedArea($user, 'categorie', $id, '&category');
$permissiontoadd = $user->hasRight('categorie', 'creer');
/*
 * Actions
 */
$error = 0;
$res = $object->delMultiLangs($langtodelete, $user);
$action = '';
$current_lang = $langs->getDefaultLang();
// check parameters
$forcelangprod = \GETPOST('forcelangprod', 'alpha');
$libelle = \GETPOST('libelle', 'alpha');
$desc = \GETPOST('desc', 'restricthtml');
$current_lang = $langs->getDefaultLang();
/*
 * View
 */
$form = new \Form($db);
$formadmin = new \FormAdmin($db);
$formother = new \FormOther($db);
$title = $langs->trans("Categories");
$head = \categories_prepare_head($object, $type);
// Calculate $cnt_trans
$cnt_trans = 0;
$backtolist = \GETPOST('backtolist') ? \GETPOST('backtolist') : \DOL_URL_ROOT . '/categories/categorie_list.php?leftmenu=cat&type=' . \urlencode($type);
$linkback = '<a href="' . \dol_sanitizeUrl($backtolist) . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<br><div class="refidno"><a href="' . \DOL_URL_ROOT . '/categories/categorie_list.php?leftmenu=cat&type=' . $type . '">' . $langs->trans("Root") . '</a> >> ';
$ways = $object->print_all_ways("auto", '', 1);