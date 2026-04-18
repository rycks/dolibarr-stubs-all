<?php

$socid = 0;
$id = \GETPOSTINT('id');
$label = \GETPOST('label', 'alpha');
$result = \restrictedArea($user, 'categorie', $id, '&category');
$object = new \Categorie($db);
$result = $object->fetch($id, $label);
$type = $object->type;
/*
 * View
 */
$form = new \Form($db);
//$object->info($object->id);
$title = $langs->trans("Categories");
$head = \categories_prepare_head($object, $type);
$backtolist = \GETPOST('backtolist') ? \GETPOST('backtolist') : \DOL_URL_ROOT . '/categories/categorie_list.php?leftmenu=cat&type=' . \urlencode($type);
$linkback = '<a href="' . \dol_sanitizeUrl($backtolist) . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<br><div class="refidno"><a href="' . \DOL_URL_ROOT . '/categories/categorie_list.php?leftmenu=cat&type=' . \urlencode($type) . '">' . $langs->trans("Root") . '</a> >> ';
$ways = $object->print_all_ways("auto", '', 1);