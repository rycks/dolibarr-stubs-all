<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$childids = $user->getAllChildIds(1);
$result = \restrictedArea($user, 'expensereport', $id, 'expensereport');
$object = new \ExpenseReport($db);
// Check current user can read this expense report
$canread = 0;
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("ExpenseReport") . " - " . $langs->trans("Info");
$helpurl = "EN:Module_Expense_Reports";