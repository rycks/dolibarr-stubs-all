<?php

// Multi journal
$id_journal = \GETPOSTINT('id_journal');
$date_startmonth = \GETPOSTINT('date_startmonth');
$date_startday = \GETPOSTINT('date_startday');
$date_startyear = \GETPOSTINT('date_startyear');
$date_endmonth = \GETPOSTINT('date_endmonth');
$date_endday = \GETPOSTINT('date_endday');
$date_endyear = \GETPOSTINT('date_endyear');
$in_bookkeeping = \GETPOST('in_bookkeeping', 'aZ09');
$only_rappro = \GETPOSTINT('only_rappro');
$now = \dol_now();
$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
$error = 0;
$date_start = \dol_mktime(0, 0, 0, $date_startmonth, $date_startday, $date_startyear);
$date_end = \dol_mktime(23, 59, 59, $date_endmonth, $date_endday, $date_endyear);
$pastmonth = \null;
// Initialise for static analysis  (could be really unseg)
$pastmonthyear = \null;
// Get all bank lines
//-------------------------------------
$sql = "SELECT b.rowid, b.dateo as do, b.datev as dv, b.amount, b.amount_main_currency, b.label, b.rappro, b.num_releve, b.num_chq, b.fk_type, b.fk_account,";
//print $sql;
// Preload payment account codes by payment type from c_paiement
$accountancy_code_by_payment = array();
$sql2 = "SELECT code, accountancy_code";
$resql = $db->query($sql2);
$object = new \Account($db);
$paymentstatic = new \Paiement($db);
$paymentsupplierstatic = new \PaiementFourn($db);
$societestatic = new \Societe($db);
$userstatic = new \User($db);
$bankaccountstatic = new \Account($db);
$chargestatic = new \ChargeSociales($db);
$paymentdonstatic = new \PaymentDonation($db);
$paymentvatstatic = new \Tva($db);
$paymentsalstatic = new \PaymentSalary($db);
$paymentexpensereportstatic = new \PaymentExpenseReport($db);
$paymentvariousstatic = new \PaymentVarious($db);
$paymentloanstatic = new \PaymentLoan($db);
$accountLinestatic = new \AccountLine($db);
$paymentsubscriptionstatic = new \Subscription($db);
$tmppayment = new \Paiement($db);
$tmpinvoice = new \Facture($db);
$accountingaccount = new \AccountingAccount($db);
$account_transfer = 'NotDefined';
// For static analysis, NotDefined is a reserved word
// Get code of finance journal
$accountingjournalstatic = new \AccountingJournal($db);
$journal = $accountingjournalstatic->code;
$journal_label = $accountingjournalstatic->label;
$tabcompany = array();
$tabuser = array();
$tabpay = array();
$tabbq = array();
$tabtp = array();
$tabtype = array();
$tabmoreinfo = array();
$account_customer = 'NotDefined';
$account_supplier = 'NotDefined';
$account_employee = 'NotDefined';
$result = $db->query($sql);
$now = \dol_now();
$accountingaccountcustomer = new \AccountingAccount($db);
$accountingaccountsupplier = new \AccountingAccount($db);
$accountingaccountpayment = new \AccountingAccount($db);
$accountingaccountexpensereport = new \AccountingAccount($db);
$accountingaccountsuspense = new \AccountingAccount($db);
$error = 0;
$action = '';
/*
 * View
 */
$form = new \Form($db);
$invoicestatic = new \Facture($db);
$invoicesupplierstatic = new \FactureFournisseur($db);
$expensereportstatic = new \ExpenseReport($db);
$vatstatic = new \Tva($db);
$donationstatic = new \Don($db);
$loanstatic = new \Loan($db);
$salarystatic = new \Salary($db);
$variousstatic = new \PaymentVarious($db);
$title = $langs->trans("GenerationOfAccountingEntries") . ' - ' . $accountingjournalstatic->getNomUrl(0, 2, 1, '', 1);
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double#G&eacute;n&eacute;ration_des_&eacute;critures_en_comptabilit&eacute;';
$nom = $title;
$builddate = \dol_now();
//$description = $langs->trans("DescFinanceJournal") . '<br>';
$description = $langs->trans("DescJournalOnlyBindedVisible") . '<br>';
$listofchoices = array('notyet' => $langs->trans("NotYetInGeneralLedger"), 'already' => $langs->trans("AlreadyInGeneralLedger"));
$period = $form->selectDate($date_start ? $date_start : -1, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end ? $date_end : -1, 'date_end', 0, 0, 0, '', 1, 0);
$varlink = 'id_journal=' . $id_journal;
$periodlink = '';
$exportlink = '';
$listofchoices = array(1 => $langs->trans("TransfertAllBankLines"), 2 => $langs->trans("TransfertOnlyConciliatedBankLine"));
$moreoptions = ["BankLineConciliated" => $form->selectarray('only_rappro', $listofchoices, $only_rappro, 0, 0, 0, '', 0, 0, 0, '', 'minwidth75 valignmiddle')];
$desc = '';
// Bank test
$sql = "SELECT COUNT(rowid) as nb FROM " . \MAIN_DB_PREFIX . "bank_account WHERE entity = " . (int) $conf->entity . " AND fk_accountancy_journal IS NULL AND clos=0";
$resql = $db->query($sql);
$i = 0;
/**
 * Return source for doc_ref of a bank transaction
 *
 * @param 	array<string,null|int|float|string> 	$val	Array of val
 * @param 	string	$typerecord		Type of record ('payment', 'payment_supplier', 'payment_expensereport', 'payment_vat', ...)
 * @return 	string					A string label to describe a record into llx_bank_url
 */
function getSourceDocRef($val, $typerecord)
{
}