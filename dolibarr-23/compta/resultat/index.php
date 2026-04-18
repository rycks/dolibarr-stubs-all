<?php

$date_startday = \GETPOSTINT('date_startday');
$date_startmonth = \GETPOSTINT('date_startmonth');
$date_startyear = \GETPOSTINT('date_startyear');
$date_endday = \GETPOSTINT('date_endday');
$date_endmonth = \GETPOSTINT('date_endmonth');
$date_endyear = \GETPOSTINT('date_endyear');
$nbofyear = 4;
// Change this to test different cases of setup.
//$conf->global->SOCIETE_FISCAL_MONTH_START = 7;
// Date range
$year = \GETPOSTINT('year');
$date_start = \dol_mktime(0, 0, 0, $date_startmonth, $date_startday, $date_startyear, 'tzserver');
$date_end = \dol_mktime(23, 59, 59, $date_endmonth, $date_endday, $date_endyear, 'tzserver');
// We define date_start and date_end
$q = \GETPOST("q") ? \GETPOSTINT("q") : 0;
// $date_start and $date_end are defined. We force $year_start and $nbofyear
$tmps = \dol_getdate($date_start);
$year_start = $tmps['year'];
$tmpe = \dol_getdate($date_end);
$year_end = $tmpe['year'];
$nbofyear = $year_end - $year_start + 1;
//var_dump("year_start=".$year_start." year_end=".$year_end." nbofyear=".$nbofyear." date_start=".dol_print_date($date_start, 'dayhour')." date_end=".dol_print_date($date_end, 'dayhour'));
// Define modecompta ('CREANCES-DETTES' or 'RECETTES-DEPENSES' or 'BOOKKEEPING')
$modecompta = \getDolGlobalString('ACCOUNTING_MODE');
// Security check
$socid = \GETPOSTINT('socid');
$form = new \Form($db);
$builddate = 0;
$name = '';
$period = '';
$periodlink = '';
$exportlink = '';
$encaiss = array();
$encaiss_ttc = array();
$decaiss = array();
$decaiss_ttc = array();
$name = $langs->trans("ReportInOut") . ', ' . $langs->trans("ByYear");
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$periodlink = $year_start ? "<a href='" . $_SERVER["PHP_SELF"] . "?year=" . ($year_start + $nbofyear - 2) . "&modecompta=" . $modecompta . "'>" . \img_previous() . "</a> <a href='" . $_SERVER["PHP_SELF"] . "?year=" . ($year_start + $nbofyear) . "&modecompta=" . $modecompta . "'>" . \img_next() . "</a>" : "";
$description = $langs->trans("RulesAmountWithTaxExcluded");
$builddate = \dol_now();
// Define $calcmode line
$calcmode = '';
/*
 * Factures clients
 */
$subtotal_ht = 0;
$subtotal_ttc = 0;
$result = $db->query($sql);
//elseif ($modecompta == "BOOKKEEPING") {
// Nothing from this table
//}
/*
 * Frais, factures fournisseurs.
 */
$subtotal_ht = 0;
$subtotal_ttc = 0;
$result = $db->query($sql);
//elseif ($modecompta == "BOOKKEEPING") {
// Nothing from this table
//}
/*
 * TVA
 */
$subtotal_ht = 0;
$subtotal_ttc = 0;
// elseif ($modecompta == "BOOKKEEPING") {
// Nothing from this table
//}
/*
 * Social contributions
 */
$subtotal_ht = 0;
$subtotal_ttc = 0;
$result = $db->query($sql);
$sql = '';
$subtotal_ht = 0;
$subtotal_ttc = 0;
$result = $db->query($sql);
$result = $db->query($sql);
$subtotal_ht = 0;
$subtotal_ttc = 0;
$subtotal_ht = 0;
$subtotal_ttc = 0;
$result = $db->query($sql);
// decaiss
$sql = "SELECT date_format(p.datep, '%Y-%m') AS dm, SUM(p.amount) AS amount FROM " . \MAIN_DB_PREFIX . "payment_various as p";
$result = $db->query($sql);
// encaiss
$sql = "SELECT date_format(p.datep, '%Y-%m') AS dm, SUM(p.amount) AS amount FROM " . \MAIN_DB_PREFIX . "payment_various AS p";
$result = $db->query($sql);
$sql = "SELECT date_format(p.datep, '%Y-%m') AS dm, SUM(p.amount_capital + p.amount_insurance + p.amount_interest) AS amount";
$result = $db->query($sql);
$predefinedgroupwhere = "(";
$charofaccountstring = \getDolGlobalInt('CHARTOFACCOUNTS');
$charofaccountstring = \dol_getIdFromCode($db, \getDolGlobalString('CHARTOFACCOUNTS'), 'accounting_system', 'rowid', 'pcg_version');
$sql = "SELECT b.doc_ref, b.numero_compte, b.subledger_account, b.subledger_label, aa.pcg_type, date_format(b.doc_date,'%Y-%m') as dm, sum(b.debit) as debit, sum(b.credit) as credit, sum(b.montant) as amount";
//print $sql;
$subtotal_ht = 0;
$subtotal_ttc = 0;
$result = $db->query($sql);
$action = "balance";
$object = array(&$encaiss, &$encaiss_ttc, &$decaiss, &$decaiss_ttc);
$reshook = $hookmanager->executeHooks('addReportInfo', $parameters, $object, $action);
// Note that $action and $object may have been modified by some hooks
/*
 * Show result array
 */
$totentrees = array();
$totsorties = array();
$year_end_for_table = $year_end - (\getDolGlobalInt('SOCIETE_FISCAL_MONTH_START') > 1 ? 1 : 0);
// Loop on each month
$nb_mois_decalage = $conf->global->SOCIETE_FISCAL_MONTH_START ? $conf->global->SOCIETE_FISCAL_MONTH_START - 1 : 0;
// Total
$nbcols = 0;