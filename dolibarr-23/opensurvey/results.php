<?php

// Init vars
$action = \GETPOST('action', 'aZ09');
$numsondage = \GETPOST("id", 'alphanohtml');
$object = new \Opensurveysondage($db);
$result = $object->fetch('', $numsondage);
$nblines = $object->fetch_lines();
/*
 * Actions
 */
$error = 0;
$nbcolonnes = \substr_count($object->sujet, ',') + 1;
// Update vote
$testmodifier = \false;
$testligneamodifier = \false;
$ligneamodifier = -1;
$modifier = '';
$nouveauchoix = '';
$idtomodify = \GETPOST("idtomodify" . $modifier);
$sql = 'UPDATE ' . \MAIN_DB_PREFIX . "opensurvey_user_studs";
$resql = $db->query($sql);
$nouveauxsujets = $object->sujet;
//mise a jour avec les nouveaux sujets dans la base
$sql = 'UPDATE ' . \MAIN_DB_PREFIX . "opensurvey_sondage";
$resql = $db->query($sql);
$nouveauxsujets = $object->sujet;
/*
 * View
 */
$form = new \Form($db);
$userstatic = \null;
$result = $object->fetch('', $numsondage);
$title = $object->title . " - " . $langs->trans('Card');
$helpurl = '';
$arrayofjs = array();
$arrayofcss = array('/opensurvey/css/style.css');
// Define format of choices
$toutsujet = \explode(",", $object->sujet);
$listofanswers = array();
$toutsujet = \str_replace("@", "<br>", $toutsujet);
$toutsujet = \str_replace("°", "'", $toutsujet);
$head = \opensurvey_prepare_head($object);
$morehtmlref = '';
$linkback = '<a href="' . \DOL_URL_ROOT . '/opensurvey/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
// Type
$type = $object->format == "A" ? 'classic' : 'date';
$adresseadmin = $object->mail_admin;
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// This is to use external domain name found into config file
//$urlwithroot=DOL_MAIN_URL_ROOT;					// This is to use same domain name than current
$url = $urlwithouturlroot . \dol_buildpath('/public/opensurvey/studs.php', 1) . '?sondage=' . $object->id_sondage;
$urllink = '<input type="text" class="quatrevingtpercent" ' . ($action == 'edit' ? 'disabled' : '') . ' id="opensurveyurl" name="opensurveyurl" value="' . $url . '">';
$nbcolonnes = \substr_count($object->sujet, ',') + 1;
//reformatage des données des sujets du sondage
$toutsujet = \explode(",", $object->sujet);
$toutsujet = \str_replace("°", "'", $toutsujet);
//affichage des années
$colspan = 1;
$nbofsujet = \count($toutsujet);
//affichage des mois
$colspan = 1;
//affichage des jours
$colspan = 1;
// Loop on each answer
$sumfor = array();
$sumagainst = array();
$compteur = 0;
$sql = "SELECT id_users, nom as name, id_sondage, reponses, tms, date_creation";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Select value of best choice (for checkbox columns only)
$nbofcheckbox = 0;
$meilleurecolonne = \null;
$toutsujet = \explode(",", $object->sujet);
// With old versions, this field was not set
$compteursujet = 0;
$meilleursujet = '';
//$meilleursujet = substr($meilleursujet, 1);
$meilleursujet = \str_replace("°", "'", $meilleursujet);
$vote_str = $langs->trans('votes');