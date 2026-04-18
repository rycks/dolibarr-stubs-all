<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$key = \GETPOST('key');
$parent = \GETPOST('parent');
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$object = new \Product($db);
$objectid = 0;
$result = \restrictedArea($user, 'produit|service', $fieldvalue, 'product&product', '', '', $fieldtype);
$usercanread = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'lire') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'lire');
$usercancreate = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'creer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'creer');
$usercandelete = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'supprimer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'supprimer');
$reshook = $hookmanager->executeHooks('doActions', [], $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formproduct = new \FormProduct($db);
$product_fourn = new \ProductFournisseur($db);
$productstatic = new \Product($db);
$resql = \false;
$current_lang = $langs->getDefaultLang();
$sql = 'SELECT DISTINCT p.rowid, p.ref, p.label, p.fk_product_type as type, p.barcode, p.price, p.price_ttc, p.price_base_type, p.entity,';
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object);
$resql = $db->query($sql);
$title = $langs->trans('ProductServiceCard');
$help_url = '';
$shortlabel = \dol_trunc($object->label, 16);
$head = \product_prepare_head($object);
$titre = $langs->trans("CardProduct" . $object->type);
$picto = $object->type == \Product::TYPE_SERVICE ? 'service' : 'product';
/*
 * Product card
 */
$iskit = $object->hasFatherOrChild(1);