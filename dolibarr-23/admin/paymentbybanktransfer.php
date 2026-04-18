<?php

$action = \GETPOST('action', 'aZ09');
$type = 'paymentorder';
/*
 * Actions
 */
$error = 0;
$id = \GETPOSTINT('PAYMENTBYBANKTRANSFER_ID_BANKACCOUNT');
$account = new \Account($db);
/*
 *	View
 */
$form = new \Form($db);
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
/*
//EntToEnd
print '<tr class="oddeven"><td>'.$langs->trans("END_TO_END").'</td>';
print '<td>';
print '<input type="text" name="PRELEVEMENT_END_TO_END" value="'.$conf->global->PRELEVEMENT_END_TO_END.'" class="width100"></td>';
print '</td></tr>';

//USTRD
print '<tr class="oddeven"><td>'.$langs->trans("USTRD").'</td>';
print '<td>';
print '<input type="text" name="CREDITTRANSFER_USTRD" value="'.$conf->global->CREDITTRANSFER_USTRD.'" class="width100"></td>';
print '</td></tr>';
*/
//ADDDAYS
$addDaysValue = \getDolGlobalInt('PAYMENTBYBANKTRANSFER_ADDDAYS', 0);