<?php

// Define modecompta ('CREANCES-DETTES' or 'RECETTES-DEPENSES')
$modecompta = \getDolGlobalString('ACCOUNTING_MODE');
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$sortfield = \GETPOST("sortfield", 'aZ09comma');
$socid = \GETPOSTINT('socid');
// Category
$selected_cat = \GETPOSTINT('search_categ');
$subcat = \false;
// Date range
$year = \GETPOSTINT("year");
$month = \GETPOSTINT("month");
$search_societe = \GETPOST("search_societe", 'alpha');
$search_zip = \GETPOST("search_zip", 'alpha');
$search_town = \GETPOST("search_town", 'alpha');
$search_country = \GETPOST("search_country", 'aZ09');
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
$q = \GETPOSTINT("q") ? \GETPOSTINT("q") : 0;
//print dol_print_date($date_start, 'dayhour', 'gmt');
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
$thirdparty_static = new \Societe($db);
$formother = new \FormOther($db);
$exportlink = "";
$namelink = "";
$builddate = 0;
$calcmode = '';
$name = '';
$name = $langs->trans("Turnover") . ', ' . $langs->trans("ByThirdParties");
$calcmode = $langs->trans("CalcModeDebt");
//$calcmode.='<br>('.$langs->trans("SeeReportInInputOutputMode",'<a href="'.$_SERVER["PHP_SELF"].'?year='.$year_start.'&modecompta=RECETTES-DEPENSES">','</a>').')';
$description = $langs->trans("RulesCADue");
$builddate = \dol_now();
// elseif ($modecompta == "BOOKKEEPING") {
// } elseif ($modecompta == "BOOKKEEPINGCOLLECTED") {
// }
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0, 0, '', '', '', '', 1, '', '', 'tzserver');
$name = array();
// Show Array
$catotal = 0;
$catotal_ht = 0;
$sql = "SELECT DISTINCT s.rowid as socid, s.nom as name, s.name_alias, s.zip, s.town, s.fk_pays,";
//echo $sql;
$amount = array();
$amount_ht = array();
$address_zip = array();
$address_town = array();
$address_pays = array();
$result = $db->query($sql);
$sql = "SELECT '0' as socid, 'Autres' as name, sum(p.amount) as amount_ttc";
$result = $db->query($sql);
// Show array
$i = 0;
$moreforfilter = '';
$arrayforsort = $name;