<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'aZ09');
$fiscal_period_id = \GETPOSTINT('fiscal_period_id');
$validatemonth = \GETPOSTINT('validatemonth');
$validateyear = \GETPOSTINT('validateyear');
$object = new \BookKeeping($db);
$now = \dol_now();
$fiscal_periods = $object->getFiscalPeriods();
// Define the arrays of fiscal periods
$active_fiscal_periods = array();
$first_active_fiscal_period = \null;
$last_fiscal_period = \null;
$current_fiscal_period = \null;
$next_fiscal_period = \null;
$next_active_fiscal_period = \null;
$accounting_groups_used_for_balance_sheet_account = \array_filter(\array_map('trim', \explode(',', \getDolGlobalString('ACCOUNTING_CLOSURE_ACCOUNTING_GROUPS_USED_FOR_BALANCE_SHEET_ACCOUNT'))), 'strlen');
$accounting_groups_used_for_income_statement = \array_filter(\array_map('trim', \explode(',', \getDolGlobalString('ACCOUNTING_CLOSURE_ACCOUNTING_GROUPS_USED_FOR_INCOME_STATEMENT'))), 'strlen');
/*
 * Actions
 */
$parameters = array('fiscal_periods' => $fiscal_periods, 'last_fiscal_period' => $last_fiscal_period, 'current_fiscal_period' => $current_fiscal_period, 'next_fiscal_period' => $next_fiscal_period);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formaccounting = new \FormAccounting($db);
$title = $langs->trans('Closure');
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double#Cl.C3.B4ture_annuelle';
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'fiscal_periods' => $fiscal_periods, 'last_fiscal_period' => $last_fiscal_period, 'current_fiscal_period' => $current_fiscal_period, 'next_fiscal_period' => $next_fiscal_period);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
$fiscal_period_nav_text = $langs->trans("FiscalPeriod");