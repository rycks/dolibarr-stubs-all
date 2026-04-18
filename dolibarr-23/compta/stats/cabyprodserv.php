<?php

// Security pack (data & check)
$socid = \GETPOSTINT('socid');
// Define modecompta ('CREANCES-DETTES' or 'RECETTES-DEPENSES')
$modecompta = \getDolGlobalString('ACCOUNTING_MODE');
$sortorder = \GETPOST("sortorder", 'aZ09comma');
$sortfield = \GETPOST("sortfield", 'aZ09comma');
// Category
$selected_cat = \GETPOST('search_categ', 'intcomma');
$selected_catsoc = \GETPOST('search_categ_soc', 'intcomma');
$selected_soc = \GETPOST('search_soc', 'intcomma');
$typent_id = \GETPOST('typent_id', 'int');
$subcat = \false;
$categorie = new \Categorie($db);
// product/service
$selected_type = \GETPOST('search_type', 'intcomma');
// Date range
$year = \GETPOSTINT("year");
$month = \GETPOSTINT("month");
$date_startyear = \GETPOST("date_startyear");
$date_startmonth = \GETPOST("date_startmonth");
$date_startday = \GETPOST("date_startday");
$date_endyear = \GETPOST("date_endyear");
$date_endmonth = \GETPOST("date_endmonth");
$date_endday = \GETPOST("date_endday");
$date_start = \dol_mktime(0, 0, 0, \GETPOSTINT("date_startmonth"), \GETPOSTINT("date_startday"), \GETPOSTINT("date_startyear"), 'tzserver');
// We use timezone of server so report is same from everywhere
$date_end = \dol_mktime(23, 59, 59, \GETPOSTINT("date_endmonth"), \GETPOSTINT("date_endday"), \GETPOSTINT("date_endyear"), 'tzserver');
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
$paramslink = "";
$form = new \Form($db);
$formother = new \FormOther($db);
$exportlink = "";
$namelink = "";
$builddate = 0;
$calcmode = '';
$name = '';
$period = '';
$periodlink = '';
$name = $langs->trans("Turnover") . ', ' . $langs->trans("ByProductsAndServices");
$calcmode = $langs->trans("CalcModeDebt");
//$calcmode.='<br>('.$langs->trans("SeeReportInInputOutputMode",'<a href="'.$_SERVER["PHP_SELF"].'?year='.$year_start.'&modecompta=RECETTES-DEPENSES">','</a>').')';
$description = $langs->trans("RulesCADue");
$builddate = \dol_now();
// elseif ($modecompta == "BOOKKEEPING") {
// } elseif ($modecompta == "BOOKKEEPINGCOLLECTED") {
// }
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0, 0, '', '', '', '', 1, '', '', 'tzserver');
$name = array();
// SQL request
$catotal = 0;
$catotal_ht = 0;
$qtytotal = 0;
$sql = "SELECT p.rowid as rowid, p.ref as ref, p.label as label, p.fk_product_type as product_type,";
$parameters = array();
$parameters = array();
// Search for tag/category ($searchCategoryProductList is an array of ID)
$searchCategoryProductOperator = \GETPOSTINT('search_category_product_operator');
$searchCategoryProductList = array($selected_cat);
// Search for tag/category ($searchCategorySocieteList is an array of ID)
$searchCategorySocieteOperator = \GETPOSTINT('search_category_societe_operator');
$searchCategorySocieteList = array($selected_catsoc);
$parameters = array();
$result = $db->query($sql);
$amount_ht = array();
$amount = array();
$qty = array();
// Show Array
$i = 0;
$moreforfilter = '';
$formcompany = new \FormCompany($db);
// NONE means we keep sort of original array, so we sort on position. ASC, means next function will sort on ascending label.
$sortparam = \getDolGlobalString('SOCIETE_SORT_ON_TYPEENT', 'ASC');