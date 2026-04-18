<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$childids = $user->getAllChildIds(1);
// Security check
$socid = 0;
$result = \restrictedArea($user, 'expensereport', $id, 'expensereport');
$object = new \ExpenseReport($db);
$permissionnote = $user->hasRight('expensereport', 'creer');
// Check current user can read this expense report
$canread = 0;
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$title = $langs->trans("ExpenseReport") . " - " . $langs->trans("Note");
$helpurl = "EN:Module_Expense_Reports";
$form = new \Form($db);