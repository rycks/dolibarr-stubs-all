<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
$fk_user = \GETPOSTINT('fk_user');
$return_arr = array();
$sql = "SELECT s.amount, s.rowid FROM " . \MAIN_DB_PREFIX . "salary as s";
$resql = $db->query($sql);