<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
\define('NOREQUIRETRAN', '1');
\define('CSRFCHECK_WITH_TOKEN', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
// set or del
$name = \GETPOST('name', 'alpha');
$entity = \GETPOSTINT('entity');
$value = \GETPOST('value', 'aZ09') != '' ? \GETPOST('value', 'aZ09') : 1;
$userconst = \GETPOSTINT('userconst');