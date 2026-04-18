<?php

$action = \GETPOST('action', 'aZ09');
$value = \GETPOST('value', 'alpha');
$label = \GETPOST('label', 'alpha');
$scandir = \GETPOST('scan_dir', 'alpha');
$type = 'invoice';
/*
 * Actions
 */
$error = 0;
$maskconstpayment = \GETPOST('maskconstpayment', 'aZ09');
$maskpayment = \GETPOST('maskpayment', 'alpha');
$res = 0;
$freetext = \GETPOST('FACTURE_PAYMENTS_ON_DIFFERENT_THIRDPARTIES_BILLS', 'restricthtml');
// No alpha here, we want exact string
$res = \dolibarr_set_const($db, "FACTURE_PAYMENTS_ON_DIFFERENT_THIRDPARTIES_BILLS", $freetext, 'chaine', 0, '', $conf->entity);
$res = \dolibarr_set_const($db, "PAYMENTS_REPORT_GROUP_BY_MOD", \GETPOSTINT('PAYMENTS_REPORT_GROUP_BY_MOD'), 'chaine', 0, '', $conf->entity);
/*
 * View
 */
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \invoice_admin_prepare_head();
$arrayofmodules = array();
$arrayofmodules = \dol_sort_array($arrayofmodules, 'position');