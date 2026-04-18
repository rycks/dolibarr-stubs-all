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
$year = (int) \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$startyear = $year - (!\getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalInt('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
/*
 * View
 */
$memberstatic = new \Adherent($db);
$form = new \Form($db);
$title = $langs->trans("MembershipStatistics");
$help_url = 'EN:Module_Services_En|FR:Module_Services|ES:M&oacute;dulo_Servicios|DE:Modul_Mitglieder';
$dir = $conf->member->dir_temp;
$stats = new \AdherentStats($db, $socid, $userid);
// Build graphic number of object
$data = $stats->getNbByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
$filenamenb = $dir . '/subscriptionsnbinyear-' . $year . '.png';
$fileurlnb = \DOL_URL_ROOT . '/viewimage.php?modulepart=memberstats&file=subscriptionsnbinyear-' . $year . '.png';
$px1 = new \DolGraph();
$mesg = $px1->isGraphKo();
// Build graphic amount of object
$data = $stats->getAmountByMonthWithPrevYear($endyear, $startyear);
//var_dump($data);
// $data = array(array('Lib',val1,val2,val3),...)
$filenameamount = $dir . '/subscriptionsamountinyear-' . $year . '.png';
$fileurlamount = \DOL_URL_ROOT . '/viewimage.php?modulepart=memberstats&file=subscriptionsamountinyear-' . $year . '.png';
$px2 = new \DolGraph();
$mesg = $px2->isGraphKo();
$head = \member_stats_prepare_head($memberstatic);
// Show filter box
/*print '<form name="stats" method="POST" action="'.dolBuildUrl($_SERVER["PHP_SELF"]).'">';
print '<input type="hidden" name="token" value="'.newToken().'">';

print '<table class="border centpercent">';
print '<tr class="liste_titre"><td class="liste_titre" colspan="2">'.$langs->trans("Filter").'</td></tr>';
print '<tr><td>'.$langs->trans("Member").'</td><td>';
print img_picto('', 'company', 'class="pictofixedwidth"');
print $form->select_company($id,'memberid','',1);
print '</td></tr>';
print '<tr><td>'.$langs->trans("User").'</td><td>';
print img_picto('', 'user', 'class="pictofixedwidth"');
print $form->select_dolusers($userid, 'userid', 1, '', 0, '', '', 0, 0, 0, '', 0, '', 'widthcentpercentminusx maxwidth300');
print '</td></tr>';
print '<tr><td class="center" colspan="2"><input type="submit" name="submit" class="button small" value="'.$langs->trans("Refresh").'"></td></tr>';
print '</table>';
print '</form>';
print '<br><br>';
*/
// Show array
$data = $stats->getAllByYear();
$oldyear = 0;