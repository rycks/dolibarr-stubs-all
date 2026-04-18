<?php

$id = \GETPOSTINT('id');
// Security check
$result = \restrictedArea($user, 'stock');
/*
 * View
 */
$form = new \Form($db);
$help_url = 'EN:Module_Stocks_En|FR:Module_Stock|ES:M&oacute;dulo_Stocks';
$entrepot = new \Entrepot($db);
$result = $entrepot->fetch($id);
$head = \stock_prepare_head($entrepot);
$calcproducts = $entrepot->nb_products();
$year = \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$file = $conf->stock->dir_temp . '/entrepot-' . $entrepot->id . '-' . $year . '.png';