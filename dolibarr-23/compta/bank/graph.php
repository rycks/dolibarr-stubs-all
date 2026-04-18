<?php

$WIDTH = \DolGraph::getDefaultGraphSizeForStats('width', '768');
$HEIGHT = \DolGraph::getDefaultGraphSizeForStats('height', '200');
$fieldid = \GETPOST('ref') ? 'ref' : 'rowid';
$result = \restrictedArea($user, 'banque', $id, 'bank_account&bank_account', '', '', $fieldid);
$account = \GETPOST("account");
$mode = 'standard';
$error = 0;
/*
 * View
 */
$now = \dol_now();
$nowlasthourmidday = \dol_get_last_hour($now) + 1 + 12 * 3600;
// +1 to get next day at 00:00:00. We add 12 hours to be at midday.
$datetime = \dol_now();
$year = \dol_print_date($datetime, "%Y");
$month = \dol_print_date($datetime, "%m");
$day = \dol_print_date($datetime, "%d");
$object = new \Account($db);
$title = $object->ref . ' - ' . $langs->trans("Graph");
$helpurl = "";
$show1 = '';
$show2 = '';
$show3 = '';
$show4 = '';
$show5 = '';
$morehtml = '';
$result = \dol_mkdir($conf->bank->dir_temp);
// Onglets
$head = \bank_prepare_head($object);
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/bank/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$head = \bank_report_prepare_head($object);
$prevyear = (int) $year;
$nextyear = (int) $year;
$prevmonth = (int) $month - 1;
$nextmonth = (int) $month + 1;
$nextmonth = \sprintf('%02d', $nextmonth);
$prevmonth = \sprintf('%02d', $prevmonth);
$nextyear = \sprintf('%04d', $nextyear);
$prevyear = \sprintf('%04d', $prevyear);
// For month
$link = "<a href='" . $_SERVER["PHP_SELF"] . "?account=" . $account . (\GETPOST("option") != 'all' ? '' : '&option=all') . "&year=" . $prevyear . "&month=" . $prevmonth . "'>" . \img_previous('', 'class="valignbottom"') . "</a> " . $langs->trans("Month") . " <a href='" . $_SERVER["PHP_SELF"] . "?account=" . $account . (\GETPOST("option") != 'all' ? '' : '&option=all') . "&year=" . $nextyear . "&month=" . $nextmonth . "'>" . \img_next('', 'class="valignbottom"') . "</a>";
$file = "movement" . $account . "-" . $year . $month . ".png";
// For year
$prevyear = (int) $year - 1;
$nextyear = (int) $year + 1;
$nextyear = \sprintf('%04d', $nextyear);
$prevyear = \sprintf('%04d', $prevyear);
$link = "<a href='" . $_SERVER["PHP_SELF"] . "?account=" . $account . (\GETPOST("option") != 'all' ? '' : '&option=all') . "&year=" . $prevyear . "'>" . \img_previous('', 'class="valignbottom"') . "</a> " . $langs->trans("Year") . " <a href='" . $_SERVER["PHP_SELF"] . "?account=" . $account . (\GETPOST("option") != 'all' ? '' : '&option=all') . "&year=" . $nextyear . "'>" . \img_next('', 'class="valignbottom"') . "</a>";