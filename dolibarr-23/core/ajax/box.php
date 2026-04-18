<?php

\define('NOTOKENRENEWAL', '1');
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
$boxid = \GETPOSTINT('boxid');
$boxorder = \GETPOST('boxorder');
$zone = \GETPOST('zone');
// Can be '0' or '1' or 'pagename'...
$userid = \GETPOSTINT('userid');
$tmp = \explode('-', $boxorder);
$nbboxonleft = \substr_count($tmp[0], ',');
$nbboxonright = \substr_count($tmp[1], ',');
$result = \InfoBox::saveboxorder($db, $zone, $boxorder, $userid);