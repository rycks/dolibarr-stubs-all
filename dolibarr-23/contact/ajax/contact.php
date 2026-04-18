<?php

\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
\define('NOREQUIRESOC', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$htmlname = \GETPOST('htmlname', 'aZ09');
$outjson = \GETPOSTINT('outjson') ? \GETPOSTINT('outjson') : 0;
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$socid = \GETPOSTINT('socid');
$exclude = \GETPOST('exclude', 'intcomma');
$showsoc = \GETPOSTINT('showsoc');
$object = new \Contact($db);
$permissiontoread = $user->hasRight('societe', 'lire');
$outjson = array();