<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
$result = \restrictedArea($user, 'variants');
$id = \GETPOSTINT('id');
$product = new \Product($db);
$prodcomb = new \ProductCombination($db);