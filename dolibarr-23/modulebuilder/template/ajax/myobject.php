<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
\define('NOCSRFCHECK', '1');
// Load Dolibarr environment
$res = 0;
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$mode = \GETPOST('mode', 'aZ09');
$objectId = \GETPOSTINT('objectId');
$field = \GETPOST('field', 'aZ09');
$value = \GETPOST('value', 'aZ09');
// @phan-suppress-next-line PhanUndeclaredClass
$object = new \MyObject($db);
$result = $object->update($user);