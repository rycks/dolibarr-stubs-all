<?php

$action = \GETPOST('action', 'alpha');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'delivery';
/*
 * Actions
 */
$error = 0;
$maskconstdelivery = \GETPOST('maskconstdelivery', 'aZ09');
$maskdelivery = \GETPOST('maskdelivery', 'alpha');
$res = 0;
$free = \GETPOST('DELIVERY_FREE_TEXT', 'restricthtml');
// No alpha here, we want exact string
$res = \dolibarr_set_const($db, "DELIVERY_FREE_TEXT", $free, 'chaine', 0, '', $conf->entity);
$modele = \GETPOST('module', 'alpha');
$sending = new \Delivery($db);
// Search template files
$file = '';
$classname = '';
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$ret = \delDocumentModel($value, $type);
// On active le modele
$ret = \delDocumentModel($value, $type);
/*
 * View
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \expedition_admin_prepare_head();
// Defini tableau def de modele
$type = "delivery";
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
$substitutionarray = \pdf_getSubstitutionArray($langs, \null, \null, 2);
$htmltext = '<i>' . $langs->trans("AvailableVariables") . ':<br>';
$variablename = 'DELIVERY_FREE_TEXT';