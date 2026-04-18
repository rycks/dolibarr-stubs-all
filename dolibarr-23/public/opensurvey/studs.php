<?php

\define("NOLOGIN", 1);
\define("NOCSRFCHECK", 1);
\define('NOBROWSERNOTIF', '1');
\define('NOIPCHECK', '1');
/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var Societe $mysoc
 * @var Translate $langs
 */
// Init vars
$action = \GETPOST('action', 'aZ09');
$numsondage = '';
$object = new \Opensurveysondage($db);
$result = $object->fetch('', $numsondage);
$nblines = $object->fetch_lines();
//If the survey has not yet finished, then it can be modified
$canbemodified = (empty($object->date_fin) || \dol_get_last_hour($object->date_fin) > \dol_now()) && $object->status != \Opensurveysondage::STATUS_CLOSED;
/*
 * Actions
 */
$nbcolonnes = \substr_count($object->sujet, ',') + 1;
$listofvoters = \explode(',', $_SESSION["savevoter"]);
$error = 0;
$comment = \GETPOST("comment", 'alphanohtml');
$comment_user = \GETPOST('commentuser', 'alphanohtml');
$user_ip = \getUserRemoteIP();
$nb_post_max = \getDolGlobalInt("MAIN_SECURITY_MAX_POST_ON_PUBLIC_PAGES_BY_IP_ADDRESS", 200);
$now = \dol_now();
$minmonthpost = \dol_time_plus_duree($now, -1, "m");
// Calculate nb of post for IP
$nb_post_ip = 0;
// Update vote
$testmodifier = \false;
$testligneamodifier = \false;
$ligneamodifier = -1;
$modifier = -1;
$nouveauchoix = '';
$idtomodify = \GETPOST("idtomodify" . $modifier);
$sql = 'UPDATE ' . \MAIN_DB_PREFIX . "opensurvey_user_studs";
$resql = $db->query($sql);
// Delete comment
$idcomment = \GETPOSTINT('deletecomment');
$resql = $object->deleteComment($idcomment);
/*
 * View
 */
$form = new \Form($db);
$arrayofjs = array();
$arrayofcss = array('/opensurvey/css/style.css');
// Define format of choices
$toutsujet = \explode(",", $object->sujet);
$listofanswers = array();
$toutsujet = \str_replace("°", "'", $toutsujet);
// show title of survey
$titre = \str_replace("\\", "", $object->title);
//display of years
$colspan = 1;
$nbofsujet = \count($toutsujet);
//display of months
$colspan = 1;
//display of days
$colspan = 1;
// Loop on each answer
$currentusername = '';
$sumfor = array();
$sumagainst = array();
$compteur = 0;
$sql = "SELECT id_users, nom as name, id_sondage, reponses";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Select value of best choice (for checkbox columns only)
$nbofcheckbox = 0;
$meilleurecolonne = \null;
$toutsujet = \explode(",", $object->sujet);
$toutsujet = \str_replace("°", "'", $toutsujet);
$compteursujet = 0;
$meilleursujet = '';
//$meilleursujet = substr($meilleursujet, 1);
$meilleursujet = \str_replace("°", "'", $meilleursujet);
// Comment list
$comments = $object->getComments();