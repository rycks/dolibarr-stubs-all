<?php

$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height');
$mode = \GETPOSTISSET("mode") ? \GETPOST("mode", 'aZ09') : 'customer';
$object_status = \GETPOST('object_status', 'intcomma');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$id = \GETPOSTINT('id');
$result = \restrictedArea($user, 'expensereport', $id, '');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$nowyear = \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$year = \GETPOST('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
/*
 * View
 */
$form = new \Form($db);
$tmpexpensereport = new \ExpenseReport($db);
$title = $langs->trans("TripsAndExpensesStatistics");
$dir = $conf->expensereport->dir_temp;
$stats = new \ExpenseReportStats($db, $socid, $userid);
// Build graphic number of object
// $data = array(array('Lib',val1,val2,val3),...)
//print "$endyear, $startyear";
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
$filenamenb = $dir . "/tripsexpensesnbinyear-" . $year . ".png";
$fileurlnb = \DOL_URL_ROOT . '/viewimage.php?modulepart=tripsexpensesstats&amp;file=tripsexpensesnbinyear-' . $year . '.png';
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
// Build graphic amount of object
$data = $stats->getAmountByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
$filenameamount = $dir . "/tripsexpensesamountinyear-" . $year . ".png";
$fileurlamount = \DOL_URL_ROOT . '/viewimage.php?modulepart=tripsexpensesstats&amp;file=tripsexpensesamountinyear-' . $year . '.png';
$px2 = new \DolGraph();
$mesg = $px2->isGraphKo();
$data = $stats->getAverageByMonthWithPrevYear($endyear, $startyear);
$fileurl_avg = \null;
$filename_avg = $dir . '/ordersaverage-' . $user->id . '-' . $year . '.png';
$px3 = new \DolGraph();
$mesg = $px3->isGraphKo();
// Show array
$data = $stats->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$include = '';
$liststatus = $tmpexpensereport->labelStatus;
$oldyear = 0;