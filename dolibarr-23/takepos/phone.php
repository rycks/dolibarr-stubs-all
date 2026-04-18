<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
// Decode place if it is an order from a customer phone
$place = \GETPOSTISSET("key") ? \dol_decode(\GETPOST('key')) : \GETPOST('place', 'aZ09');
$action = \GETPOST('action', 'aZ09');
$setterminal = \GETPOSTINT('setterminal');
$idproduct = \GETPOSTINT('idproduct');
$mobilepage = \GETPOST('mobilepage', 'alphanohtml');
/*
 * View
 */
$title = 'TakePOS - Dolibarr ' . \DOL_VERSION;