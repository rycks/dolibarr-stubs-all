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
$object_status = \GETPOST('object_status', 'intcomma');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$nowyear = \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$year = \GETPOST('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
/*
 * View
 */
$form = new \Form($db);
$object = new \Ticket($db);
$title = $langs->trans("Statistics");
$dir = $conf->ticket->dir_temp;
$help_url = '';
$stats = new \TicketStats($db, $socid, $userid > 0 ? $userid : 0);
// Build graphic number of object
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
// Build graphic amount of object
$data = $stats->getAmountByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
// Show array
$data = $stats->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$type = 'ticket_stats';
$liststatus = $object->fields['fk_statut']['arrayofkeyval'];
$oldyear = 0;