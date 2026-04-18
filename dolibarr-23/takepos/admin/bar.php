<?php

$res = 0;
/*
 * Actions
 */
$error = 0;
$suplement_category = \GETPOST('TAKEPOS_SUPPLEMENTS_CATEGORY', 'alpha');
$res = \dolibarr_set_const($db, "TAKEPOS_SUPPLEMENTS_CATEGORY", $suplement_category, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$arrayofjs = array();
$arrayofcss = array("/takepos/css/colorbox.css");
$linkback = '<a href="' . \DOL_URL_ROOT . '/admin/system/database.php?restore_lastsearch_values=1">' . \img_picto($langs->trans("GoBack"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("GoBack") . '</span></a>';
$head = \takepos_admin_prepare_head();