<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'recruitmentcandidaturecard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$lineid = \GETPOSTINT('lineid');
// Initialize a technical objects
$object = new \RecruitmentCandidature($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->recruitment->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
$permissiontoread = $user->hasRight('recruitment', 'recruitmentjobposition', 'read');
$permissiontoadd = $user->hasRight('recruitment', 'recruitmentjobposition', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('recruitment', 'recruitmentjobposition', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissionnote = $user->hasRight('recruitment', 'recruitmentjobposition', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('recruitment', 'recruitmentjobposition', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->recruitment->multidir_output[isset($object->entity) ? $object->entity : 1];
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'recruitment', $object->id, 'recruitment_recruitmentcandidature', 'recruitmentjobposition', '', 'rowid', $isdraft);
$reg = array();
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/recruitment/recruitmentcandidature_list.php', 1);
$triggermodname = 'RECRUITMENTCANDIDATURE_MODIFY';
// Actions to send emails
$triggersendname = 'RECRUITMENTCANDIDATURE_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_RECRUITMENTCANDIDATURE_TO';
$trackid = 'recruitmentcandidature' . $object->id;
/*
 * View
 *
 * Put here all code to build page
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$res = $object->fetch_optionals();
$head = \recruitmentCandidaturePrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/recruitment/recruitmentcandidature_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Common attributes
$keyforbreak = 'description';
// Presend form
$modelmail = 'recruitmentcandidature_send';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->recruitment->dir_output;
$trackid = 'recruitmentcandidature' . $object->id;
$inreplyto = $object->email_msgid;
$job = new \RecruitmentJobPosition($db);
$recruiter = new \User($db);
$recruitername = $recruiter->getFullName($langs);
$recruitermail = !empty($job->email_recruiter) ? $job->email_recruiter : $recruiter->email;