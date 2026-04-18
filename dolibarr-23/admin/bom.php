<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'bom';
/*
 * Actions
 */
$error = 0;
$maskconstbom = \GETPOST('maskconstBom', 'aZ09');
$maskbom = \GETPOST('maskBom', 'alpha');
$res = 0;
/*
 * View
 */
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \bomAdminPrepareHead();
// Load array def with activated templates
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
$substitutionarray = \pdf_getSubstitutionArray($langs, \null, \null, 2);
$htmltext = '<i>' . $langs->trans("AvailableVariables") . ':<br>';
$variablename = 'BOM_FREE_TEXT';