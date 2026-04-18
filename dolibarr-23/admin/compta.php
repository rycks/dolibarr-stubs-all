<?php

$action = \GETPOST('action', 'aZ09');
// Other parameters ACCOUNTING_*
$list = array('ACCOUNTING_PRODUCT_BUY_ACCOUNT', 'ACCOUNTING_PRODUCT_SOLD_ACCOUNT', 'ACCOUNTING_SERVICE_BUY_ACCOUNT', 'ACCOUNTING_SERVICE_SOLD_ACCOUNT', 'ACCOUNTING_VAT_SOLD_ACCOUNT', 'ACCOUNTING_VAT_BUY_ACCOUNT', 'ACCOUNTING_ACCOUNT_CUSTOMER', 'ACCOUNTING_ACCOUNT_SUPPLIER');
/*
 * Actions
 */
$accounting_mode = \getDolGlobalString('ACCOUNTING_MODE', 'CREANCES-DETTES');
$error = 0;
$accounting_modes = array('RECETTES-DEPENSES', 'CREANCES-DETTES');
$accounting_mode = \GETPOST('accounting_mode', 'alpha');
$report_include_varpay = \GETPOST('ACCOUNTING_REPORTS_INCLUDE_VARPAY', 'alpha');
$report_include_loan = \GETPOST('ACCOUNTING_REPORTS_INCLUDE_LOAN', 'alpha');
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';