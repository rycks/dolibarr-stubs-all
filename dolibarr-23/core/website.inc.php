<?php

$website = \null;
$websitepage = \null;
$weblangs = \null;
$pagelangs = \null;
$tmp = \getBrowserInfo($_SERVER["HTTP_USER_AGENT"]);
$pageid = \str_replace(array('.tpl.php', 'page'), array('', ''), \basename($websitepagefile));
// Rule to define weblang of visitor:
// 1 - Take parameter lang
// 2 - Cookie lang of website (set by a possible js lang selector)
// 3 - XX/... found in url page
// 4 - auto (so web browser lang)
$srclang = \GETPOSTISSET('lang') ? \GETPOST('lang', 'aZ09') : '';
// Get session info and obfuscate session cookie and other variables
$prefix = \dol_getprefix('');
$sessionname = 'DOLSESSID_' . $prefix;