<?php

$result = \restrictedArea($user, 'banque');
/*
 * View
 */
$companystatic = new \Societe($db);
$title = $langs->trans('ListTransactionsByCategory');
$help_url = 'EN:Module_Banks_and_Cash|FR:Module_Banques_et_Caisses|ES:M&oacute;dulo_Bancos_y_Cajas';
$sql = "SELECT sum(d.amount) as somme, count(*) as nombre, c.label, c.rowid ";
$result = $db->query($sql);