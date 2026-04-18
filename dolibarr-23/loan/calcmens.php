<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREAJAX', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$mens = (float) \price2num(\GETPOST('mens'));
$capital = (float) \price2num(\GETPOST('capital'));
$rate = (float) \price2num(\GETPOST('rate'));
$echance = \GETPOSTINT('echeance');
$nbterm = \GETPOSTINT('nbterm');
$output = array();
$output = \loanCalcMonthlyPayment($mens, $capital, $rate, $echance, $nbterm);