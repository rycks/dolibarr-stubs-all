<?php

$modecompta = \GETPOST('modecompta', 'alpha') ? \GETPOST('modecompta', 'alpha') : \getDolGlobalString('ACCOUNTING_MODE');
// Date range
$year = \GETPOSTINT("year");
$month = \GETPOSTINT("month");
$date_start = \dol_mktime(0, 0, 0, \GETPOSTINT("date_startmonth"), \GETPOSTINT("date_startday"), \GETPOSTINT("date_startyear"), 'tzserver');
// We use timezone of server so report is same from everywhere
$date_end = \dol_mktime(23, 59, 59, \GETPOSTINT("date_endmonth"), \GETPOSTINT("date_endday"), \GETPOSTINT("date_endyear"), 'tzserver');
// We use timezone of server so report is same from everywhere
// Quarter
$q = '';
// We define date_start and date_end
$q = \GETPOSTINT("q");
// $date_start and $date_end are defined. We force $year_start and $nbofyear
$tmps = \dol_getdate($date_start);
$year_start = $tmps['year'];
$tmpe = \dol_getdate($date_end);
$year_end = $tmpe['year'];
$tmp_date_end = \dol_time_plus_duree($date_start, 1, 'y') - 1;
$min = \price2num(\GETPOST("min", "alpha"));
// Define modetax (0 or 1)
// 0=normal, 1=option vat for services is on debit, 2=option on payments for products
$modetax = !\getDolGlobalString('TAX_MODE') ? 0 : $conf->global->TAX_MODE;
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', '', '', 'charges');
/*
 * View
 */
$form = new \Form($db);
$company_static = new \Societe($db);
$invoice_customer = new \Facture($db);
$invoice_supplier = new \FactureFournisseur($db);
$expensereport = new \ExpenseReport($db);
$product_static = new \Product($db);
$payment_static = new \Paiement($db);
$paymentfourn_static = new \PaiementFourn($db);
$paymentexpensereport_static = new \PaymentExpenseReport($db);
$morequerystring = '';
$listofparams = array('date_startmonth', 'date_startyear', 'date_startday', 'date_endmonth', 'date_endyear', 'date_endday');
$exportlink = "";
$namelink = "";
//print load_fiche_titre($langs->trans("VAT"),"");
//$fsearch.='<br>';
$fsearch = '';
//$fsearch.='  '.$langs->trans("SalesTurnoverMinimum").': ';
//$fsearch.='  <input type="text" name="min" value="'.$min.'">';
// Show report header
$name = $langs->trans("xxx");
$calcmode = '';
// Set period
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0, 0, '', '', '', '', 1, '', '', 'tzserver');
$prevyear = $year_start;
$prevquarter = $q;
$nextyear = $year_start;
$nextquarter = $q;
$description = $fsearch;
$builddate = \dol_now();
// Customers invoices
$elementcust = $langs->trans("CustomersInvoices");
$productcust = $langs->trans("ProductOrService");
$amountcust = $langs->trans("AmountHT");
// Suppliers invoices
$elementsup = $langs->trans("SuppliersInvoices");
$productsup = $productcust;
$amountsup = $amountcust;
$name = $langs->trans("Turnover") . ', ' . $langs->trans("ByVatRate");
$calcmode = $langs->trans("CalcModeDebt");
$builddate = \dol_now();
//elseif ($modecompta == "BOOKKEEPING") {
//} elseif ($modecompta == "BOOKKEEPINGCOLLECTED") {
//}
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0);
$i = 0;
// Sales invoices
$sql = "SELECT fd.tva_tx AS vatrate,";
$resql = $db->query($sql);
$i = 0;
// Purchase invoices
$sql2 = "SELECT ffd.tva_tx AS vatrate,";
$resql2 = $db->query($sql2);