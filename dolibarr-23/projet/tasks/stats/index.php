<?php

$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$nowyear = \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$year = \GETPOSTINT('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
/*
 * View
 */
$form = new \Form($db);
$includeuserlist = array();
$title = $langs->trans("TasksStatistics");
$dir = $conf->project->dir_output . '/temp';
$stats_tasks = new \TaskStats($db);
// Build graphic number of object
// $data = array(array('Lib',val1,val2,val3),...)
$data = $stats_tasks->getNbByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
$filenamenb = $conf->project->dir_output . "/stats/tasknbprevyear-" . $year . ".png";
$fileurlnb = \DOL_URL_ROOT . '/viewimage.php?modulepart=taskstats&amp;file=tasknbprevyear-' . $year . '.png';
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
$data_all_year = $stats_tasks->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$oldyear = 0;
$stringtoshow = '<table class="border centpercent"><tr class="pair nohover"><td class="center">';