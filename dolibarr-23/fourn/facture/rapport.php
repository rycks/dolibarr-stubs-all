<?php

// Security check
$socid = '';
$result = \restrictedArea($user, 'fournisseur', 0, 'facture_fourn', 'facture');
$action = \GETPOST('action', 'aZ09');
$fileToRemove = \GETPOST('removefile', 'alpha');
$socid = 0;
$dir = $conf->fournisseur->facture->dir_output . '/payments';
$year = \GETPOSTINT("year");
$permissiontoread = $user->hasRight("fournisseur", "facture", "lire") || $user->hasRight("supplier_invoice", "lire");
$permissiontoadd = $user->hasRight("fournisseur", "facture", "creer") || $user->hasRight("supplier_invoice", "creer");
$rap = new \pdf_paiement_fourn($db);
$outputlangs = $langs;
// We save charset_output to restore it because write_file can change it if needed for
// output format that does not support UTF8.
$sav_charset_output = $outputlangs->charset_output;
$year = \GETPOSTINT("reyear");
$fileDirectory = \dirname($dir . '/' . $fileToRemove);
/*
 * View
 */
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$titre = $year ? $langs->trans("PaymentsReportsForYear", $year) : $langs->trans("PaymentsReports");
$cmonth = \GETPOST("remonth") ? \GETPOST("remonth") : \date("n", \time());
$syear = \GETPOST("reyear") ? \GETPOST("reyear") : \date("Y", \time());
// Show link on other years
$linkforyear = array();
$found = 0;
$handle = \opendir($dir);