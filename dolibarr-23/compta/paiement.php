<?php

$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$facid = \GETPOSTINT('facid');
$accountid = \GETPOSTINT('accountid');
$paymentnum = \GETPOST('num_paiement', 'alpha');
$socid = \GETPOSTINT('socid');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$displayAllInvoices = \getDolGlobalInt('MAIN_PAIMENTS_SHOW_ALL_INVOICE_TYPES', 0);
$amounts = array();
$amountsresttopay = array();
$addwarning = 0;
$multicurrency_amounts = array();
$multicurrency_amountsresttopay = array();
$object = new \Facture($db);
$formquestion = array();
$usercanissuepayment = $user->hasRight('facture', 'paiement');
$fieldid = 'rowid';
$isdraft = $object->status == \Facture::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'facture', $object->id, '', '', 'fk_soc', $fieldid, $isdraft);
/*
 * Actions
 */
$error = 0;
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$paiement_id = 0;
/*
 * View
 */
$form = new \Form($db);
$facture = new \Facture($db);
$result = $facture->fetch($facid);
$title = '';
$datepayment = \dol_mktime(12, 0, 0, \GETPOSTINT('remonth'), \GETPOSTINT('reday'), \GETPOSTINT('reyear'));
$datepayment = $datepayment == '' ? !\getDolGlobalString('MAIN_AUTOFILL_DATE') ? -1 : '' : $datepayment;
$adddateof = array(array('adddateof' => $facture->date));
/*
 * List of unpaid invoices
 */
$sql = "SELECT f.rowid as facid, f.ref, f.total_ht, f.total_tva, f.total_ttc, f.multicurrency_code, f.multicurrency_total_ht, f.multicurrency_total_tva, f.multicurrency_total_ttc, f.type,";
$resql = $db->query($sql);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);