<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$categid = \GETPOST('categid');
$label = \GETPOST("label");
// Initialize a technical objects
$bankcateg = new \BankCateg($db);
$bankcateg = new \BankCateg($db);
/*
 * View
 */
$title = $langs->trans('RubriquesTransactions');
$help_url = 'EN:Module_Banks_and_Cash|FR:Module_Banques_et_Caisses|ES:M&oacute;dulo_Bancos_y_Cajas';
$cats = new \Categorie($db);
$catTypeID = $cats->getMapId()[\Categorie::TYPE_BANK_LINE];
$sql = "SELECT rowid, label";
$result = $db->query($sql);