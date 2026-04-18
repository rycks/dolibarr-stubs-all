<?php

\define('NOREQUIREUSER', '1');
\define('NOREQUIREDB', '1');
\define('NOREQUIRESOC', '1');
\define('NOREQUIRETRAN', '1');
\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOLOGIN', 1);
\define('NOREQUIREMENU', 1);
\define('NOREQUIREHTML', 1);
\define('NOREQUIREAJAX', '1');
/**
 * \file    htdocs/modulebuilder/template/js/mymodule.js.php
 * \ingroup mymodule
 * \brief   JavaScript file for module MyModule.
 */
// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = \realpath(__FILE__);
$i = \strlen($tmp) - 1;
$j = \strlen($tmp2) - 1;