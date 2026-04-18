<?php

\define('NOREQUIRESOC', '1');
\define('NOTOKENRENEWAL', '1');
\define('NOREQUIREMENU', '1');
\define('NOREQUIREHTML', '1');
\define('NOREQUIREAJAX', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$idbom = \GETPOSTINT('idbom');
//$action = GETPOST('action', 'aZ09');
$object = new \BOM($db);
$result = $object->fetch($idbom);
// Security check
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'bom', $object, $object->table_element, '', '', 'rowid', $isdraft);