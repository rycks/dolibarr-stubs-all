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
$invoice_id = \GETPOSTINT('id');
// id of thirdparty
$action = \GETPOST('action', 'aZ09');
$htmlname = \GETPOST('htmlname', 'alpha');
//print '<!-- Ajax page called with url '.dol_escape_htmltag($_SERVER["PHP_SELF"]).'?'.dol_escape_htmltag($_SERVER["QUERY_STRING"]).' -->'."\n";
$return = array();