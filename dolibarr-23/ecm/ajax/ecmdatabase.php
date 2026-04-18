<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
$element = \GETPOST('element', 'alpha');
$permissiontoread = $user->hasRight('ecm', 'read');
$error = 0;