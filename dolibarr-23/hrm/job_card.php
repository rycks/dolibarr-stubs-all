<?php

// why products?
// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'jobcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$lineid = \GETPOSTINT('lineid');
// Initialize a technical objects
$object = new \Job($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->hrm->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
// Permissions
$permissiontoread = $user->hasRight('hrm', 'all', 'read');
$permissiontoadd = $user->hasRight('hrm', 'all', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('hrm', 'all', 'delete');
$upload_dir = $conf->hrm->multidir_output[isset($object->entity) ? $object->entity : 1] . '/job';
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/hrm/job_list.php', 1);
$triggermodname = 'HRM_JOB_MODIFY';
// Actions to send emails
$triggersendname = 'HRM_JOB_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_JOB_TO';
$trackid = 'job' . $object->id;
/*
 * View
 *
 * Put here all code to build page
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("Job");
$help_url = '';
$res = $object->fetch_optionals();
$head = \jobPrepareHead($object);
$picto = 'company.png';
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/hrm/job_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refid">';
// Presend form
$modelmail = 'job';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->hrm->dir_output;
$trackid = 'job' . $object->id;