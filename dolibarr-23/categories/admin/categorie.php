<?php

$action = \GETPOST('action', 'aZ09');
/*
 *	Actions
 */
$reg = array();
$code = $reg[1];
$code = $reg[1];
/*
 * View
 */
$help_url = 'EN:Module Categories|FR:Module Catégories|ES:Módulo Categorías|DE:Modul_Kategorien';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \categoriesadmin_prepare_head();
$form = new \Form($db);