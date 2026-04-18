<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$chid = \GETPOSTINT("id");
$amounts = array();
// Security check
$socid = 0;
$charge = new \ChargeSociales($db);
$error = 0;
$datepaye = \dol_mktime(12, 0, 0, \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"));
$form = new \Form($db);
$total = $charge->amount;
/*print '<tr><td>'.$langs->trans("DateDue")."</td><td>".dol_print_date($charge->date_ech,'day')."</td></tr>\n";
	print '<tr><td>'.$langs->trans("Amount")."</td><td>".price($charge->amount,0,$outputlangs,1,-1,-1,$conf->currency).'</td></tr>';*/
$sql = "SELECT sum(p.amount) as total";
$sumpaid = 0;
$resql = $db->query($sql);
$datepaye = \dol_mktime(12, 0, 0, \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"));
$datepayment = !\getDolGlobalString('MAIN_AUTOFILL_DATE') ? \GETPOSTISSET("remonth") ? $datepaye : -1 : '';
// List of unpaid taxes
$num = 1;
$i = 0;
$total = 0;
$total_ttc = 0;
$totalrecu = 0;