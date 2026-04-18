<?php

$graphwidth = 700;
$mapratio = 0.5;
$graphheight = \round($graphwidth * $mapratio);
$mode = \GETPOST('mode') ? \GETPOST('mode') : '';
$year = (int) \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$startyear = $year - (!\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? 2 : \max(1, \min(10, \getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))));
$endyear = $year;
/*
 * View
 */
$memberstatic = new \Adherent($db);
$title = $langs->trans("MembershipStatistics");
$help_url = 'EN:Module_Services_En|FR:Module_Services|ES:M&oacute;dulo_Servicios|DE:Modul_Mitglieder';
//dol_mkdir($dir);
$data = array();
$sql = "SELECT COUNT(DISTINCT d.rowid) as nb, COUNT(s.rowid) as nbsubscriptions,";
$foundphy = $foundmor = 0;
$resql = $db->query($sql);
$sql = "SELECT COUNT(DISTINCT d.rowid) as nb, COUNT(s.rowid) as nbsubscriptions,";
$foundphy = $foundmor = 0;
$resql = $db->query($sql);
$head = \member_stats_prepare_head($memberstatic);