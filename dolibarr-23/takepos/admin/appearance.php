<?php

/*
 * Actions
 */
$error = 0;
$res = \dolibarr_set_const($db, "TAKEPOS_COLOR_THEME", \GETPOST('TAKEPOS_COLOR_THEME', 'alpha'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "TAKEPOS_LINES_TO_SHOW", \GETPOST('TAKEPOS_LINES_TO_SHOW', 'alpha'), 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$linkback = '<a href="' . \DOL_URL_ROOT . '/admin/system/database.php?restore_lastsearch_values=1">' . \img_picto($langs->trans("GoBack"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("GoBack") . '</span></a>';
$head = \takepos_admin_prepare_head();
$array = array(0 => "Eldy", 1 => $langs->trans("Colorful"));
$array = array("0" => $langs->trans("Label"), 1 => $langs->trans("Ref") . '+' . $langs->trans("Label"), 2 => $langs->trans("Ref"));
$array = array(1 => "1", 2 => "2", 3 => "3", 4 => "4", 5 => "5", 6 => "6");