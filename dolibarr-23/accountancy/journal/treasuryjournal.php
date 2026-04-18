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
$result_lines = array();
// Data cached
$payment_ids = array();
$tabpay = array();
$tabaccount = array();
$tabobject = array();
$tabaccountingaccount = array();
$tabvatdata = array();
$resql = $db->query($sql);
/**
 * Filter for payment
 *
 * @param	array<string, mixed>	$v		Table of payment
 * @return	bool
 */
function payment_filter($v)
{
}
$tabpay = \array_filter($tabpay, 'payment_filter');
$accountingaccount = new \AccountingAccount($db);
// Get code of finance journal
$accountingjournalstatic = new \AccountingJournal($db);
$journal = $accountingjournalstatic->code;
$journal_label = $langs->transnoentitiesnoconv($accountingjournalstatic->label);
$MAXNBERRORS = 5;
$action = '';
/*
 * View
 */
$form = new \Form($db);
$description = \null;
$nom = $langs->trans("FinanceJournal") . ' | ' . $accountingjournalstatic->getNomUrl(0, 1, 1, '', 1);
$nomlink = '';
$builddate = \dol_now();
$description = $langs->trans("DescJournalOnlyBindedVisible") . '<br>';
$listofchoices = array('notyet' => $langs->trans("NotYetInGeneralLedger"), 'already' => $langs->trans("AlreadyInGeneralLedger"));
$period = $form->selectDate($date_start ?: -1, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end ?: -1, 'date_end', 0, 0, 0, '', 1, 0);
$varlink = 'id_journal=' . $id_journal;
$periodlink = '';
$exportlink = '';
// Test that setup is complete
$sql = "SELECT COUNT(rowid) as nb FROM " . $db->prefix() . "bank_account WHERE fk_accountancy_journal IS NULL AND clos = 0";
$resql = $db->query($sql);
$i = 0;