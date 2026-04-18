<?php

$refresh = \GETPOSTISSET('submit') || \GETPOSTISSET('vat_rate_show') || \GETPOSTISSET('invoice_type');
$invoice_type = \GETPOSTISSET('invoice_type') ? \GETPOST('invoice_type', 'alpha') : '';
$vat_rate_show = \GETPOSTISSET('vat_rate_show') ? \GETPOST('vat_rate_show', 'alphanohtml') : -1;
$min = \price2num(\GETPOST("min", "alpha"));
// Define modetax (0 or 1)
// 0=normal, 1=option vat for services is on debit, 2=option on payments for products
$modetax = \getDolGlobalInt('TAX_MODE');
$object = new \Tva($db);
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', '', 'tva', 'charges');
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
$title = $langs->trans("VATReport") . " " . \dol_print_date($date_start, '', 'tzserver') . " -> " . \dol_print_date($date_end, '', 'tzserver');
//print load_fiche_titre($langs->trans("VAT"),"");
//$fsearch.='<br>';
$fsearch = '<!-- hidden fields for form -->';
//$fsearch.='  '.$langs->trans("SalesTurnoverMinimum").': ';
//$fsearch.='  <input type="text" name="min" value="'.$min.'">';
// Show report header
$name = $langs->trans("VATReportByRates");
$calcmode = '';
// Set period
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0, 0, '', '', '', '', 1, '', '', 'tzserver');
$description = $fsearch;
$builddate = \dol_now();
// Customers invoices
$elementcust = $langs->trans("CustomersInvoices");
$productcust = $langs->trans("ProductOrService");
$amountcust = $langs->trans("AmountHT");
$vatcust = $langs->trans("VATReceived");
$namecust = $langs->trans("Name");
// Suppliers invoices
$elementsup = $langs->trans("SuppliersInvoices");
$productsup = $productcust;
$amountsup = $amountcust;
$vatsup = $langs->trans("VATPaid");
$namesup = $namecust;
$optioncss = \GETPOST('optioncss', 'alpha');
$periodlink = '';
$exportlink = '';
$vatcust = $langs->trans("VATReceived");
$vatsup = $langs->trans("VATPaid");
$vatexpensereport = $langs->trans("VATPaid");
$y = $year_current;
$i = 0;
$columns = 7;
$span = $columns;
// Load arrays of datas
$x_coll = \tax_by_rate('vat', $db, 0, 0, $date_start, $date_end, $modetax, 'sell');
$x_paye = \tax_by_rate('vat', $db, 0, 0, $date_start, $date_end, $modetax, 'buy');