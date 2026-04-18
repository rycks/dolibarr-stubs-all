<?php

$local = \GETPOSTINT('localTaxType');
$min = \price2num(\GETPOST("min", "alpha"));
// Define modetax (0 or 1)
// 0=normal, 1=option vat for services is on debit, 2=option on payments for products
//$modetax = $conf->global->TAX_MODE;
$calc = \getDolGlobalString('MAIN_INFO_LOCALTAX_CALC') . $local;
$modetax = \getDolGlobalInt('TAX_MODE');
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
$fsearch = '<!-- hidden fields for form -->';
$name = $langs->transcountry($local == 1 ? "LT1ReportByQuarters" : "LT2ReportByQuarters", $mysoc->country_code);
$calcmode = '';
// Set period
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
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
$periodlink = '';
$exportlink = '';
$y = $year_current;
$total = 0;
$i = 0;
$columns = 4;
// Load arrays of datas
$x_coll = \tax_by_rate('localtax' . $local, $db, 0, 0, $date_start, $date_end, $modetax, 'sell');
$x_paye = \tax_by_rate('localtax' . $local, $db, 0, 0, $date_start, $date_end, $modetax, 'buy');