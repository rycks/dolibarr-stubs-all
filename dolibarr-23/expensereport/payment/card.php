<?php

$id = \GETPOST('rowid') ? \GETPOSTINT('rowid') : \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm');
$object = new \PaymentExpenseReport($db);
$result = $object->fetch($id);
$result = \restrictedArea($user, 'expensereport', $object->fk_expensereport, 'expensereport');
$result = $object->delete($user);
$form = new \Form($db);
$head = \payment_expensereport_prepare_head($object);
$linkback = '';
$disable_delete = 0;
$title_button = '';
/*
 * List of expense report paid
 */
$sql = 'SELECT er.rowid as eid, er.paid, er.total_ttc, per.amount';
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$total = 0;