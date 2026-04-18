<?php

$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$ref_client = \GETPOST('ref_client', 'alpha');
$socid = \GETPOSTINT('socid');
$contratid = \GETPOSTINT('contratid');
$action = \GETPOST('action', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$mesg = \GETPOST('msg', 'alpha');
$origin = \GETPOST('origin', 'alpha');
$originid = \GETPOSTINT('originid') ? \GETPOSTINT('originid') : \GETPOSTINT('origin_id');
// For backward compatibility
$note_public = \GETPOST('note_public', 'restricthtml');
$note_private = \GETPOST('note_private', 'restricthtml');
$lineid = \GETPOSTINT('line_id');
$error = 0;
//PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
$object = new \Fichinter($db);
$extrafields = new \ExtraFields($db);
$objectsrc = \null;
$ret = $object->fetch($id, $ref);
$result = \restrictedArea($user, 'ficheinter', $id, 'fichinter');
$permissionnote = $user->hasRight('ficheinter', 'creer');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('ficheinter', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontodelete = $object->status == \Fichinter::STATUS_DRAFT && $user->hasRight('ficheinter', 'creer') || $user->hasRight('ficheinter', 'supprimer');
$permissiontoadd = $user->hasRight('ficheinter', 'creer');
$permissiontoeditextra = $permissiontoadd;
/*
 * Actions
 */
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/fichinter/list.php';
// Actions to send emails
$triggersendname = 'FICHINTER_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_FICHINTER_TO';
$trackid = 'int' . $object->id;
// Actions to build doc
$upload_dir = $conf->ficheinter->dir_output;
$permissiontoadd = $user->hasRight('ficheinter', 'creer');
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formcontract = \null;
$formproject = \null;
$help_url = 'EN:Module_Interventions';
// Create new intervention
$soc = new \Societe($db);
$obj = \getDolGlobalString('FICHEINTER_ADDON');
$obj = "mod_" . $obj;