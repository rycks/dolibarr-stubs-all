<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
$place = \GETPOST('place', 'aZ09') ? \GETPOST('place', 'aZ09') : '0';
// $place is id of table for Bar or Restaurant
$invoiceid = \GETPOSTINT('invoiceid');
$idline = \GETPOSTINT('idline');
$action = \GETPOST('action', 'aZ09');
// get invoice
$invoice = new \Facture($db);
// get default vat rate
$constforcompanyid = 'CASHDESK_ID_THIRDPARTY' . $_SESSION['takeposterminal'];
$soc = new \Societe($db);
$vatRateDefault = \get_default_tva($mysoc, $soc);
/*
 * View
 */
$arrayofcss = array('/takepos/css/pos.css.php');
$arrayofjs = array();
$form = new \Form($db);
$num = $form->load_cache_vatrates("'" . $mysoc->country_code . "'");