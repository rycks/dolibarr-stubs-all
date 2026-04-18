<?php

\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', 1);
$action = \GETPOST('action', 'aZ09');
$title = $langs->trans("Search");
// URL http://mydolibarr/core/search_page?dol_use_jmobile=1 can be used for tests
$head = '<!-- Quick access -->' . "\n";
// This is used by DoliDroid to know page is a search page
$arrayofjs = array();
$arrayofcss = array();
// Define $searchform
$searchform = '';
$selected = '-1';
// Execute hook printSearchForm
$parameters = array('searchform' => $searchform);
$reshook = $hookmanager->executeHooks('printSearchForm', $parameters);