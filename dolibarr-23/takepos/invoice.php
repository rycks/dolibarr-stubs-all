<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
$action = \GETPOST('action', 'aZ09');
$idproduct = \GETPOSTINT('idproduct');
$place = \GETPOST('place', 'aZ09') ? \GETPOST('place', 'aZ09') : 0;
// $place is id of table for Bar or Restaurant
$placeid = 0;
// $placeid is ID of invoice
$mobilepage = \GETPOST('mobilepage', 'alpha');
$takeposterminal = isset($_SESSION["takeposterminal"]) ? $_SESSION["takeposterminal"] : '';
/**
 * Abort invoice creation with a given error message
 *
 * @param   string  $message        Message explaining the error to the user
 * @return	never
 */
function fail($message)
{
}
$number = (float) \GETPOST('number', 'alpha');
$idline = \GETPOSTINT('idline');
$selectedline = \GETPOSTINT('selectedline');
$desc = \GETPOST('desc', 'alphanohtml');
$pay = \GETPOST('pay', 'aZ09');
$amountofpayment = \GETPOSTFLOAT('amount');
$invoiceid = \GETPOSTINT('invoiceid');
$paycode = $pay;
// Retrieve paiementid and paiementcode
$paiementid = 0;
$sql = "SELECT id, code FROM " . \MAIN_DB_PREFIX . "c_paiement";
$resql = $db->query($sql);
$invoice = new \Facture($db);
$constforcompanyid = 'CASHDESK_ID_THIRDPARTY' . $takeposterminal;
$soc = new \Societe($db);
$term = empty($_SESSION["takeposterminal"]) ? 1 : $_SESSION["takeposterminal"];
/*
 * Actions
 */
$error = 0;
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $invoice, $action);
$sectionwithinvoicelink = '';
$CUSTOMER_DISPLAY_line1 = '';
$CUSTOMER_DISPLAY_line2 = '';
$headerorder = '';
$footerorder = '';
$printer = \null;
$idoflineadded = 0;
$creditnote = \null;
$tva_npr = 0;
$sectionwithinvoicelink = '';
/*
 * View
 */
$form = new \Form($db);
$title = 'TakePOS - Dolibarr ' . \DOL_VERSION;
$head = '<meta name="apple-mobile-web-app-title" content="TakePOS"/>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>';
$arrayofcss = array('/takepos/css/pos.css.php');
$arrayofjs = array('/takepos/js/jquery.colorbox-min.js');
$disablejs = 0;
$disablehead = 0;
$nameOfPrinter = \dol_getIdFromCode($db, \getDolGlobalInt('TAKEPOS_PRINTER_TO_USE' . $term), 'printer_receipt', 'rowid', 'name', 1);
$s = $langs->trans("Customer");
$s = $soc->name;
$sql = "SELECT rowid, datec, ref FROM " . \MAIN_DB_PREFIX . "facture";
$resql = $db->query($sql);
$s = '';
$idwarehouse = 0;
$constantforkey = 'CASHDESK_NO_DECREASE_STOCK' . (isset($_SESSION["takeposterminal"]) ? $_SESSION["takeposterminal"] : '');
// Module Adherent
$s = '';
$s = '<span class="small">';
$adh = new \Adherent($db);
$result = $adh->fetch(0, '', $invoice->socid);
$usediv = \GETPOST('format') == 'div';
$buttontocreatecreditnote = '';
// Complete header by hook
$parameters = array();
$reshook = $hookmanager->executeHooks('completeTakePosInvoiceHeader', $parameters, $invoice, $action);