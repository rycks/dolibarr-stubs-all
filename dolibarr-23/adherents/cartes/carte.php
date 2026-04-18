<?php

// Choice of printing year or current year.
$now = \dol_now();
$year = \dol_print_date($now, '%Y');
$month = \dol_print_date($now, '%m');
$day = \dol_print_date($now, '%d');
$foruserid = \GETPOST('foruserid', 'alphanohtml');
$foruserlogin = \GETPOST('foruserlogin', 'alphanohtml');
$mode = \GETPOST('mode', 'aZ09');
$modelcard = \GETPOST("modelcard", 'aZ09');
// Doc template to use for business cards
$model = \GETPOST("model", 'aZ09');
// Doc template to use for business cards
$modellabel = \GETPOST("modellabel", 'aZ09');
// Doc template to use for address sheet
$mesg = '';
$adherentstatic = new \Adherent($db);
$object = new \Adherent($db);
$extrafields = new \ExtraFields($db);
// Security check
$result = \restrictedArea($user, 'adherent');
$arrayofmembers = array();
// request taking into account member with up to date subscriptions
$sql = "SELECT d.rowid, d.ref, d.civility, d.firstname, d.lastname, d.login, d.societe as company, d.datefin,";
$result = $db->query($sql);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('MembersCards');
$help_url = 'EN:Module_Services_En|FR:Module_Services|ES:M&oacute;dulo_Servicios|DE:Modul_Mitglieder';
// List of possible labels (defined into $_Avery_Labels variable set into format_cards.lib.php)
$arrayoflabels = array();
// List of possible labels (defined into $_Avery_Labels variable set into format_cards.lib.php)
$arrayoflabels = array();
// List of possible labels (defined into $_Avery_Labels variable set into format_cards.lib.php)
$arrayoflabels = array();