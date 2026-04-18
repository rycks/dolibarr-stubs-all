<?php

$action = \GETPOST('action', 'aZ09');
// Other parameters LOAN_*
$list = array('LOAN_ACCOUNTING_ACCOUNT_CAPITAL', 'LOAN_ACCOUNTING_ACCOUNT_INTEREST', 'LOAN_ACCOUNTING_ACCOUNT_INSURANCE');
$error = 0;
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';