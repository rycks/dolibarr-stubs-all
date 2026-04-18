<?php

\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', 1);
\define('NOREQUIREHTML', 1);
\define('NOBROWSERNOTIF', 1);
\define('DISABLE_JQUERY_TABLEDND', 1);
\define('DISABLE_JQUERY_JNOTIFY', 1);
\define('DISABLE_JQUERY_FLOT', 1);
\define('DISABLE_JQUERY_JEDITABLE', 1);
\define('DISABLE_CKEDITOR', 1);
\define('DISABLE_DATE_PICKER', 1);
\define('DISABLE_SELECT2', 1);
$right = $langs->trans("DIRECTION") == 'rtl' ? 'left' : 'right';
$left = $langs->trans("DIRECTION") == 'rtl' ? 'right' : 'left';
$title = $langs->trans("Menu");
// URL http://mydolibarr/core/get_menudiv.php?dol_use_jmobile=1 can be used for tests
$head = '<!-- Menu -->' . "\n";
// This is used by DoliDroid to know page is a menu page
$arrayofjs = array();
$arrayofcss = array();
// Load the menu manager (only if not already done)
$file_menu = $conf->standard_menu;
$menufound = 0;
$dirmenus = \array_merge(array("/core/menus/"), (array) $conf->modules_parts['menus']);
// @phan-suppress-next-line PhanRedefinedClassReference
$menumanager = new \MenuManager($db, empty($user->socid) ? 0 : 1);