<?php

\define('NOREQUIRESOC', '1');
\define('NOTOKENRENEWAL', 1);
\define('NOLOGIN', 1);
\define('NOREQUIREHTML', 1);
\define('NOREQUIREAJAX', '1');
// false or '' = keep cache instruction added by server
// 'public'  = remove cache instruction added by server
// and if no cache-control added later, a default cache delay (10800) will be added by PHP.
// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = \realpath(__FILE__);
$i = \strlen($tmp) - 1;
$j = \strlen($tmp2) - 1;