<?php

$id = \GETPOSTINT('id');
// ID of the parent Product
$ref = \GETPOST('ref', 'alpha');
$combination_id = \GETPOSTINT('combination_id');
// ID of the combination
$reference = \GETPOST('reference', 'alpha');
// Reference of the variant Product
$weight_impact = \GETPOSTFLOAT('weight_impact', 2);
$price_impact_percent = (bool) \GETPOST('price_impact_percent');
$price_impact = $price_impact_percent ? \GETPOSTFLOAT('price_impact', 2) : \GETPOSTFLOAT('price_impact', 'MU');
// for PRODUIT_MULTIPRICES
$level_price_impact = \GETPOST('level_price_impact', 'array');
$level_price_impact = \array_map('price2num', $level_price_impact);
$level_price_impact = \array_map('floatval', $level_price_impact);
$level_price_impact_percent = \GETPOST('level_price_impact_percent', 'array');
$level_price_impact_percent = \array_map('boolval', $level_price_impact_percent);
$clone_categories = (bool) \GETPOST('clone_categories');
$form = new \Form($db);
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
$show_files = \GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$cancel = \GETPOST('cancel', 'alpha');
$delete_product = \GETPOST('delete_product', 'alpha');
$subaction = \GETPOST('subaction', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
// Security check
$fieldvalue = $id ?: $ref;
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$prodstatic = new \Product($db);
$prodattr = new \ProductAttribute($db);
$prodattr_val = new \ProductAttributeValue($db);
$object = new \Product($db);
$selectedvariant = isset($_SESSION['addvariant_' . $object->id]) ? $_SESSION['addvariant_' . $object->id] : array();
$selected = '';
$usercanread = $object->isProduct() && $user->hasRight('produit', 'lire') || $object->isService() && $user->hasRight('service', 'lire');
$usercancreate = $object->isProduct() && $user->hasRight('produit', 'creer') || $object->isService() && $user->hasRight('service', 'creer');
$usercandelete = $object->isProduct() && $user->hasRight('produit', 'supprimer') || $object->isService() && $user->hasRight('service', 'supprimer');
// We click on select combination
$action = 'add';
$attribute_id = \GETPOSTINT('attribute');
$attribute_value_id = \GETPOSTINT('value');
// We click on select combination
$action = 'add';
$feature = \GETPOST('feature', 'intcomma');
$prodcomb = new \ProductCombination($db);
$prodcomb2val = new \ProductCombination2ValuePair($db);
$productCombination2ValuePairs1 = array();
// We click on Create all defined combinations
//$features = GETPOST('features', 'array');
$features = !empty($_SESSION['addvariant_' . $object->id]) ? $_SESSION['addvariant_' . $object->id] : array();
// Reload variants
$productCombinations = $prodcomb->fetchAllByFkProductParent($object->id, \true);
/*
 *	View
 */
$form = new \Form($db);
$title = $langs->trans("Variant");
$showbarcode = \isModEnabled('barcode');
$head = \product_prepare_head($object);
$titre = $langs->trans("CardProduct" . $object->type);
$picto = $object->isService() ? 'service' : 'product';
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/list.php?type=' . (int) $object->type . '">' . $langs->trans("BackToList") . '</a>';
$positiverates = '';
$listofvariantselected = '';