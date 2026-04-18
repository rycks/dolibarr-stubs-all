<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$modulepart = \GETPOST('modulepart', 'aZ09');
// Used by actions_setmoduleoptions.inc.php
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'contract';
/*
 * Actions
 */
$error = 0;
$maskconst = \GETPOST('maskconstholiday', 'aZ09');
$maskvalue = \GETPOST('maskholiday', 'alpha');
$res = 0;
/*
 * View
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \holiday_admin_prepare_head();
// Defined model definition table
$def = array();
$sql = "SELECT nom";
$resql = $db->query($sql);
$substitutionarray = \pdf_getSubstitutionArray($langs, array('objectamount'), \null, 2);
$htmltext = '<i>' . $langs->trans("AvailableVariables") . ':<br>';
$variablename = 'HOLIDAY_FREE_TEXT';