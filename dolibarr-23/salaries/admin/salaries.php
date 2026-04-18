<?php

$action = \GETPOST('action', 'aZ09');
// Other parameters SALARIES_*
$list = array('SALARIES_ACCOUNTING_ACCOUNT_PAYMENT');
$error = 0;
$reg = array();
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \salaries_admin_prepare_head();
$key = 'CREATE_NEW_SALARY_WITHOUT_AUTO_PAYMENT';