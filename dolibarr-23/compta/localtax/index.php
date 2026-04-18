<?php

$localTaxType = \GETPOSTINT('localTaxType');
// Date range
$year = \GETPOSTINT("year");
$date_start = \dol_mktime(0, 0, 0, \GETPOSTINT("date_startmonth"), \GETPOSTINT("date_startday"), \GETPOSTINT("date_startyear"));
$date_end = \dol_mktime(23, 59, 59, \GETPOSTINT("date_endmonth"), \GETPOSTINT("date_endday"), \GETPOSTINT("date_endyear"));
// We define date_start and date_end
$q = \GETPOSTINT("q");
// Define modetax (0 or 1)
// 0=normal, 1=option vat for services is on debit, 2=option on payments for products
$modetax = \getDolGlobalString('TAX_MODE');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', '', '', 'charges');
/**
 * print function
 *
 * @param		DoliDB	$db		Database handler
 * @param		string	$sql	SQL Request
 * @param		string	$date	Date
 * @return		void
 */
function localtax_pt($db, $sql, $date)
{
}
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$company_static = new \Societe($db);
$tva = new \Tva($db);
$fsearch = '<!-- hidden fields for form -->';
$description = $fsearch;
// Show report header
$name = $langs->transcountry($localTaxType == 1 ? "LT1ReportByMonth" : "LT2ReportByMonth", $mysoc->country_code);
$calcmode = $langs->trans("LTReportBuildWithOptionDefinedInModule") . ' ';
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$builddate = \dol_now();
//$textprevyear="<a href=\"index.php?localTaxType=".$localTaxType."&year=" . ($year_current-1) . "\">".img_previous()."</a>";
//$textnextyear=" <a href=\"index.php?localTaxType=".$localTaxType."&year=" . ($year_current+1) . "\">".img_next()."</a>";
//print load_fiche_titre($langs->transcountry($LT,$mysoc->country_code),"$textprevyear ".$langs->trans("Year")." $year_start $textnextyear", 'bill');
$periodlink = '';
$exportlink = '';
$tmp = \dol_getdate($date_start);
$y = $tmp['year'];
$m = $tmp['mon'];
$tmp = \dol_getdate($date_end);
$yend = $tmp['year'];
$mend = $tmp['mon'];
$total = 0;
$subtotalcoll = 0;
$subtotalpaid = 0;
$subtotal = 0;
$i = 0;
$mcursor = 0;
$sql = '';