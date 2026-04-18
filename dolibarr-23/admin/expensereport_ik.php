<?php

$error = 0;
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$ikoffset = (float) \price2num(\GETPOST('ikoffset', 'alpha'));
$coef = (float) \price2num(\GETPOST('coef', 'alpha'));
$fk_c_exp_tax_cat = \GETPOSTINT('fk_c_exp_tax_cat');
$fk_range = \GETPOSTINT('fk_range');
$expIk = new \ExpenseReportIk($db);
$rangesbycateg = $expIk->getAllRanges();
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \expensereport_admin_prepare_head();