<?php

$chid = \GETPOSTINT("rowid");
$action = \GETPOST('action', 'aZ09');
$amounts = array();
$cancel = \GETPOST('cancel');
// Security check
$socid = 0;
$object = new \Don($db);
$permissiontoread = $user->hasRight('don', 'lire');
$permissiontoadd = $user->hasRight('don', 'creer');
$permissiontodelete = $user->hasRight('don', 'supprimer');
$error = 0;
$datepaid = \dol_mktime(12, 0, 0, \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"));
$action = 'create';
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("Payment");
$sumpaid = 0;
$sql = "SELECT sum(p.amount) as total";
$resql = $db->query($sql);
$total = $object->amount;
$datepaid = \dol_mktime(12, 0, 0, \GETPOSTINT("remonth"), \GETPOSTINT("reday"), \GETPOSTINT("reyear"));
$datepayment = !\getDolGlobalString('MAIN_AUTOFILL_DATE') ? \GETPOST("remonth") ? $datepaid : -1 : 0;
/*
 * List of payments on donation
 */
$num = 1;
$i = 0;
$total = 0;
$totalrecu = 0;