<?php

$action = \GETPOST('action', 'aZ09');
$list_account_main = array('ACCOUNTING_RESULT_PROFIT', 'ACCOUNTING_RESULT_LOSS');
$error = 0;
$defaultjournal = \GETPOST('ACCOUNTING_CLOSURE_DEFAULT_JOURNAL', 'alpha');
$accountinggroupsusedforbalancesheetaccount = \GETPOST('ACCOUNTING_CLOSURE_ACCOUNTING_GROUPS_USED_FOR_BALANCE_SHEET_ACCOUNT', 'alphanohtml');
$accountinggroupsusedforincomestatement = \GETPOST('ACCOUNTING_CLOSURE_ACCOUNTING_GROUPS_USED_FOR_INCOME_STATEMENT', 'alpha');
/*
 * View
 */
$form = new \Form($db);
$formaccounting = new \FormAccounting($db);
$title = $langs->trans('Closure');
$help_url = 'EN:Module_Double_Entry_Accounting#Setup|FR:Module_Comptabilit&eacute;_en_Partie_Double#Configuration';
$linkback = '';
$defaultjournal = \getDolGlobalString('ACCOUNTING_CLOSURE_DEFAULT_JOURNAL');