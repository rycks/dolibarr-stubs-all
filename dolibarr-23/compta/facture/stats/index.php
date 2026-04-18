<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height');
$mode = \GETPOST("mode") ? \GETPOST("mode") : 'customer';
$object_status = \GETPOST('object_status', 'intcomma');
$typent_id = \GETPOSTINT('typent_id');
$categ_id = \GETPOSTINT('categ_id');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$select_categ_categ_id = \GETPOST('select_categ_categ_id', 'array:int');
$select_categ_invoice_id = \GETPOST('select_categ_invoice_id', 'array:int');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$nowyear = \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$year = \GETPOST('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$formother = new \FormOther($db);
$picto = 'bill';
$title = $langs->trans("BillsStatistics");
$dir = $conf->facture->dir_temp;
$stats = new \FactureStats($db, $socid, $mode, $userid > 0 ? $userid : 0, $typent_id > 0 ? $typent_id : 0, $categ_id > 0 ? $categ_id : 0);
// Build graphic number of object
// $data = array(array('Lib',val1,val2,val3),...)
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
$filenamenb = $dir . "/invoicesnbinyear-" . $year . ".png";
$fileurlnb = '';
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
// Build graphic amount of object
$data = $stats->getAmountByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
$filenameamount = $dir . "/invoicesamountinyear-" . $year . ".png";
$fileurlamount = '';
$px2 = new \DolGraph();
$mesg = $px2->isGraphKo();
$data = $stats->getAverageByMonthWithPrevYear($endyear, $startyear);
$fileurl_avg = '';
$filename_avg = $dir . '/ordersaverage-' . $user->id . '-' . $year . '.png';
$px3 = new \DolGraph();
$mesg = $px3->isGraphKo();
// Show array
$data = $stats->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$filter = '';
$sortparam_typent = \getDolGlobalString('SOCIETE_SORT_ON_TYPEENT', 'ASC');
$cat_type = '';
$cat_label = '';
$cate_arbo = $form->select_all_categories($cat_type, '', 'parent', 0, 0, 1);
$cat_type = '';
$cat_label = '';
$cate_arbo = $form->select_all_categories($cat_type, '', 'parent', 0, 0, 1);
$oldyear = 0;