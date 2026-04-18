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
$mode = 'customer';
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$nowyear = \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$year = \GETPOST('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
$object_status = \GETPOST('object_status', 'intcomma');
/*
 * View
 */
$form = new \Form($db);
$objectstatic = new \Fichinter($db);
$title = $langs->trans("InterventionStatistics");
$dir = $conf->ficheinter->dir_temp;
$stats = new \FichinterStats($db, $socid, $mode, $userid > 0 ? $userid : 0);
// Build graphic number of object
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
// Build graphic amount of object
$data = $stats->getAmountByMonthWithPrevYear($endyear, $startyear);
$px2 = new \DolGraph();
$mesg = $px2->isGraphKo();
$data = $stats->getAverageByMonthWithPrevYear($endyear, $startyear);
$px3 = new \DolGraph();
$mesg = $px3->isGraphKo();
// Show array
$data = $stats->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$type = 'fichinter_stats';
$filter = '(s.client:IN:1,2,3)';
$tmp = $objectstatic->LibStatut(0);
// To force load of $this->labelStatus
$liststatus = $objectstatic->labelStatus;
$oldyear = 0;