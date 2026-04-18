<?php

$action = \GETPOST('action', 'aZ09');
$type = 'paymentorder';
$error = 0;
$id = \GETPOSTINT('PRELEVEMENT_ID_BANKACCOUNT');
$account = new \Account($db);
$res = \dolibarr_set_const($db, "PRELEVEMENT_ADDDAYS", \GETPOST("PRELEVEMENT_ADDDAYS"), 'chaine', 0, '', $conf->entity);
/*
 *	View
 */
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$htmltext = $langs->trans("KeepThisEmptyInMostCases");
$htmltext = $langs->trans("KeepThisEmptyInMostCases");