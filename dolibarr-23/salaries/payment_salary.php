<?php

$action = \GETPOST('action', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$amounts = array();
$object = new \Salary($db);
// Security check
$socid = \GETPOSTINT("socid");
$error = 0;
$datepaye = \dol_mktime(\GETPOSTINT("rehour"), \GETPOSTINT("remin"), \GETPOSTINT("resec"), \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"), 'tzuserrel');
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$salary = $object;
$sumpaid = 0.0;
/*print '<tr><td>'.$langs->trans("DateDue")."</td><td>".dol_print_date($salary->date_ech,'day')."</td></tr>\n";
	print '<tr><td>'.$langs->trans("Amount")."</td><td>".price($salary->amount,0,$outputlangs,1,-1,-1,$conf->currency).'</td></tr>';*/
$sql = "SELECT sum(p.amount) as total";
$resql = $db->query($sql);
$datepaye = \dol_mktime(\GETPOSTINT("rehour"), \GETPOSTINT("remin"), \GETPOSTINT("resec"), \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"));
$datepayment = !\getDolGlobalString('MAIN_AUTOFILL_DATE') ? \GETPOST("remonth") ? $datepaye : -1 : '';
// List of salaries unpaid
$num = 1;
$i = 0;
$total_ttc = 0.0;
$totalrecu = 0;