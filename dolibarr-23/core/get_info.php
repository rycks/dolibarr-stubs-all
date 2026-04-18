<?php

\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', 1);
$right = $langs->trans("DIRECTION") == 'rtl' ? 'left' : 'right';
$left = $langs->trans("DIRECTION") == 'rtl' ? 'right' : 'left';
/*
 * View
 */
$title = $langs->trans("Info");
// URL http://mydolibarr/core/get_info.php?dol_use_jmobile=1 can be used for tests
$head = '<!-- Info user page -->' . "\n";
$arrayofjs = array();
$arrayofcss = array();
//print '<br>';
// Define link to login card
$appli = \constant('DOL_APPLICATION_TITLE');
$appli = \getDolGlobalString('MAIN_APPLICATION_TITLE');
$logouttext = '';
$logouthtmltext = '';
$toprightmenu = '';
// Login name with photo and tooltip
$picto = -1;
// Execute hook printTopRightMenu (hooks should output string like '<div class="login"><a href="">mylink</a></div>')
$parameters = array();
$result = $hookmanager->executeHooks('printTopRightMenu', $parameters);