<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
\define('NOREQUIRETRAN', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
$hash_unique_id = \GETPOST('hash_unique_id', 'alpha');
$hash_algo = \GETPOST('hash_algo', 'alpha');
// Security check
// None. Being connected is enough.
/*
 * Actions
 */
// None
/*
 * View
 */
$now = \dol_now();