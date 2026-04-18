<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$object = new \PaymentExpenseReport($db);
$result = $object->fetch($id);
$result = \restrictedArea($user, 'expensereport', $object->fk_expensereport, 'expensereport');
$head = \payment_expensereport_prepare_head($object);