<?php

$id_journal = \GETPOSTINT('id_journal');
$action = \GETPOST('action', 'aZ09');
$date_startmonth = \GETPOSTINT('date_startmonth');
$date_startday = \GETPOSTINT('date_startday');
$date_startyear = \GETPOSTINT('date_startyear');
$date_endmonth = \GETPOSTINT('date_endmonth');
$date_endday = \GETPOSTINT('date_endday');
$date_endyear = \GETPOSTINT('date_endyear');
$in_bookkeeping = \GETPOST('in_bookkeeping');
$now = \dol_now();
$parameters = array();
$taber = array();
// Initialise for static analysis
$tabht = array();
$tabtva = array();
$tabttc = array();
$tablocaltax1 = array();
$tablocaltax2 = array();
$tabuser = array();
$error = 0;
$errorforinvoice = array();
/*
 * Actions
 */
$accountingaccount = new \AccountingAccount($db);
// Get information of a journal
$accountingjournalstatic = new \AccountingJournal($db);
$journal = $accountingjournalstatic->code;
$journal_label = $accountingjournalstatic->label;
$date_start = \dol_mktime(0, 0, 0, $date_startmonth, $date_startday, $date_startyear);
$date_end = \dol_mktime(23, 59, 59, $date_endmonth, $date_endday, $date_endyear);
$pastmonth = \null;
// Initialise (could be unset)
$pastmonthyear = \null;
$sql = "SELECT er.rowid, er.ref, er.date_debut as de, er.date_fin as df,";
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
$result = $db->query($sql);
$now = \dol_now();
$error = 0;
$userstatic = new \User($db);
$bookkeepingstatic = new \BookKeeping($db);
$accountingaccountexpense = new \AccountingAccount($db);
$tabpay = $taber;
$action = '';
/*
 * View
 */
$form = new \Form($db);
$userstatic = new \User($db);
$title = $langs->trans("GenerationOfAccountingEntries") . ' - ' . $accountingjournalstatic->getNomUrl(0, 2, 1, '', 1);
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double#G&eacute;n&eacute;ration_des_&eacute;critures_en_comptabilit&eacute;';
$nom = $title;
$nomlink = '';
$periodlink = '';
$exportlink = '';
$builddate = \dol_now();
$description = $langs->trans("DescJournalOnlyBindedVisible") . '<br>';
$listofchoices = array('notyet' => $langs->trans("NotYetInGeneralLedger"), 'already' => $langs->trans("AlreadyInGeneralLedger"));
$period = $form->selectDate($date_start ? $date_start : -1, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end ? $date_end : -1, 'date_end', 0, 0, 0, '', 1, 0);
$varlink = 'id_journal=' . $id_journal;
$i = 0;
$i = 0;
$expensereportstatic = new \ExpenseReport($db);
$expensereportlinestatic = new \ExpenseReportLine($db);
$bookkeepingstatic = new \BookKeeping($db);