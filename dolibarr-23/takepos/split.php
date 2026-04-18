<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
$action = \GETPOST('action', 'aZ09');
$place = \GETPOST('place', 'aZ09') ? \GETPOST('place', 'aZ09') : 0;
$line = \GETPOSTINT('line');
$split = \GETPOSTINT('split');
$invoice = \null;
$placeid = 0;
/*
 * View
 */
$invoice = new \Facture($db);
$arrayofcss = array('/takepos/css/pos.css.php');
$arrayofjs = array();
$head = '';
$title = '';
$disablejs = 0;
$disablehead = 0;
// Define list of possible payments
$arrayOfValidPaymentModes = array();
$arrayOfValidBankAccount = array();