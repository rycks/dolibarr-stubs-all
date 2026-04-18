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
$htmlname = (string) \GETPOST('htmlname', 'aZ09');
$filter = \GETPOST('filter', 'alpha');
$outjson = \GETPOSTINT('outjson') ? \GETPOSTINT('outjson') : 0;
$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$excludeids = \GETPOST('excludeids', 'intcomma');
$showtype = \GETPOSTINT('showtype');
$showcode = \GETPOSTINT('showcode');
$object = new \Societe($db);
$outjson = array();