<?php

// Initialize Variables
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$numsondage = '';
// Initialize objects
$object = new \Opensurveysondage($db);
$result = $object->fetch('', $numsondage);
$expiredate = \dol_mktime(0, 0, 0, \GETPOSTINT('expiremonth'), \GETPOSTINT('expireday'), \GETPOSTINT('expireyear'));
$permissiontoread = $user->hasRight('opensurvey', 'read');
$permissiontoadd = $user->hasRight('opensurvey', 'write');
$permissiontodelete = $user->hasRight('opensurvey', 'write');
// permission delete doesn't exists
/*
 * Actions
 */
$parameters = array('id' => $numsondage);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$userstatic = \null;
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
$url = $urlwithroot . '/public/opensurvey/studs.php?sondage=' . $object->id_sondage;
// Other attributes
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);
// Comment list
$comments = $object->getComments();