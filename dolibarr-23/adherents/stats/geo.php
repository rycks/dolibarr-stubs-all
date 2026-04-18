<?php

$graphwidth = \DolGraph::getDefaultGraphSizeForStats('width', '700');
$mapratio = 0.5;
$graphheight = \round($graphwidth * $mapratio);
$mode = \GETPOST('mode');
$year = (int) \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
$startyear = $year - (\getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS') ? \max(1, \min(10, \getDolGlobalString('MAIN_STATS_GRAPHS_SHOW_N_YEARS'))) : 2);
$endyear = $year;
/*
 * View
 */
$memberstatic = new \Adherent($db);
$arrayjs = array('https://www.google.com/jsapi');
$title = $langs->trans("MembershipStatistics");
$help_url = 'EN:Module_Services_En|FR:Module_Services|ES:M&oacute;dulo_Servicios|DE:Modul_Mitglieder';
//dol_mkdir($dir);
$data = array();
$tab = \null;
$label = '';
// Define sql
$sql = \null;
$langsen = new \Translate('', $conf);
$head = \member_stats_prepare_head($memberstatic);
$color_file = \DOL_DOCUMENT_ROOT . '/theme/' . $conf->theme . '/theme_vars.inc.php';
// loop and dump
$i = 0;