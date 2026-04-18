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
$userid = \GETPOSTINT('userid');
$socid = \GETPOSTINT('socid');
$status = \GETPOSTINT('status');
$nowyear = (int) \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$typent_id = \GETPOSTINT('typent_id');
$year = \GETPOSTINT('year') > 0 ? \GETPOSTINT('year') : $nowyear;
$startyear = $year - (!\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
$mode = \GETPOST("mode") ? \GETPOST("mode") : 'customer';
$custcats = \GETPOST('custcats', 'array');
// Security check
$result = \restrictedArea($user, 'don');
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$dir = $conf->don->dir_temp;
$stats = new \DonationStats($db, $socid, '', $userid > 0 ? $userid : 0, $typent_id > 0 ? $typent_id : 0, $status > 0 ? $status : 4);
// Build graphic number of object
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
$filenamenb = $dir . "/salariesnbinyear-" . $year . ".png";
$fileurlnb = \DOL_URL_ROOT . '/viewimage.php?modulepart=donationStats&amp;file=donationinyear-' . $year . '.png';
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
$data = $stats->getAmountByMonthWithPrevYear($endyear, $startyear);
$filenameamount = $dir . "/donationamount-" . $year . ".png";
$fileurlamount = \DOL_URL_ROOT . '/viewimage.php?modulepart=donationStats&amp;file=donationamoutinyear-' . $year . '.png';
$px2 = new \DolGraph();
$mesg = $px2->isGraphKo();
$data = $stats->getAverageByMonthWithPrevYear($endyear, $startyear);
$filename_avg = $dir . "/donationaverage-" . $year . ".png";
$fileurl_avg = \DOL_URL_ROOT . '/viewimage.php?modulepart=donationStats&file=donationaverageinyear-' . $year . '.png';
$px3 = new \DolGraph();
$mesg = $px3->isGraphKo();
// Show array
$data = $stats->getAllByYear();
$arrayyears = array();
$h = 0;
$head = array();
$type = 'donation_stats';
$sortparam_typent = \getDolGlobalString('SOCIETE_SORT_ON_TYPEENT', 'ASC');
$cat_type = \Categorie::TYPE_CUSTOMER;
$cat_label = $langs->trans("Category") . ' ' . \lcfirst($langs->trans("Customer"));
$cate_arbo = $form->select_all_categories($cat_type, '', 'parent', 0, 0, 1);
$liststatus = array('2' => $langs->trans("DonationStatusPaid"), '0' => $langs->trans("DonationStatusPromiseNotValidated"), '1' => $langs->trans("DonationStatusPromiseValidated"), '3' => $langs->trans("Canceled"));
$oldyear = 0;