<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
$return_arr = array();
// Define filter on text typed
$location_incoterms = \GETPOST('location_incoterms');
//print $sql;
$resql = $db->query($sql);