<?php

$extrafields = new \ExtraFields($db);
$form = new \Form($db);
// List of supported format
$type2label = \ExtraFields::getListOfTypesLabels();
$action = \GETPOST('action', 'aZ09');
$attrname = \GETPOST('attrname', 'alpha');
$elementtype = 'product_fournisseur_price';
/*
 * View
 */
$title = $langs->trans('ProductServiceSetup');
$textobject = $langs->transnoentitiesnoconv("ProductsAndServices");
//$help_url='EN:Module Third Parties setup|FR:Paramétrage_du_module_Tiers';
$help_url = '';
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \product_admin_prepare_head();