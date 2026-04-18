<?php

\define('NOSESSION', '1');
// On CLI mode, no need to use web sessions
$sapi_type = \php_sapi_name();
$script_file = \basename(__FILE__);
$path = __DIR__ . '/';
// Global variables
$version = '1.0';
$error = 0;
// No timeout for this script
\define('EVEN_IF_ONLY_LOGIN_ALLOWED', 1);
// Set this define to 0 if you want to lock your script when dolibarr setup is "locked to admin user only".
// Load Dolibarr environment
$res = 0;
// Try master.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = \realpath(__FILE__);
$i = \strlen($tmp) - 1;
$j = \strlen($tmp2) - 1;
// To load language file for default language
// Load user and its permissions
$result = $user->fetch(0, 'admin');