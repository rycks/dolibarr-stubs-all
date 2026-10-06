<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOBROWSERNOTIF', '1');
\define('NOIPCHECK', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var Societe $mysoc
 * @var Translate $langs
 */
// Init vars
$action = \GETPOST('action', 'aZ09');