<?php

\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREAJAX', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$id = \GETPOSTINT('id');
// id of thirdparty
$action = \GETPOST('action', 'aZ09');
$htmlname = \GETPOST('htmlname', 'alpha');
$showempty = \GETPOSTINT('showempty');
// Security check
$result = \restrictedArea($user, 'societe', $id, '&societe', '', 'fk_soc', 'rowid', 0);
$form = new \Form($db);
$return = array();