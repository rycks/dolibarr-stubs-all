<?php

$title = \GETPOST('title');
$description = \GETPOST('description', 'restricthtml');
$mailsonde = \GETPOST('mailsonde');
$creation_sondage_date = \GETPOST('creation_sondage_date');
$creation_sondage_autre = \GETPOST('creation_sondage_autre');
// We init some session variable to avoir warning
$session_var = array('title', 'description', 'mailsonde');
// On initialise également les autres variables
$cocheplus = '';
$cochemail = '';
$champdatefin = 0;
$error = 0;
$testdate = \false;
$champdatefin = (int) \dol_mktime(23, 59, 59, \GETPOSTINT('champdatefinmonth'), \GETPOSTINT('champdatefinday'), \GETPOSTINT('champdatefinyear'));
/*
 * View
 */
$form = new \Form($db);
$arrayofjs = array();
$arrayofcss = array('/opensurvey/css/style.css');
$doleditor = new \DolEditor('description', $_SESSION["description"], '', 120, 'dolibarr_notes', 'In', \true, 1, 1, \ROWS_7, '90%');
$allow_comments = '';
$allow_spy = '';