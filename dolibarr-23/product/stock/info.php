<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
// Security check
//$result=restrictedArea($user,'stock', $id, 'entrepot&stock');
$result = \restrictedArea($user, 'stock');
$usercancreate = $user->hasRight('stock', 'creer');
/*
 * Actions
 */
// None
/*
 * View
 */
$help_url = 'EN:Module_Stocks_En|FR:Module_Stock|ES:M&oacute;dulo_Stocks';
$object = new \Entrepot($db);
$head = \stock_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/product/stock/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$shownav = 1;