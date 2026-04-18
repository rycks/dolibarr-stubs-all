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
$object_status = \GETPOST('object_status', 'intcomma');
$typent_id = \GETPOSTINT('typent_id');
$categ_id = \GETPOSTINT('categ_id');
$select_categ_propal_id = \GETPOST('select_categ_propal_id', 'array');
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
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
$formpropal = new \FormPropal($db);
$formcompany = new \FormCompany($db);
$formother = new \FormOther($db);
$picto = 'propal';
$title = $langs->trans("ProposalsStatistics");
$dir = $conf->propal->dir_temp;
$cat_type = \Categorie::TYPE_CUSTOMER;
$cat_label = $langs->trans("Category") . ' ' . \lcfirst($langs->trans("Customer"));
$stats = new \PropaleStats($db, $socid, $userid > 0 ? $userid : 0, $mode, $typent_id > 0 ? $typent_id : 0, $categ_id > 0 ? $categ_id : 0);
// Build graphic number of object
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
// Build graphic amount of object
$data = $stats->getAmountByMonthWithPrevYear($endyear, $startyear, 0);
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
$filter = '(s.client:IN:1,2,3)';
$sortparam_typent = !\getDolGlobalString('SOCIETE_SORT_ON_TYPEENT') ? 'ASC' : $conf->global->SOCIETE_SORT_ON_TYPEENT;
$cat_type = '';
$cat_label = '';
$cate_arbo = $form->select_all_categories($cat_type, '', 'parent', 0, 0, 1);
$oldyear = 0;