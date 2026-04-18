<?php

$id = \GETPOSTINT('id');
$eid = \GETPOSTINT('eid');
$action = \GETPOST('action', 'aZ09');
$title = \GETPOST('expression_title', 'alpha');
$expression = \GETPOST('expression');
$tab = \GETPOST('tab', 'alpha');
$tab = !empty($tab) ? $tab : 'card';
$tab = \strtolower($tab);
// Security check
$result = \restrictedArea($user, 'produit|service&fournisseur', $id, 'product&product', '', '', 'rowid');
//Initialize objects
$product = new \Product($db);
$price_expression = new \PriceExpression($db);
$price_globals = new \PriceGlobalVariable($db);
$object = $product;
$usercanread = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'lire') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'lire');
$usercancreate = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'creer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'creer');
$usercandelete = $object->type == \Product::TYPE_PRODUCT && $user->hasRight('produit', 'supprimer') || $object->type == \Product::TYPE_SERVICE && $user->hasRight('service', 'supprimer');
/*
 * View
 */
$form = new \Form($db);
$price_expression_list = array(0 => $langs->trans("New"));
//Help text
$help_text = $langs->trans("PriceExpressionEditorHelp1");
$doleditor = new \DolEditor('expression', isset($price_expression->expression) ? $price_expression->expression : '', '', 300, '', '', \false, \false, \false, \ROWS_4, '90%');