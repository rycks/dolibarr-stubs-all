<?php

\define('NOREQUIREMENU', '1');
\define('NOBROWSERNOTIF', '1');
$id = \GETPOSTINT('id');
$summaryonly = \GETPOSTINT('summaryonly');
// May be used for ticket Z
$object = new \CashControl($db);
//$limit = GETPOST('limit')?GETPOST('limit', 'int'):$conf->liste_limit;
$sortorder = 'ASC';
$sortfield = 'b.datev,b.dateo,b.rowid';
$arrayfields = array('b.rowid' => array('label' => $langs->trans("Ref"), 'checked' => 1), 'b.dateo' => array('label' => $langs->trans("DateOperationShort"), 'checked' => 1), 'b.num_chq' => array('label' => $langs->trans("Number"), 'checked' => 1), 'ba.ref' => array('label' => $langs->trans("BankAccount"), 'checked' => 1), 'cp.code' => array('label' => $langs->trans("PaymentMode"), 'checked' => 1), 'b.debit' => array('label' => $langs->trans("Debit"), 'checked' => 1, 'position' => 600), 'b.credit' => array('label' => $langs->trans("Credit"), 'checked' => 1, 'position' => 605));
$syear = $object->year_close;
$smonth = $object->month_close;
$sday = $object->day_close;
$posmodule = $object->posmodule;
$terminalid = $object->posnumber;
/*
 * View
 */
$title = $langs->trans("CashControl");
$param = '';
$dates = $datee = 0;
$datefilter = 'p.datep';
$modulesourcefilter = 'f.module_source';
$amountfield = 'pf.amount';
$joinleft = 'LEFT ';
// NOTE: This request must use similar fields and filters to the one into cashcontrol_card to count and sum amount
$sql = "SELECT p.rowid, p.datep as datep, cp.code,";
// Required so later we can use the parameter $previoushash of checkSignature()
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$nameterminal = \getDolGlobalString("TAKEPOS_TERMINAL_NAME_" . $object->posnumber);
$userauthor = $object->fk_user_valid;
$uservalid = new \User($db);
$invoicetmp = new \Facture($db);
$param = '';
// Loop on each record
$cash = $bank = $cheque = $other = 0;
$totalqty = 0;
$totalvat = 0;
$totalvatperrate = array();
$totalhtperrate = array();
$totallocaltax1 = 0;
$totallocaltax2 = 0;
$cachebankaccount = array();
$cacheinvoiceid = array();
$transactionspertype = array();
$amountpertype = array();
$totalarray = array('nbfield' => 0, 'pos' => array(), 'val' => array('totaldebfield' => 0, 'totalcredfield' => 0));
//$cash = $amountpertype['LIQ'] + $object->opening;
$newcash = \price2num($cash + (float) $object->opening, 'MT');