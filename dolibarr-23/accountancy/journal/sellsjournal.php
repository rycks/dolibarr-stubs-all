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
$error = 0;
$tabfac = array();
$tabht = array();
$tabtva = array();
$tabwarranty = array();
$tabttc = array();
$tablocaltax1 = array();
$tablocaltax2 = array();
$cptcli = 'NotDefined';
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', $parameters, $user, $action);
// Note that $action and $object may have been modified by some hooks
$accountingaccount = new \AccountingAccount($db);
// Get information of a journal
$accountingjournalstatic = new \AccountingJournal($db);
$journal = $accountingjournalstatic->code;
$journal_label = $accountingjournalstatic->label;
$date_start = \dol_mktime(0, 0, 0, $date_startmonth, $date_startday, $date_startyear);
$date_end = \dol_mktime(23, 59, 59, $date_endmonth, $date_endday, $date_endyear);
$pastmonth = \null;
// Initialise, could be unset
$pastmonthyear = \null;
$sql = "SELECT f.rowid, f.ref, f.type, f.situation_cycle_ref, f.datef as df, f.ref_client, f.date_lim_reglement as dlr, f.close_code, f.retained_warranty, f.revenuestamp, f.situation_final,";
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListFrom', $parameters);
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters);
$tabfac = array();
$tabht = array();
$tabtva = array();
$def_tva = array();
$tabwarranty = array();
$tabrevenuestamp = array();
$tabttc = array();
$tablocaltax1 = array();
$tablocaltax2 = array();
$tabcompany = array();
$vatdata_cache = array();
// Variables
$cptcli = \getDolGlobalString('ACCOUNTING_ACCOUNT_CUSTOMER', 'NotDefined');
$cpttva = \getDolGlobalString('ACCOUNTING_VAT_SOLD_ACCOUNT', 'NotDefined');
$cptlocaltax1 = \getDolGlobalString('ACCOUNTING_LT1_SOLD_ACCOUNT', 'NotDefined');
$cptlocaltax2 = \getDolGlobalString('ACCOUNTING_LT2_SOLD_ACCOUNT', 'NotDefined');
$result = $db->query($sql);
$errorforinvoice = array();
$sql = "\n\tSELECT\n\t\tfk_facture,\n\t\tCOUNT(fd.rowid) as nb\n\tFROM\n\t\t" . \MAIN_DB_PREFIX . "facturedet as fd\n\tWHERE\n\t\tfd.product_type <= 2\n\t\tAND fd.fk_code_ventilation <= 0\n\t\tAND fd.total_ttc <> 0\n\t\tAND fk_facture IN (" . $db->sanitize(\implode(",", \array_keys($tabfac))) . ")\n\tGROUP BY fk_facture\n\t";
$resql = $db->query($sql);
$now = \dol_now();
$error = 0;
$companystatic = new \Societe($db);
$invoicestatic = new \Facture($db);
$bookkeepingstatic = new \BookKeeping($db);
$accountingaccountcustomer = new \AccountingAccount($db);
$accountingaccountcustomerwarranty = new \AccountingAccount($db);
$tabpay = $tabfac;
$action = '';
/*
 * View
 */
$form = new \Form($db);
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
// Button to write into Ledger
$acctCustomerNotConfigured = \in_array(\getDolGlobalString('ACCOUNTING_ACCOUNT_CUSTOMER'), ['', '-1']);
$i = 0;
$companystatic = new \Client($db);
$invoicestatic = new \Facture($db);
$bookkeepingstatic = new \BookKeeping($db);