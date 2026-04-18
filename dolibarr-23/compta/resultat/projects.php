<?php

$date_startday = \GETPOSTINT('date_startday');
$date_startmonth = \GETPOSTINT('date_startmonth');
$date_startyear = \GETPOSTINT('date_startyear');
$date_endday = \GETPOSTINT('date_endday');
$date_endmonth = \GETPOSTINT('date_endmonth');
$date_endyear = \GETPOSTINT('date_endyear');
$showaccountdetail = \GETPOST('showaccountdetail', 'aZ09') ? \GETPOST('showaccountdetail', 'aZ09') : 'yes';
$search_project_ref = \GETPOST('search_project_ref', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
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
$modecompta = \getDolGlobalString('ACCOUNTING_MODE', 'CREANCES-DETTES');
$AccCat = new \AccountancyCategory($db);
// Security check
$socid = \GETPOSTINT('socid');
$form = new \Form($db);
$periodlink = '';
$exportlink = '';
$total_ht = 0;
$total_ttc = 0;
$name = $langs->trans("ReportInOut") . ', ' . $langs->trans("ByProjects");
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$builddate = \dol_now();
$description = '';
$name = $langs->trans("ReportInOut") . ', ' . $langs->trans("ByProjects");
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$periodlink = $year_start ? "<a href='" . $_SERVER["PHP_SELF"] . "?year=" . ($tmps['year'] - 1) . "&modecompta=" . $modecompta . "'>" . \img_previous() . "</a> <a href='" . $_SERVER["PHP_SELF"] . "?year=" . ($tmps['year'] + 1) . "&modecompta=" . $modecompta . "'>" . \img_next() . "</a>" : "";
$description = $langs->trans("RulesAmountWithTaxExcluded");
$builddate = \dol_now();
// Define $calcmode line
$calcmode = '';
/*
if (isModEnabled('accounting') && $modecompta != 'BOOKKEEPING') {
	print info_admin($langs->trans("WarningReportNotReliable"), 0, 0, '1');
}
*/
// Show report array
$param = '&modecompta=' . \urlencode($modecompta) . '&showaccountdetail=' . \urlencode($showaccountdetail);
$search_date_url = '';
$total_ht_outcome = $total_ttc_outcome = $total_ht_income = $total_ttc_income = 0;
$sql = '';
$result = $db->query($sql);
$subtotal_ht = 0;
$subtotal_ttc = 0;
$result = $db->query($sql);
$action = "balanceclient";
$object = array(&$total_ht, &$total_ttc);
$reshook = $hookmanager->executeHooks('addReportInfo', $parameters, $object, $action);
// Total
$nbcols = 0;