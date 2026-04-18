<?php

$local = \GETPOSTINT('localTaxType');
$min = \price2num(\GETPOST("min", "alpha"));
// Define modetax (0 or 1)
// 0=normal, 1=option vat for services is on debit, 2=option on payments for products
$modetax = \getDolGlobalInt('TAX_MODE');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'tax', '', '', 'charges');
$builddate = \dol_now();
$calc = 0;
$calcmode = "Unknown";
$find = '';
$replace = '';
$period = '';
/*
 * View
 */
$form = new \Form($db);
$company_static = new \Societe($db);
$morequerystring = '';
$listofparams = array('date_startmonth', 'date_startyear', 'date_startday', 'date_endmonth', 'date_endyear', 'date_endday');
$name = $langs->transcountry($local == 1 ? "LT1ReportByCustomers" : "LT2ReportByCustomers", $mysoc->country_code);
$fsearch = '<!-- hidden fields for form -->';
// Show report header
$calc = \getDolGlobalString('MAIN_INFO_LOCALTAX_CALC') . $local;
$description = '';
// Calculate on invoice for goods and services
$calcmode = $calc == 0 ? $langs->trans("CalcModeLT" . $local) : $langs->trans("CalcModeLT" . $local . "Rec");
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$elementcust = $langs->trans("CustomersInvoices");
$productcust = $langs->trans("Description");
$amountcust = $langs->trans("AmountHT");
$elementsup = $langs->trans("SuppliersInvoices");
$productsup = $langs->trans("Description");
$amountsup = $langs->trans("AmountHT");
// Invoice for goods, payment for services
$calcmode = $langs->trans("CalcModeLT2Debt");
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$elementcust = $langs->trans("CustomersInvoices");
$productcust = $langs->trans("Description");
$amountcust = $langs->trans("AmountHT");
$elementsup = $langs->trans("SuppliersInvoices");
$productsup = $langs->trans("Description");
$amountsup = $langs->trans("AmountHT");
// Set period
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$builddate = \dol_now();
$periodlink = '';
$exportlink = '';
$vatcust = $langs->transcountry($local == 1 ? "LT1" : "LT2", $mysoc->country_code);
$vatsup = $langs->transcountry($local == 1 ? "LT1" : "LT2", $mysoc->country_code);
$x_coll_sum = 0;
// Initialize value
$x_paye_sum = 0;
$coll_list = \tax_by_thirdparty('localtax' . $local, $db, 0, $date_start, $date_end, $modetax, 'sell');
$action = "tvaclient";
$reshook = $hookmanager->executeHooks('addVatLine', $parameters, $object, $action);
$company_static = new \Societe($db);
$coll_list = \tax_by_thirdparty('localtax' . $local, $db, 0, $date_start, $date_end, $modetax, 'buy');
$reshook = $hookmanager->executeHooks('addVatLine', $parameters, $object, $action);