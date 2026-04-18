<?php

$date_startday = \GETPOSTINT('date_startday');
$date_startmonth = \GETPOSTINT('date_startmonth');
$date_startyear = \GETPOSTINT('date_startyear');
$date_endday = \GETPOSTINT('date_endday');
$date_endmonth = \GETPOSTINT('date_endmonth');
$date_endyear = \GETPOSTINT('date_endyear');
$nbofyear = 4;
// Date range
$year = \GETPOSTINT('year');
$date_start = \dol_mktime(0, 0, 0, $date_startmonth, $date_startday, $date_startyear, 'tzserver');
// We use timezone of server so report is same from everywhere
$date_end = \dol_mktime(23, 59, 59, $date_endmonth, $date_endday, $date_endyear, 'tzserver');
// We define date_start and date_end
$q = \GETPOSTINT("q");
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$tmps = \dol_getdate($date_start);
$month_start = $tmps['mon'];
$year_start = $tmps['year'];
$tmpe = \dol_getdate($date_end);
$month_end = $tmpe['mon'];
$year_end = $tmpe['year'];
$nbofyear = $year_end - $year_start + 1;
// Define modecompta ('CREANCES-DETTES' or 'RECETTES-DEPENSES' or 'BOOKKEEPING')
$modecompta = \getDolGlobalString('ACCOUNTING_MODE');
$form = new \Form($db);
$exportlink = '';
$namelink = '';
$builddate = \dol_now();
$periodlink = '';
$name = '';
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0, 0, '', '', '', '', 1, '', '', 'tzserver');
$moreparam = array();
// Define $calcmode line
$calcmode = '';
$sql = "SELECT date_format(f.datef,'%Y-%m') as dm, sum(f.total_ht) as amount, sum(f.total_ttc) as amount_ttc";
// TODO Add a filter on $date_start and $date_end to reduce quantity on data
//print $sql;
$minyearmonth = $maxyearmonth = 0;
$cumulative = array();
$cumulative_ht = array();
$total_ht = array();
$total = array();
$result = $db->query($sql);
$moreforfilter = '';
$now_show_delta = 0;
$minyear = \substr($minyearmonth, 0, 4);
$maxyear = \substr($maxyearmonth, 0, 4);
$nowyear = \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$nowyearmonth = \dol_print_date(\dol_now(), "%Y-%m");
$maxyearmonth = \max($maxyearmonth, $nowyearmonth);
$now = \dol_now();
$casenow = \dol_print_date($now, "%Y-%m");
// Loop on each month
$nb_mois_decalage = \GETPOSTISSET('date_startmonth') ? \GETPOSTINT('date_startmonth') - 1 : (!\getDolGlobalInt('SOCIETE_FISCAL_MONTH_START') ? 0 : \getDolGlobalInt('SOCIETE_FISCAL_MONTH_START') - 1);