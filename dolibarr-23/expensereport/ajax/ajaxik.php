<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
$fk_expense = \GETPOSTINT('fk_expense');
$fk_c_exp_tax_cat = \GETPOSTINT('fk_c_exp_tax_cat');
$vatrate = \GETPOSTINT('vatrate');
$qty = \GETPOSTINT('qty');
// Security check
$result = \restrictedArea($user, 'expensereport', $fk_expense, 'expensereport');
$rep = new \stdClass();