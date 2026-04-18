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
$mode = \GETPOSTISSET("mode") ? \GETPOST("mode", 'aZ09') : 'customer';
$usercanreadcustumerstatistic = $user->hasRight('commande', 'lire');
$usercanreadsupplierstatistic = $user->hasRight('fournisseur', 'commande', 'lire');
$typent_id = \GETPOSTINT('typent_id');
$categ_id = \GETPOSTINT('categ_id');
$select_categ_comande_id = \GETPOST('select_categ_comande_id', 'array');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$nowyear = (int) \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$year = \GETPOSTINT('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
/*
 * View
 */
$form = new \Form($db);
$formorder = new \FormOrder($db);
$formcompany = new \FormCompany($db);
$formother = new \FormOther($db);
$picto = 'order';
$title = $langs->trans("OrdersStatistics");
$dir = $conf->commande->dir_temp;
$stats = new \CommandeStats($db, $socid, $mode, $userid > 0 ? $userid : 0, $typent_id > 0 ? $typent_id : 0, $categ_id > 0 ? $categ_id : 0);
// Build graphic number of object
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
$fileurlnb = '';
$filenamenb = $dir . '/ordersnbinyear-' . $user->id . '-' . $year . '.png';
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
// Build graphic amount of object
$data = $stats->getAmountByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
$fileurlamount = '';
$filenameamount = $dir . '/ordersamountinyear-' . $user->id . '-' . $year . '.png';
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
$type = 'order_stats';
$filter = '';
$sortparam_typent = !\getDolGlobalString('SOCIETE_SORT_ON_TYPEENT') ? 'ASC' : $conf->global->SOCIETE_SORT_ON_TYPEENT;
// Category societe
$cat_type = 0;
$cat_label = '';
$cat_type = '';
$cat_label = '';
$cate_arbo = $form->select_all_categories($cat_type, '', 'parent', 0, 0, 1);
$oldyear = 0;