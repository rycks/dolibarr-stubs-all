<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$amounts = array();
$accountid = \GETPOSTINT('accountid');
$cancel = \GETPOST('cancel');
$object = new \PaymentExpenseReport($db);
$result = $object->fetch($id);
// Security check
$socid = 0;
$result = \restrictedArea($user, 'expensereport', $object->fk_expensereport, 'expensereport');
$permissiontoadd = $user->hasRight('expensereport', 'creer');
$error = 0;
$expensereport = new \ExpenseReport($db);
$result = $expensereport->fetch($id, $ref);
$datepaid = \dol_mktime(12, 0, 0, \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"));
$action = 'create';
$form = new \Form($db);
$expensereport = new \ExpenseReport($db);
$total = $expensereport->total_ttc;
$linkback = '';
$sql = "SELECT sum(p.amount) as total";
$sumpaid = 0;
$resql = $db->query($sql);
$datepaid = \dol_mktime(12, 0, 0, \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"));
$datepayment = $datepaid == '' ? !\getDolGlobalString('MAIN_AUTOFILL_DATE') ? -1 : '' : $datepaid;
// List of expenses ereport not already paid completely
$num = 1;
$i = 0;
$total_ttc = 0;
$totalrecu = 0;