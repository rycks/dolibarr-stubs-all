<?php

\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
$floor = \GETPOSTINT('floor');
$id = \GETPOSTINT('id');
$action = \GETPOST('action', 'aZ09');
$left = \GETPOST('left', 'alpha');
$top = \GETPOST('top', 'alpha');
$place = \GETPOST('place', 'aZ09') ? \GETPOST('place', 'aZ09') : 0;
// $place is id of table for Bar or Restaurant
$newname = \GETPOST('newname', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$newname = \preg_replace("/[^a-zA-Z0-9\\s]/", "", $newname);
$resql = $db->query("UPDATE " . \MAIN_DB_PREFIX . "takepos_floor_tables SET label='" . $db->escape($newname) . "' WHERE rowid = " . (int) $place);
/*
 * View
 */
// Title
$head = '';
$title = 'TakePOS - Dolibarr ' . \DOL_VERSION;
$arrayofcss = array('/takepos/css/pos.css.php?a=xxx');