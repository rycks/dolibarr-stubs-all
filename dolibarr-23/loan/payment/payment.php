<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$chid = \GETPOSTINT('id');
$datepaid = \dol_mktime(12, 0, 0, \GETPOSTINT('remonth'), \GETPOSTINT('reday'), \GETPOSTINT('reyear'));
// Security check
$socid = 0;
$loan = new \Loan($db);
$line_id = 0;
$echance = 0;
$amount_capital = 0;
$amount_insurance = 0;
$amount_interest = 0;
$ls = new \LoanSchedule($db);
// grab all loanschedule
$res = $ls->fetchAll($chid);
$line = new \LoanSchedule($db);
$res = $line->fetch($line_id);
$permissiontoadd = $user->hasRight('loan', 'write');
$error = 0;
$action = 'create';
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('Loans');
$help_url = "EN:Module_Loan|FR:Module_Emprunt";
$total = $loan->capital;
$sumpaid = 0;
$sql = "SELECT SUM(amount_capital) as total";
$resql = $db->query($sql);