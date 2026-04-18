<?php

$min = \price2num(\GETPOST("min", "alpha"));
// Define modetax (0 or 1)
// 0=normal, 1=option vat for services is on debit, 2=option on payments for products
$modetax = \getDolGlobalInt('TAX_MODE');
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
$user_static = new \User($db);
$morequerystring = '';
$listofparams = array('date_startmonth', 'date_startyear', 'date_startday', 'date_endmonth', 'date_endyear', 'date_endday');
$special_report = \GETPOSTINT('extra_report') == 1;
$fsearch = '<!-- hidden fields for form -->';
// Show report header
$name = $langs->trans("VATReportByThirdParties");
$calcmode = '';
// Set period
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$builddate = \dol_now();
$description = '';
$elementcust = $langs->trans("CustomersInvoices");
$productcust = $langs->trans("Description");
$namerate = $langs->trans("VATRate");
$amountcust = $langs->trans("AmountHT");
$elementsup = $langs->trans("SuppliersInvoices");
$productsup = $langs->trans("Description");
$amountsup = $langs->trans("AmountHT");
$periodlink = '';
$exportlink = '';
$vatcust = $langs->trans("VATReceived");
$vatsup = $langs->trans("VATPaid");
$y = $year_current;
$total = 0;
$i = 0;
$columns = 5;
$span = $columns;
// Load arrays of datas
$x_coll = \tax_by_thirdparty('vat', $db, 0, $date_start, $date_end, $modetax, 'sell');
$x_paye = \tax_by_thirdparty('vat', $db, 0, $date_start, $date_end, $modetax, 'buy');