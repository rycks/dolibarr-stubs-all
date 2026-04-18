<?php

$id_report = \GETPOSTINT('id_report');
$error = 0;
$mesg = '';
$action = \GETPOST('action', 'aZ09');
$cat_id = \GETPOST('account_category');
$selectcpt = \GETPOST('cpt_bk');
$id = \GETPOSTINT('id');
$rowid = \GETPOSTINT('rowid');
$cancel = \GETPOST('cancel', 'alpha');
$showaccountdetail = \GETPOST('showaccountdetail', 'aZ09') ? \GETPOST('showaccountdetail', 'aZ09') : 'no';
$date_startmonth = \GETPOSTINT('date_startmonth');
$date_startday = \GETPOSTINT('date_startday');
$date_startyear = \GETPOSTINT('date_startyear');
$date_endmonth = \GETPOSTINT('date_endmonth');
$date_endday = \GETPOSTINT('date_endday');
$date_endyear = \GETPOSTINT('date_endyear');
$nbofyear = 1;
// Change this to test different cases of setup
//$conf->global->SOCIETE_FISCAL_MONTH_START = 7;
// Date range
$year = \GETPOSTINT('year');
$date_start = \dol_mktime(0, 0, 0, $date_startmonth, $date_startday, $date_startyear);
$date_end = \dol_mktime(23, 59, 59, $date_endmonth, $date_endday, $date_endyear);
// We define date_start and date_end
$q = \GETPOSTINT("q") ? \GETPOSTINT("q") : 0;
// $date_start and $date_end are defined. We force $start_year and $nbofyear
$tmps = \dol_getdate($date_start);
$start_year = $tmps['year'];
$start_month = $tmps['mon'];
$tmpe = \dol_getdate($date_end);
$year_end = $tmpe['year'];
$month_end = $tmpe['mon'];
$nbofyear = $year_end - $start_year + 1;
$date_startmonth = $start_month;
$date_endmonth = $month_end;
$date_start_previous = \dol_time_plus_duree($date_start, -1, 'y');
$date_end_previous = \dol_time_plus_duree($date_end, -1, 'y');
// Define modecompta ('CREANCES-DETTES' or 'RECETTES-DEPENSES' or 'BOOKKEEPING')
$modecompta = \getDolGlobalString('ACCOUNTING_MODE');
$AccCat = new \AccountancyCategory($db);
// Security check
$socid = \GETPOSTINT('socid');
/*
 * View
 */
$months = array($langs->trans("MonthShort01"), $langs->trans("MonthShort02"), $langs->trans("MonthShort03"), $langs->trans("MonthShort04"), $langs->trans("MonthShort05"), $langs->trans("MonthShort06"), $langs->trans("MonthShort07"), $langs->trans("MonthShort08"), $langs->trans("MonthShort09"), $langs->trans("MonthShort10"), $langs->trans("MonthShort11"), $langs->trans("MonthShort12"));
$builddate = 0;
$name = '';
$period = '';
$calcmode = 0;
$form = new \Form($db);
$textprevyear = '<a href="' . $_SERVER["PHP_SELF"] . '?year=' . ($start_year - 1) . '&showaccountdetail=' . \urlencode($showaccountdetail) . '">' . \img_previous() . '</a>';
$textnextyear = ' &nbsp; <a href="' . $_SERVER["PHP_SELF"] . '?year=' . ($start_year + 1) . '&showaccountdetail=' . \urlencode($showaccountdetail) . '">' . \img_next() . '</a>';
$name = $langs->trans("AnnualByAccountDueDebtMode");
$calcmode = $langs->trans("CalcModeDebt");
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
//$periodlink='<a href="'.$_SERVER["PHP_SELF"].'?year='.($year-1).'&modecompta='.$modecompta.'">'.img_previous().'</a> <a href="'.$_SERVER["PHP_SELF"].'?year='.($year+1).'&modecompta='.$modecompta.'">'.img_next().'</a>';
$description = $langs->trans("RulesResultDue");
$builddate = \dol_now();
$moreforfilter = '';