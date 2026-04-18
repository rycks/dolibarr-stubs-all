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
$tabttc = array();
$tablocaltax1 = array();
$tablocaltax2 = array();
$tabrctva = array();
$tabrclocaltax1 = array();
$tabrclocaltax2 = array();
$tabpay = array();
$cptcli = 'NotDefined';
$cptfour = 'NotDefined';
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
$sql = "SELECT f.rowid, f.ref as ref, f.type, f.datef as df, f.libelle as label, f.ref_supplier, f.date_lim_reglement as dlr, f.close_code, f.vat_reverse_charge,";
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
$tabttc = array();
$tablocaltax1 = array();
$tablocaltax2 = array();
$tabcompany = array();
$tabother = array();
$tabrctva = array();
$tabrclocaltax1 = array();
$tabrclocaltax2 = array();
$vatdata_cache = array();
// Variables
$cptfour = \getDolGlobalString('ACCOUNTING_ACCOUNT_SUPPLIER', 'NotDefined');
$cpttva = \getDolGlobalString('ACCOUNTING_VAT_BUY_ACCOUNT', 'NotDefined');
$rcctva = \getDolGlobalString('ACCOUNTING_VAT_BUY_REVERSE_CHARGES_CREDIT', 'NotDefined');
$rcdtva = \getDolGlobalString('ACCOUNTING_VAT_BUY_REVERSE_CHARGES_DEBIT', 'NotDefined');
$cptlocaltax1 = \getDolGlobalString('ACCOUNTING_LT1_BUY_ACCOUNT', 'NotDefined');
$rcclocaltax1 = \getDolGlobalString('ACCOUNTING_LT1_BUY_REVERSE_CHARGES_CREDIT', 'NotDefined');
$rcdlocaltax1 = \getDolGlobalString('ACCOUNTING_LT1_BUY_REVERSE_CHARGES_DEBIT', 'NotDefined');
$cptlocaltax2 = \getDolGlobalString('ACCOUNTING_LT2_BUY_ACCOUNT', 'NotDefined');
$rcclocaltax2 = \getDolGlobalString('ACCOUNTING_LT2_BUY_REVERSE_CHARGES_CREDIT', 'NotDefined');
$rcdlocaltax2 = \getDolGlobalString('ACCOUNTING_LT2_BUY_REVERSE_CHARGES_DEBIT', 'NotDefined');
$noTaxDispatchingKeepWithLines = \getDolGlobalInt('ACCOUNTING_PURCHASES_DO_NOT_DISPATCH_TAXES');
//If enabled, Tax will NOT get split off from the base entry and credited to a separate tax account (good for non-VAT countries like USA)
$country_code_in_EEC = \getCountriesInEEC();
// This make a database call but there is a cache done into $conf->cache['country_code_in_EEC']
$result = $db->query($sql);
$errorforinvoice = array();
$now = \dol_now();
$error = 0;
$companystatic = new \Societe($db);
$invoicestatic = new \FactureFournisseur($db);
$accountingaccountsupplier = new \AccountingAccount($db);
$bookkeepingstatic = new \BookKeeping($db);
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
$acctSupplierNotConfigured = \in_array(\getDolGlobalString('ACCOUNTING_ACCOUNT_SUPPLIER'), ['', '-1']);
$i = 0;
$invoicestatic = new \FactureFournisseur($db);
$companystatic = new \Fournisseur($db);
$bookkeepingstatic = new \BookKeeping($db);