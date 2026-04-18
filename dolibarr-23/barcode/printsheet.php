<?php

// Choice of print year or current year.
$now = \dol_now();
$year = \dol_print_date($now, '%Y');
$month = \dol_print_date($now, '%m');
$day = \dol_print_date($now, '%d');
$forbarcode = \GETPOST('forbarcode', 'alphanohtml');
$fk_barcode_type = \GETPOSTINT('fk_barcode_type');
$mode = \GETPOST('mode', 'aZ09');
$modellabel = \GETPOST("modellabel", 'aZ09');
// Doc template to use
$numberofsticker = \GETPOSTINT('numberofsticker');
$mesg = '';
$action = \GETPOST('action', 'aZ09');
$producttmp = new \Product($db);
$thirdpartytmp = new \Societe($db);
$object = new \stdClass();
/*
 * Actions
 */
// Note that $action and $object may have been modified by some
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
// List of possible labels (defined into $_Avery_Labels variable set into core/lib/format_cards.lib.php)
$arrayoflabels = array();
$formbarcode = new \FormBarCode($db);