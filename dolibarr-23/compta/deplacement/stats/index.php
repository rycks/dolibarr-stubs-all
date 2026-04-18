<?php

$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$id = \GETPOSTINT('id');
$result = \restrictedArea($user, 'deplacement', $id, '');
// Other security check
$childids = $user->getAllChildIds();
$nowyear = (int) \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$year = \GETPOSTINT('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
$mode = \GETPOST("mode") ? \GETPOST("mode") : 'customer';
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("TripsAndExpensesStatistics");
$dir = $conf->deplacement->dir_temp;
$useridtofilter = $userid;
$useridtofilter = $childids;
$stats = new \DeplacementStats($db, $socid, $useridtofilter);
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
$filename_avg = '';
$fileurl_avg = '';
$filename_avg = $dir . '/ordersaverage-' . $user->id . '-' . $year . '.png';
$px3 = new \DolGraph();
$mesg = $px3->isGraphKo();
// Show array
$data = $stats->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$include = '';
$oldyear = 0;