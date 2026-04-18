<?php

\define('NOREQUIRESOC', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
// No permission check. This is just a formatting data service.
/*
 * View
 */
//init var
$invoice_type = \GETPOSTINT('invoice_type');
$amountPayment = \GETPOST('amountPayment');
$amounts = \GETPOST('amounts');
// from text inputs : invoice amount payment (check required)
$remains = \GETPOST('remains');
// from dolibarr's object (no need to check)
$currentInvId = \GETPOST('imgClicked');
// from DOM elements : imgId (equals invoice id)
// Getting the posted keys=>values, sanitize the ones who are from text inputs
$amountPayment = $amountPayment != '' ? \is_numeric(\price2num($amountPayment)) ? \price2num($amountPayment) : '' : '';
// Treatment
$result = $amountPayment != '' ? (float) $amountPayment - \array_sum($amounts) : \array_sum($amounts);
// Remaining amountPayment
$toJsonArray = array();
$totalRemaining = \price2num(\array_sum($remains));
// Here to breakdown
// Get the current amount (from form) and the corresponding remainToPay (from invoice)
$currentAmount = $amounts['amount_' . $currentInvId];
$currentRemain = $remains['remain_' . $currentInvId];