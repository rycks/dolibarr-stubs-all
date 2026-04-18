<?php

// Security check
$result = \restrictedArea($user, 'stock');
/*
 * View
 */
$producttmp = new \Product($db);
$warehouse = new \Entrepot($db);
$help_url = 'EN:Module_Stocks_En|FR:Module_Stock|ES:M&oacute;dulo_Stocks';
$max = 15;
$sql = "SELECT e.rowid, e.ref as label, e.lieu, e.statut as status";
$result = $db->query($sql);
$num = $db->num_rows($result);
$i = 0;
// Latest movements
$max = 10;
$sql = "SELECT p.rowid, p.label as produit, p.tobatch, p.tosell, p.tobuy,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$tmplotstatic = new \Productlot($db);
$i = 0;
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardWarehouse', $parameters, $object);