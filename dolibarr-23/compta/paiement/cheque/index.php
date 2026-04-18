<?php

$checkdepositstatic = new \RemiseCheque($db);
$accountstatic = new \Account($db);
$result = \restrictedArea($user, 'banque', '', '');
$usercancreate = $user->hasRight('banque', 'cheque');
// List of payment mode to support
// Example: BANK_PAYMENT_MODES_FOR_DEPOSIT_MANAGEMENT = 'CHQ','TRA'
$arrayofpaymentmodetomanage = \explode(',', \getDolGlobalString('BANK_PAYMENT_MODES_FOR_DEPOSIT_MANAGEMENT', 'CHQ'));
$newcardbutton = '';
$max = 10;