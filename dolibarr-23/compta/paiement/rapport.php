<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$action = \GETPOST('action', 'aZ09');
$fileToRemove = \GETPOST('removefile', 'alpha');
$socid = 0;
$dir = $conf->facture->dir_output . '/payments';
$year = \GETPOSTINT('year');
$permissiontoread = $user->hasRight('facture', 'lire') == 1;
$rap = new \pdf_paiement($db);
$outputlangs = $langs;
// We save charset_output to restore it because write_file can change it if needed for
// output format that does not support UTF8.
$sav_charset_output = $outputlangs->charset_output;
$year = \GETPOSTINT("reyear");
$fullpathfile = \dol_sanitizePathName($dir . '/' . $fileToRemove);
$fileDirectory = \dirname($fullpathfile);
/*
 * View
 */
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$titre = $year ? $langs->trans("PaymentsReportsForYear", $year) : $langs->trans("PaymentsReports");
$cmonth = \GETPOST("remonth") ? \GETPOST("remonth") : \date("n", \time());
$syear = \GETPOST("reyear") ? \GETPOST("reyear") : \date("Y", \time());
// Show link on other years
$year_dirs = \dol_dir_list($dir, 'directories', 0, '^[0-9]{4}$', '', 'DESC');