<?php

$object = new \ExpenseReportRule($db);
/*
 * Action
 */
$parameters = array();
$rules = array();
$tab_apply = array();
$tab_rules_type = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
//Init error
$error = \false;
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$apply_to = \GETPOST('apply_to');
$fk_user = \GETPOSTINT('fk_user');
$fk_usergroup = \GETPOSTINT('fk_usergroup');
$restrictive = \GETPOSTINT('restrictive');
$fk_c_type_fees = \GETPOSTINT('fk_c_type_fees');
$code_expense_rules_type = \GETPOST('code_expense_rules_type');
$dates = \dol_mktime(12, 0, 0, \GETPOSTINT('startmonth'), \GETPOSTINT('startday'), \GETPOSTINT('startyear'));
$datee = \dol_mktime(12, 0, 0, \GETPOSTINT('endmonth'), \GETPOSTINT('endday'), \GETPOSTINT('endyear'));
$amount = (float) \price2num(\GETPOST('amount'), 'MT', 2);
$rules = $object->getAllRule();
$tab_apply = array('A' => $langs->trans('All'), 'G' => $langs->trans('UserGroup'), 'U' => $langs->trans('User'));
$tab_rules_type = array('EX_DAY' => $langs->trans('Day'), 'EX_MON' => $langs->trans('Month'), 'EX_YEA' => $langs->trans('Year'), 'EX_EXP' => $langs->trans('OnExpense'));
$form = new \Form($db);
$linkback = '<a href="' . \dolBuildUrl(\DOL_URL_ROOT . '/admin/modules.php', ['restore_lastsearch_values' => 1]) . '">' . \img_picto($langs->trans("BackToModuleList"), 'back', 'class="pictofixedwidth"') . '<span class="hideonsmartphone">' . $langs->trans("BackToModuleList") . '</span></a>';
$head = \expensereport_admin_prepare_head();