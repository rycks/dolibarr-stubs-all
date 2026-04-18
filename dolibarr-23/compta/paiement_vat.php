<?php

$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$chid = \GETPOSTINT("id");
$amounts = array();
// Security check
$socid = 0;
$permissiontoadd = $user->hasRight('tax', 'charges', 'creer');
$error = 0;
$datepaye = \dol_mktime(12, 0, 0, \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"));
$form = new \Form($db);
$tva = new \Tva($db);
/*print '<tr><td>'.$langs->trans("DateDue")."</td><td>".dol_print_date($tva->date_ech,'day')."</td></tr>\n";
	print '<tr><td>'.$langs->trans("Amount")."</td><td>".price($tva->amount,0,$outputlangs,1,-1,-1,$conf->currency).'</td></tr>';*/
$sql = "SELECT sum(p.amount) as total";
$sumpaid = 0;
$resql = $db->query($sql);
$datepaye = \dol_mktime(12, 0, 0, \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"));
$datepayment = !\getDolGlobalString('MAIN_AUTOFILL_DATE') ? \GETPOSTINT("remonth") ? $datepaye : -1 : 0;
// List of VAT unpaid
$num = 1;
$i = 0;
$total = 0;
$total_ttc = 0.0;
$totalrecu = 0;