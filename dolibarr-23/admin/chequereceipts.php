<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
/*
 * Actions
 */
$error = 0;
$maskconstchequereceipts = \GETPOST('maskconstchequereceipts', 'aZ09');
$maskchequereceipts = \GETPOST('maskchequereceipts', 'alpha');
$res = 0;
$freetext = \GETPOST('BANK_CHEQUERECEIPT_FREE_TEXT', 'restricthtml');
// No alpha here, we want exact string
$res = \dolibarr_set_const($db, "BANK_CHEQUERECEIPT_FREE_TEXT", $freetext, 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \bank_admin_prepare_head(\null);
$substitutionarray = \pdf_getSubstitutionArray($langs, \null, \null, 2);
$htmltext = '<i>' . $langs->trans("AvailableVariables") . ':<br>';
$variablename = 'BANK_CHEQUERECEIPT_FREE_TEXT';