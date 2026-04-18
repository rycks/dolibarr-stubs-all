<?php

// Define modecompta ('CREANCES-DETTES' or 'RECETTES-DEPENSES')
$modecompta = \getDolGlobalString('ACCOUNTING_MODE');
// Sort Order
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$sortfield = \GETPOST("sortfield", 'aZ09comma');
// Category
$selected_cat = \GETPOSTINT('search_categ');
$selected_soc = \GETPOSTINT('search_soc');
$subcat = \false;
// product/service
$selected_type = \GETPOST('search_type', "intcomma");
$date_startyear = \GETPOSTINT("date_startyear");
$date_startmonth = \GETPOSTINT("date_startmonth");
$date_startday = \GETPOSTINT("date_startday");
$date_endyear = \GETPOSTINT("date_endyear");
$date_endmonth = \GETPOSTINT("date_endmonth");
$date_endday = \GETPOSTINT("date_endday");
$nbofyear = 1;
// Date range
$year = \GETPOSTINT("year");
$month = \GETPOSTINT("month");
$date_start = \dol_mktime(0, 0, 0, $date_startmonth, $date_startday, $date_startyear, 'tzserver');
// We use timezone of server so report is same from everywhere
$date_end = \dol_mktime(23, 59, 59, $date_endmonth, $date_endday, $date_endyear, 'tzserver');
// We use timezone of server so report is same from everywhere
// We define date_start and date_end
$q = 0;
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
// Security pack (data & check)
$socid = \GETPOSTINT('socid');
$form = new \Form($db);
$formother = new \FormOther($db);
$builddate = \dol_now();
$periodlink = '';
$name = '';
$calcmode = '';
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0, 0, '', '', '', '', 1, '', '', 'tzserver');
$exportlink = '';
$name = array();
$amount = array();
$amount_ht = array();
$qty = array();
// SQL request
$catotal = 0;
$catotal_ht = 0;
$qtytotal = 0;
$sql = "SELECT DISTINCT p.rowid as rowid, p.ref as ref, p.label as label, p.fk_product_type as product_type,";
$resql = $db->query($sql);
// Show array
$i = 0;
$moreforfilter = '';