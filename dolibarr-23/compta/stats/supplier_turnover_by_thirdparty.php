<?php

// Define modecompta ('CREANCES-DETTES' or 'RECETTES-DEPENSES')
$modecompta = \getDolGlobalString('ACCOUNTING_MODE');
// Sort Order
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$sortfield = \GETPOST("sortfield", 'aZ09comma');
$socid = \GETPOSTINT('socid');
// Category
$selected_cat = \GETPOSTINT('search_categ');
$subcat = \false;
// Search Parameters
$search_societe = \GETPOST("search_societe", 'alpha');
$search_zip = \GETPOST("search_zip", 'alpha');
$search_town = \GETPOST("search_town", 'alpha');
$search_country = \GETPOST("search_country", 'aZ09');
$date_startyear = \GETPOST("date_startyear", 'alpha');
$date_startmonth = \GETPOST("date_startmonth", 'alpha');
$date_startday = \GETPOST("date_startday", 'alpha');
$date_endyear = \GETPOST("date_endyear", 'alpha');
$date_endmonth = \GETPOST("date_endmonth", 'alpha');
$date_endday = \GETPOST("date_endday", 'alpha');
$nbofyear = 1;
// Date range
$year = \GETPOSTINT("year");
$month = \GETPOSTINT("month");
$date_start = \dol_mktime(0, 0, 0, (int) $date_startmonth, (int) $date_startday, (int) $date_startyear, 'tzserver');
// We use timezone of server so report is same from everywhere
$date_end = \dol_mktime(23, 59, 59, (int) $date_endmonth, (int) $date_endday, (int) $date_endyear, 'tzserver');
// We define date_start and date_end
$q = \GETPOSTINT("q");
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
$paramslink = '';
$form = new \Form($db);
$thirdparty_static = new \Societe($db);
$formother = new \FormOther($db);
$calcmode = '';
$name = '';
$namelink = '';
$builddate = \dol_now();
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0, 0, '', '', '', '', 1, '', '', 'tzserver');
$exportlink = '';
// Show Array
$catotal = 0;
$catotal_ht = 0;
$name = array();
$amount = array();
$amount_ht = array();
$address_zip = array();
$address_town = array();
$address_pays = array();
$sql = "SELECT DISTINCT s.rowid as socid, s.nom as name, s.zip, s.town, s.fk_pays,";
//echo $sql;
$catotal_ht = 0;
$catotal = 0;
$resql = $db->query($sql);
// Show array
$i = 0;
$moreforfilter = '';
$arrayforsort = $name;