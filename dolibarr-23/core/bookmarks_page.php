<?php

\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', 1);
$right = $langs->trans("DIRECTION") == 'rtl' ? 'left' : 'right';
$left = $langs->trans("DIRECTION") == 'rtl' ? 'right' : 'left';
$title = $langs->trans("Bookmarks");
// URL http://mydolibarr/core/bookmarks_page?dol_use_jmobile=1 can be used for tests
$head = '<!-- Bookmarks -->' . "\n";
// This is used by DoliDroid to know page is a bookmark selection page
$arrayofjs = array();
$arrayofcss = array();
// Define $bookmarks
$bookmarkList = '';
$searchForm = '';
// Execute hook printBookmarks
$parameters = array('bookmarks' => $bookmarkList);
$reshook = $hookmanager->executeHooks('printBookmarks', $parameters);