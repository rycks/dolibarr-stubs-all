<?php

// Disables token renewal
\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOHEADERNOFOOTER', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var Translate $langs
 * @var User $user
 */
// object id
$objectid = \GETPOST('objectid', 'aZ09');