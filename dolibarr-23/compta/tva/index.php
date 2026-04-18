<?php

$now = \dol_now();
$refresh = \GETPOSTISSET('submit') ? \true : \false;
$year_current = \GETPOSTISSET('year') ? \GETPOSTINT('year') : \dol_print_date($now, '%Y', 'tzserver');
$year_start = $year_current;
$month_current = \GETPOSTISSET('month') ? \GETPOSTINT('month') : \dol_print_date($now, '%m', 'tzserver');
$month_start = $month_current;
$refresh = \true;
// Define modetax (0 or 1)
// 0=normal, 1=option vat for services is on debit, 2=option on payments for products
$modetax = \getDolGlobalString('TAX_MODE');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', '', 'tva', 'charges');
/**
 * print function
 *
 * @param		DoliDB	$db		Database handler
 * @param		string	$sql	SQL Request
 * @param		string	$date	Date
 * @return		void
 */
function pt($db, $sql, $date)
{
}
/*
 * View
 */
$form = new \Form($db);
$company_static = new \Societe($db);
$tva = new \Tva($db);
$fsearch = '<!-- hidden fields for form -->';
$description = $fsearch;
// Show report header
$name = $langs->trans("VATReportByMonth");
$calcmode = '';
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$builddate = \dol_now();
//$textprevyear="<a href=\"index.php?year=" . ($year_current-1) . "\">".img_previous($langs->trans("Previous"), 'class="valignbottom"')."</a>";
//$textnextyear=" <a href=\"index.php?year=" . ($year_current+1) . "\">".img_next($langs->trans("Next"), 'class="valignbottom"')."</a>";
//print load_fiche_titre($langs->transcountry("VAT", $mysoc->country_code), $textprevyear." ".$langs->trans("Year")." ".$year_start." ".$textnextyear, 'bill');
$periodlink = '';
$exportlink = '';