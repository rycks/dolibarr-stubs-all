<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$type = \GETPOST('type');
$object = new \RemiseCheque($db);
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$offset = $limit * $page;
$upload_dir = $conf->bank->multidir_output[$object->entity ? $object->entity : $conf->entity] . "/checkdeposits";
// filter by dates from / to
$search_date_start_day = \GETPOSTINT('search_date_start_day');
$search_date_start_month = \GETPOSTINT('search_date_start_month');
$search_date_start_year = \GETPOSTINT('search_date_start_year');
$search_date_end_day = \GETPOSTINT('search_date_end_day');
$search_date_end_month = \GETPOSTINT('search_date_end_month');
$search_date_end_year = \GETPOSTINT('search_date_end_year');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_start_month, $search_date_start_day, $search_date_start_year);
$search_date_end = \dol_mktime(23, 59, 59, $search_date_end_month, $search_date_end_day, $search_date_end_year);
$filteraccountid = \GETPOSTINT('accountid');
// Security check
$fieldname = !empty($ref) ? 'ref' : 'rowid';
$result = \restrictedArea($user, 'cheque', $id, 'bordereau_cheque', '', 'fk_user_author', $fieldname);
$usercanread = $user->hasRight('banque', 'cheque');
$usercancreate = $user->hasRight('banque', 'cheque');
$usercandelete = $user->hasRight('banque', 'cheque');
$permissiontodelete = $user->hasRight('banque', 'cheque');
// List of payment mode to support
// Example: BANK_PAYMENT_MODES_FOR_DEPOSIT_MANAGEMENT = 'CHQ','TRA'
$arrayofpaymentmodetomanage = \explode(',', \getDolGlobalString('BANK_PAYMENT_MODES_FOR_DEPOSIT_MANAGEMENT', 'CHQ'));
$result = $object->fetch(\GETPOSTINT('id'));
$result = $object->fetch(\GETPOSTINT('id'));
$result = $object->fetch(\GETPOSTINT('id'));
$result = $object->removeCheck(\GETPOSTINT("lineid"));
$result = $object->delete($user);
$result = $object->fetch($id);
$result = $object->validate($user);
$reject_date = \dol_mktime(0, 0, 0, \GETPOSTINT('rejectdate_month'), \GETPOSTINT('rejectdate_day'), \GETPOSTINT('rejectdate_year'));
$rejected_check = \GETPOSTINT('bankid');
$paiement_id = $object->rejectCheck($rejected_check, $reject_date);
$result = $object->fetch($id);
// Save last template used to generate document
//if (GETPOST('model')) $object->setDocModel($user, GETPOST('model','alpha'));
$outputlangs = $langs;
$newlang = '';
$result = $object->generatePdf(\GETPOST("model"), $outputlangs);
$helpurl = "";
$form = new \Form($db);
$formfile = new \FormFile($db);
$accounts = array();
$paymentstatic = new \Paiement($db);
$accountlinestatic = new \AccountLine($db);
$lines = array();
$now = \dol_now();
$labeltype = $langs->trans("PaymentType" . $type) != "PaymentType" . $type ? $langs->trans("PaymentType" . $type) : $type;
$sql = "SELECT ba.rowid as bid, ba.label,";
$resql = $db->query($sql);