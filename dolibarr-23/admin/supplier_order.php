<?php

$action = \GETPOST('action', 'aZ09');
$type = \GETPOST('type', 'alpha');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$specimenthirdparty = new \Societe($db);
$error = 0;
$maskconstorder = \GETPOST('maskconstorder', 'aZ09');
$maskvalue = \GETPOST('maskorder', 'alpha');
$res = 0;
// For orders
$modele = \GETPOST('module', 'alpha');
$commande = new \CommandeFournisseur($db);
// Search template files
$file = '';
$classname = '';
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
/*
* View
*/
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \supplierorder_admin_prepare_head();
// Defini tableau def de modele
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
$substitutionarray = \pdf_getSubstitutionArray($langs, \null, \null, 2);
$htmltext = '<i>' . $langs->trans("AvailableVariables") . ':<br>';
$variablename = 'SUPPLIER_ORDER_FREE_TEXT';