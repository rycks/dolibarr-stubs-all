<?php

// Constant to define payment sens
const PAY_DEBIT = 0;
const PAY_CREDIT = 1;
$date_start = \GETPOST('date_start', 'alpha');
$date_startDay = \GETPOSTINT('date_startday');
$date_startMonth = \GETPOSTINT('date_startmonth');
$date_startYear = \GETPOSTINT('date_startyear');
$date_start = \dol_mktime(0, 0, 0, $date_startMonth, $date_startDay, $date_startYear, 'tzuserrel');
$date_stop = \GETPOST('date_stop', 'alpha');
$date_stopDay = \GETPOSTINT('date_stopday');
$date_stopMonth = \GETPOSTINT('date_stopmonth');
$date_stopYear = \GETPOSTINT('date_stopyear');
$date_stop = \dol_mktime(23, 59, 59, $date_stopMonth, $date_stopDay, $date_stopYear, 'tzuserrel');
$action = \GETPOST('action', 'aZ09');
$projectid = \GETPOSTINT('projectid');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$arrayfields = array('type' => array('label' => "Type", 'checked' => 1), 'date' => array('label' => "Date", 'checked' => 1), 'date_due' => array('label' => "DateDue", 'checked' => 1), 'ref' => array('label' => "Ref", 'checked' => 1), 'documents' => array('label' => "Documents", 'checked' => 1), 'paid' => array('label' => "Paid", 'checked' => 1), 'total_ht' => array('label' => "TotalHT", 'checked' => 1), 'total_ttc' => array('label' => "TotalTTC", 'checked' => 1), 'total_vat' => array('label' => "TotalVAT", 'checked' => 1));
// Define $arrayofentities if multientity is set.
$arrayofentities = array();
$entity = \GETPOSTISSET('entity') ? \GETPOSTINT('entity') : (\GETPOSTISSET('search_entity') ? \GETPOSTINT('search_entity') : $conf->entity);
$error = 0;
$listofchoices = array('selectinvoices' => array('label' => 'Invoices', 'picto' => 'bill', 'lang' => 'bills', 'enabled' => \isModEnabled('invoice'), 'perms' => $user->hasRight('facture', 'lire')), 'selectsupplierinvoices' => array('label' => 'BillsSuppliers', 'picto' => 'supplier_invoice', 'lang' => 'bills', 'enabled' => \isModEnabled('supplier_invoice'), 'perms' => $user->hasRight('fournisseur', 'facture', 'lire')), 'selectexpensereports' => array('label' => 'ExpenseReports', 'picto' => 'expensereport', 'lang' => 'trips', 'enabled' => \isModEnabled('expensereport'), 'perms' => $user->hasRight('expensereport', 'lire')), 'selectdonations' => array('label' => 'Donations', 'picto' => 'donation', 'lang' => 'donation', 'enabled' => \isModEnabled('don'), 'perms' => $user->hasRight('don', 'lire')), 'selectsocialcontributions' => array('label' => 'SocialContributions', 'picto' => 'bill', 'enabled' => \isModEnabled('tax'), 'perms' => $user->hasRight('tax', 'charges', 'lire')), 'selectpaymentsofsalaries' => array('label' => 'SalariesPayments', 'picto' => 'salary', 'lang' => 'salaries', 'enabled' => \isModEnabled('salaries'), 'perms' => $user->hasRight('salaries', 'read')), 'selectvariouspayment' => array('label' => 'VariousPayment', 'picto' => 'payment', 'enabled' => \isModEnabled('bank'), 'perms' => $user->hasRight('banque', 'lire')), 'selectloanspayment' => array('label' => 'PaymentLoan', 'picto' => 'loan', 'enabled' => \isModEnabled('don'), 'perms' => $user->hasRight('loan', 'read')));
/*
 * Actions
 */
//$parameters = array('socid' => $id);
//$reshook = $hookmanager->executeHooks('doActions', $parameters, $object); // Note that $object may have been modified by some hooks
//if ($reshook < 0) setEventMessages($hookmanager->error, $hookmanager->errors, 'errors');
$filesarray = array();
$result = \false;
// zip creation
$dirfortmpfile = !empty($conf->accounting->dir_temp) ? $conf->accounting->dir_temp : $conf->comptabilite->dir_temp;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$userstatic = new \User($db);
$invoice = new \Facture($db);
$supplier_invoice = new \FactureFournisseur($db);
$expensereport = new \ExpenseReport($db);
$don = new \Don($db);
$salary_payment = new \PaymentSalary($db);
$charge_sociales = new \ChargeSociales($db);
$various_payment = new \PaymentVarious($db);
$payment_loan = new \PaymentLoan($db);
$title = $langs->trans("AccountantFiles") . ' - ' . $langs->trans("List");
$help_url = '';
$h = 0;
$head = array();
// Export is for current company only
$socid = 0;
$i = 0;
$param = '';
$TData = \dol_sort_array($filesarray, $sortfield, $sortorder);
$filename = \dol_print_date($date_start, 'dayrfc', 'tzuserrel') . "-" . \dol_print_date($date_stop, 'dayrfc', 'tzuserrel') . '_export.zip';