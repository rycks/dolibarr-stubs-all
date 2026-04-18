<?php

$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
// Security check
$socid = \GETPOSTINT('socid');
$result = \restrictedArea($user, 'loan', $id, '', '');
/*
 * Actions
 */
// None
/*
 * View
 */
$morehtmlright = '';
$form = new \Form($db);
$title = $langs->trans("Loan") . ' - ' . $langs->trans("Info");
$help_url = 'EN:Module_Loan|FR:Module_Emprunt';
$object = new \Loan($db);
$head = \loan_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$linkback = '<a href="' . \DOL_URL_ROOT . '/loan/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlstatus = $morehtmlright;