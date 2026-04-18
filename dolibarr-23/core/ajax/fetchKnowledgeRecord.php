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
$idticketgroup = \GETPOST('idticketgroup', 'aZ09');
$idticketgroup = \GETPOST('idticketgroup', 'aZ09');
$lang = \GETPOST('lang', 'aZ09');
$response = '';
$sql = "SELECT kr.rowid, kr.ref, kr.question, kr.answer, kr.url, ctc.code";
$resql = $db->query($sql);
$response = \json_encode($response);