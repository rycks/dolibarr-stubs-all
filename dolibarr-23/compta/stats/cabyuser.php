<?php

$socid = \GETPOSTINT('socid');
// Define modecompta ('CREANCES-DETTES' or 'RECETTES-DEPENSES')
$modecompta = \getDolGlobalString('ACCOUNTING_MODE');
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$sortfield = \GETPOST("sortfield", 'aZ09comma');
// Date range
$year = \GETPOSTINT("year");
$month = \GETPOSTINT("month");
$date_startyear = \GETPOSTINT("date_startyear");
$date_startmonth = \GETPOSTINT("date_startmonth");
$date_startday = \GETPOSTINT("date_startday");
$date_endyear = \GETPOSTINT("date_endyear");
$date_endmonth = \GETPOSTINT("date_endmonth");
$date_endday = \GETPOSTINT("date_endday");
$date_start = \dol_mktime(0, 0, 0, \GETPOSTINT("date_startmonth"), \GETPOSTINT("date_startday"), \GETPOSTINT("date_startyear"), 'tzserver');
// We use timezone of server so report is same from everywhere
$date_end = \dol_mktime(23, 59, 59, \GETPOSTINT("date_endmonth"), \GETPOSTINT("date_endday"), \GETPOSTINT("date_endyear"), 'tzserver');
// We define date_start and date_end
$q = \GETPOST("q") ? \GETPOST("q") : 0;
// $date_start and $date_end are defined. We force $year_start and $nbofyear
$tmps = \dol_getdate($date_start);
$year_start = $tmps['year'];
$tmpe = \dol_getdate($date_end);
$year_end = $tmpe['year'];
$nbofyear = $year_end - $year_start + 1;
$commonparams = array();
$headerparams = array();
$tableparams = array();
// Adding common parameters
$allparams = \array_merge($commonparams, $headerparams, $tableparams);
$headerparams = \array_merge($commonparams, $headerparams);
$tableparams = \array_merge($commonparams, $tableparams);
$paramslink = "";
$form = new \Form($db);
$exportlink = "";
$namelink = "";
$builddate = 0;
$calcmode = '';
$name = '';
$name = $langs->trans("Turnover") . ', ' . $langs->trans("ByUserAuthorOfInvoice");
$calcmode = $langs->trans("CalcModeDebt");
//$calcmode.='<br>('.$langs->trans("SeeReportInInputOutputMode",'<a href="'.$_SERVER["PHP_SELF"].'?year='.$year_start.'&modecompta=RECETTES-DEPENSES">','</a>').')';
$description = $langs->trans("RulesCADue");
$builddate = \dol_now();
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0, 0, '', '', '', '', 1, '', '', 'tzserver');
$moreparam = array();
$name = array();
$catotal = 0;
$catotal_ht = 0;
$sql = "SELECT u.rowid as rowid, u.lastname as name, u.firstname as firstname, sum(f.total_ht) as amount, sum(f.total_ttc) as amount_ttc";
$amount = array();
$amount_ht = array();
$result = $db->query($sql);
$sql = "SELECT -1 as rowidx, '' as name, '' as firstname, sum(DISTINCT p.amount) as amount_ttc";
$result = $db->query($sql);
$moreforfilter = '';
$arrayforsort = $name;
$i = 0;