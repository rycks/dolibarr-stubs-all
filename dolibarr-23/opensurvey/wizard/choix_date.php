<?php

$erreur = \false;
$erreurNb = 0;
$choixdate = '';
$errheure = array();
//If just one day and no other time options, error message
$tmphoraires0 = \GETPOST('horaires0', 'array');
$arrayofjs = array();
$arrayofcss = array('/opensurvey/css/style.css');
//valeurs de la date du jour actuel
$jourAJ = \date("j");
$moisAJ = \date("n");
$anneeAJ = \date("Y");
// valeurs du nombre de jour dans le mois et du premier jour du mois
$nbrejourmois = \idate("t", \dol_get_first_day((int) $_SESSION["annee"], (int) $_SESSION["mois"]));
$premierjourmois = (int) \dol_print_date(\dol_get_first_day((int) $_SESSION["annee"], (int) $_SESSION["mois"]), "%w") - 1;
// Test pour éviter les doublons dans la variable qui contient toutes les dates
$journeuf = \true;
// Show list of selected days
$nbofchoice = \count($_SESSION["totalchoixjour"]);