<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
$facid = \GETPOSTINT('facid');
$action = \GETPOST('action', 'aZ09');
/*
 * Actions
 */
// None
/*
 * View
 */
$arrayofcss = array('/takepos/css/pos.css.php');
$arrayofjs = array('/takepos/js/jquery.colorbox-min.js');
$head = '';