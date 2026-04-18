<?php

$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$id = \GETPOSTINT('id');
// Security check
$socid = \GETPOSTINT("socid");
$result = \restrictedArea($user, 'salaries', '', '', '');
$nowyear = (int) \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$year = \GETPOSTINT('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("SalariesStatistics");
$dir = $conf->salaries->dir_temp;
$useridtofilter = $userid;
$stats = new \SalariesStats($db, $socid, $useridtofilter);
// Build graphic number of object
// $data = array(array('Lib',val1,val2,val3),...)
//print "$endyear, $startyear";
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
$filenamenb = $dir . "/salariesnbinyear-" . $year . ".png";
$fileurlnb = \DOL_URL_ROOT . '/viewimage.php?modulepart=salariesstats&amp;file=salariesnbinyear-' . $year . '.png';
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
// Build graphic amount of object
$data = $stats->getAmountByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
$filenameamount = $dir . "/salariesamountinyear-" . $year . ".png";
$fileurlamount = \DOL_URL_ROOT . '/viewimage.php?modulepart=salariesstats&amp;file=salariesamountinyear-' . $year . '.png';
$px2 = new \DolGraph();
$mesg = $px2->isGraphKo();
$data = $stats->getAverageByMonthWithPrevYear($endyear, $startyear);
$filename_avg = $dir . "/salariesaverageinyear-" . $year . ".png";
$fileurl_avg = \DOL_URL_ROOT . '/viewimage.php?modulepart=salariesstats&file=salariesaverageinyear-' . $year . '.png';
$px3 = new \DolGraph();
$mesg = $px3->isGraphKo();
// Show array
$data = $stats->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$oldyear = 0;