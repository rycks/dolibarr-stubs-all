<?php

/*
 * Action
 */
$arrayofchoices = \GETPOST('choix', 'array');
$arrayoftypecolumn = \GETPOST('typecolonne', 'array');
$toutchoix = '';
$toutchoix = \substr($toutchoix, 1);
//test de remplissage des cases
$testremplissage = '';
/*
 * View
 */
$form = new \Form($db);
$arrayofjs = array();
$arrayofcss = array('/opensurvey/css/style.css');