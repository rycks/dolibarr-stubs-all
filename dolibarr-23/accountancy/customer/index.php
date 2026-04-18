<?php

$validatemonth = \GETPOSTINT('validatemonth');
$validateyear = \GETPOSTINT('validateyear');
$accountingAccount = new \AccountingAccount($db);
$month_start = \getDolGlobalInt('SOCIETE_FISCAL_MONTH_START', 1);
$year_end = $year_start + 1;
$month_end = $month_start - 1;
$search_date_start = \dol_mktime(0, 0, 0, $month_start, 1, $year_start);
$search_date_end = \dol_get_last_day($year_end, $month_end);
$year_current = $year_start;
// Validate History
$action = \GETPOST('action', 'aZ09');
$chartaccountcode = \dol_getIdFromCode($db, \getDolGlobalString('CHARTOFACCOUNTS'), 'accounting_system', 'rowid', 'pcg_version');
$error = 0;
$sql1 = "UPDATE " . $db->prefix() . "facturedet as fd";
$resql1 = $db->query($sql1);
$error = 0;
$nbbinddone = 0;
$nbbindfailed = 0;
$notpossible = 0;
// Now make the binding. Bind automatically only for product with a dedicated account that exists into chart of account, others need a manual bind
// Customer Invoice lines (must be same request than into page list.php for manual binding)
$sql = "SELECT f.rowid as facid, f.ref as ref, f.datef, f.type as ftype, f.situation_cycle_ref, f.fk_facture_source,";
$alias_societe_perentity = !\getDolGlobalString('MAIN_COMPANY_PERENTITY_SHARED') ? "s" : "spe";
$alias_product_perentity = !\getDolGlobalString('MAIN_PRODUCT_PERENTITY_SHARED') ? "p" : "ppe";
$result = $db->query($sql);
/*
 * View
 */
$help_url = 'EN:Module_Double_Entry_Accounting|FR:Module_Comptabilit&eacute;_en_Partie_Double#Liaisons_comptables';
$textprevyear = '<a href="' . $_SERVER["PHP_SELF"] . '?year=' . ($year_current - 1) . '">' . \img_previous() . '</a>';
$textnextyear = '&nbsp;<a href="' . $_SERVER["PHP_SELF"] . '?year=' . ($year_current + 1) . '">' . \img_next() . '</a>';
$y = $year_current;
$buttonbind = '<a class="button small" href="' . $_SERVER['PHP_SELF'] . '?action=validatehistory&token=' . \newToken() . '&year=' . $year_current . '">' . \img_picto($langs->trans("ValidateHistory"), 'link', 'class="pictofixedwidth fa-color-unset"') . $langs->trans("ValidateHistory") . '</a>';
$sql = "SELECT " . $db->ifsql('aa.account_number IS NULL', "'tobind'", 'aa.account_number') . " AS codecomptable,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$sql = "SELECT " . $db->ifsql('aa.account_number IS NULL', "'tobind'", 'aa.account_number') . " AS codecomptable,";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$sql = "SELECT '" . $db->escape($langs->trans("TotalVente")) . "' AS total,";
$resql = $db->query($sql);