<?php

\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', 1);
$action = \GETPOST('action', 'aZ09');
$title = $langs->trans("QuickAdd");
// URL http://mydolibarr/core/search_page?dol_use_jmobile=1 can be used for tests
$head = '<!-- Quick add -->' . "\n";
// This is used by DoliDroid to know page is a search page
$arrayofjs = array();
$arrayofcss = array();