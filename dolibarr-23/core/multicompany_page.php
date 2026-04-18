<?php

\define('NOCSRFCHECK', 1);
\define('NOTOKENRENEWAL', 1);
\define('NOREQUIREMENU', 1);
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ');
$entityid = \GETPOSTINT('entity');
$backtourl = \GETPOST('backtourl');
$right = $langs->trans("DIRECTION") == 'rtl' ? 'left' : 'right';
$left = $langs->trans("DIRECTION") == 'rtl' ? 'right' : 'left';
/*
 * View
 */
$title = $langs->trans("Multicompanies");
// URL http://mydolibarr/core/multicompany_page?dol_use_jmobile=1 can be used for tests
$head = '<!-- Multicompany selection -->' . "\n";
// This is used by DoliDroid to know page is a multicompany selection page
$arrayofjs = array();
$arrayofcss = array();
//print '<br>';
// Define $multicompanyList
$multicompanyList = '';
$bookmarkList = '';