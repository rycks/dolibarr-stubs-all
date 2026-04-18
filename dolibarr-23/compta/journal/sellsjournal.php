<?php

$date_startmonth = \GETPOST('date_startmonth');
$date_startday = \GETPOST('date_startday');
$date_startyear = \GETPOST('date_startyear');
$date_endmonth = \GETPOST('date_endmonth');
$date_endday = \GETPOST('date_endday');
$date_endyear = \GETPOST('date_endyear');
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$morequery = '&date_startyear=' . $date_startyear . '&date_startmonth=' . $date_startmonth . '&date_startday=' . $date_startday . '&date_endyear=' . $date_endyear . '&date_endmonth=' . $date_endmonth . '&date_endday=' . $date_endday;
$year_current = (int) \dol_print_date(\dol_now('gmt'), "%Y", 'gmt');
//$pastmonth = strftime("%m", dol_now()) - 1;
$pastmonth = (int) \dol_print_date(\dol_now(), "%m") - 1;
$pastmonthyear = $year_current;
$date_start = \dol_mktime(0, 0, 0, (int) $date_startmonth, (int) $date_startday, (int) $date_startyear);
$date_end = \dol_mktime(23, 59, 59, (int) $date_endmonth, (int) $date_endday, (int) $date_endyear);
$name = $langs->trans("SellsJournal");
$periodlink = '';
$exportlink = '';
$builddate = \dol_now();
$description = $langs->trans("DescSellsJournal") . '<br>';
$period = $form->selectDate($date_start, 'date_start', 0, 0, 0, '', 1, 0) . ' - ' . $form->selectDate($date_end, 'date_end', 0, 0, 0, '', 1, 0);
$idpays = $mysoc->country_id;
$sql = "SELECT f.rowid, f.ref, f.type, f.datef, f.ref_client, f.situation_cycle_ref,";
$tabfac = array();
$result = $db->query($sql);
$invoicestatic = new \Facture($db);
$companystatic = new \Client($db);