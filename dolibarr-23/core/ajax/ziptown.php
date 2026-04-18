<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
$return_arr = array();
$formcompany = new \FormCompany($db);
// Define filter on text typed
$zipcode = \GETPOST('zipcode');
$town = \GETPOST('town');
//print $sql;
$resql = $db->query($sql);