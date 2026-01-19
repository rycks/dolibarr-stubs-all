<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOLOGIN', '1');
\define('NOIPCHECK', '1');
\define('USESUFFIXINLOG', '_cidlookup');
/**
 * @var Conf $conf
 * @var DoliDB $db
 */
$phone = \GETPOST('phone');