<?php

// Get Parameters
$id = \GETPOSTINT("rowid");
$accountid = \GETPOSTINT('id') ? \GETPOSTINT('id') : \GETPOSTINT('account');
$ref = \GETPOST('ref', 'alpha');
// Security check
$fieldvalue = !empty($id) ? $id : (!empty($ref) ? $ref : '');
$fieldtype = !empty($ref) ? 'ref' : 'rowid';
$result = \restrictedArea($user, 'banque', $accountid, 'bank_account');
$object = new \AccountLine($db);
$h = 0;
$head = array();
$hselected = (string) $h;
$linkback = '<a href="' . \DOL_URL_ROOT . '/compta/bank/bankentries_list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';