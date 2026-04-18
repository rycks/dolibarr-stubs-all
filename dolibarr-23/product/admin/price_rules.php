<?php

$action = \GETPOST('action', 'aZ09');
$error = 0;
$var_percent = \GETPOST('var_percent', 'array');
$var_min_percent = \GETPOST('var_min_percent', 'array');
$fk_level = \GETPOST('fk_level', 'array');
$produit_multiprices_limit = \getDolGlobalInt('PRODUIT_MULTIPRICES_LIMIT');
/*
 * View
 */
$sql = "SELECT rowid, level, fk_level, var_percent, var_min_percent";
$query = $db->query($sql);
$rules = array();
$title = $langs->trans('ProductServiceSetup');
$tab = $langs->trans("ProductsAndServices");
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \product_admin_prepare_head();
// Array that contains the number of prices available
$price_options = array();
$produit_multiprices_limit = \getDolGlobalInt('PRODUIT_MULTIPRICES_LIMIT');