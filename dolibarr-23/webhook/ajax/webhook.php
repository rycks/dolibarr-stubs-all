<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
\define('NOREQUIREMENU', '1');
\define('NOIPCHECK', '1');
\define('NOBROWSERNOTIF', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
/**
 * Find and init a specimen for the given object type
 *
 * @param 	string      $objecttype		Object type to init as a specimen
 * @return CommonObject|false
 */
function findobjecttosend($objecttype)
{
}