<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'product';
// Pricing Rules
$select_pricing_rules = array(
    'PRODUCT_PRICE_UNIQ' => array('label' => $langs->trans('PriceCatalogue')),
    // Unique price
    'PRODUIT_MULTIPRICES' => array('label' => $langs->trans('MultiPricesAbility')),
    // Several prices according to a customer level
    'PRODUIT_CUSTOMER_PRICES' => array('label' => $langs->trans('PriceByCustomer')),
    // Different price for each customer
    'PRODUIT_CUSTOMER_PRICES_AND_MULTIPRICES' => array('label' => $langs->trans('PriceByCustomeAndMultiPricesAbility')),
);
$keyforparam = 'PRODUIT_CUSTOMER_PRICES_BY_QTY';
$keyforparam = 'PRODUIT_CUSTOMER_PRICES_BY_QTY_MULTIPRICES';
$error = 0;
/*
 * Actions
 */
$nomessageinsetmoduleoptions = 1;
$res = \dolibarr_set_const($db, "PRODUIT_LIMIT_SIZE", \GETPOST('value_PRODUIT_LIMIT_SIZE'), 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "PRODUIT_MULTIPRICES_LIMIT", \GETPOST('value_PRODUIT_MULTIPRICES_LIMIT'), 'chaine', 0, '', $conf->entity);
$princingrules = \GETPOST('princingrule', 'alpha');
$value = \GETPOST('price_base_type', 'alpha');
$res = \dolibarr_set_const($db, "PRODUCT_PRICE_BASE_TYPE", $value, 'chaine', 0, '', $conf->entity);
/*$value = GETPOST('PRODUIT_SOUSPRODUITS', 'alpha');
	$res = dolibarr_set_const($db, "PRODUIT_SOUSPRODUITS", $value, 'chaine', 0, '', $conf->entity);*/
$value = \GETPOST('PRODUIT_DESC_IN_FORM', 'alpha');
$res = \dolibarr_set_const($db, "PRODUIT_DESC_IN_FORM", $value, 'chaine', 0, '', $conf->entity);
$value = \GETPOST('activate_viewProdTextsInThirdpartyLanguage', 'alpha');
$res = \dolibarr_set_const($db, "PRODUIT_TEXTS_IN_THIRDPARTY_LANGUAGE", $value, 'chaine', 0, '', $conf->entity);
$value = \GETPOST('activate_mergePropalProductCard', 'alpha');
$res = \dolibarr_set_const($db, "PRODUIT_PDF_MERGE_PROPAL", $value, 'chaine', 0, '', $conf->entity);
$value = \GETPOST('activate_usesearchtoselectproduct', 'alpha');
$res = \dolibarr_set_const($db, "PRODUIT_USE_SEARCH_TO_SELECT", $value, 'chaine', 0, '', $conf->entity);
$value = \GETPOST('activate_FillProductDescAuto', 'alpha');
$res = \dolibarr_set_const($db, "PRODUIT_AUTOFILL_DESC", $value, 'chaine', 0, '', $conf->entity);
// For products
$modele = \GETPOST('module', 'alpha');
$product = new \Product($db);
// Search template files
$file = '';
$classname = '';
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$ret = \delDocumentModel($value, $type);
// On active le modele
$ret = \delDocumentModel($value, $type);
$const = "PRODUCT_SPECIAL_" . \strtoupper(\GETPOST('spe', 'alpha'));
$value = \GETPOST('value');
$keyforvar = $reg[1];
$keyforvar = $reg[1];
/*
 * View
 */
$formbarcode = new \FormBarCode($db);
$title = $langs->trans('ProductServiceSetup');
$tab = $langs->trans("ProductsAndServices");
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \product_admin_prepare_head();
$form = new \Form($db);
// Module to manage product / services code
$dirproduct = array('/core/modules/product/');
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$arrayofmodules = array();
$arrayofmodules = \dol_sort_array($arrayofmodules, 'position');
// Module to build doc
$def = array();
// TODO Replace with $def = getListOfModels($db, $type);
$sql = "SELECT nom";
$resql = $db->query($sql);
$filelist = array();
$current_rule = 'PRODUCT_PRICE_UNIQ';
$arrayofchoices = array('0' => $langs->trans("No"), '1' => $langs->trans("Yes") . ' (' . $langs->trans("DesktopsOnly") . ')', '2' => $langs->trans("Yes") . ' (' . $langs->trans("DesktopsAndSmartphones") . ')');
// Add canvas feature
$dir = \DOL_DOCUMENT_ROOT . "/product/canvas/";