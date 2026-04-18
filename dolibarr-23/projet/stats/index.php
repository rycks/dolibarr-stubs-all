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
$search_opp_status = \GETPOST("search_opp_status", 'alpha');
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
$formproject = new \FormProjets($db);
$includeuserlist = array();
$title = $langs->trans("ProjectsStatistics");
$dir = $conf->project->dir_output . '/temp';
$stats_project = new \ProjectStats($db);
// Build graphic number of object
// $data = array(array('Lib',val1,val2,val3),...)
$data = $stats_project->getNbByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
$filenamenb = $conf->project->dir_output . "/stats/projectnbprevyear-" . $year . ".png";
$fileurlnb = \DOL_URL_ROOT . '/viewimage.php?modulepart=projectstats&amp;file=projectnbprevyear-' . $year . '.png';
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
$px2 = \null;
// Build graphic amount of object
$data = $stats_project->getAmountByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
$filenamenb = $conf->project->dir_output . "/stats/projectamountprevyear-" . $year . ".png";
$fileurlnb = \DOL_URL_ROOT . '/viewimage.php?modulepart=projectstats&amp;file=projectamountprevyear-' . $year . '.png';
$px2 = new \DolGraph();
$mesg = $px2->isGraphKo();
$px3 = \null;
// Build graphic with transformation rate
$data = $stats_project->getWeightedAmountByMonthWithPrevYear($endyear, $startyear, 0, 0);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
$filenamenb = $conf->project->dir_output . "/stats/projecttransrateprevyear-" . $year . ".png";
$fileurlnb = \DOL_URL_ROOT . '/viewimage.php?modulepart=projectstats&amp;file=projecttransrateprevyear-' . $year . '.png';
$px3 = new \DolGraph();
$mesg = $px3->isGraphKo();
$data_all_year = $stats_project->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$oldyear = 0;
$stringtoshow = '<table class="border centpercent"><tr class="pair nohover"><td class="center">';