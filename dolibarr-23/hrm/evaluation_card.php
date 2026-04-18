<?php

// why products?
// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'evaluationcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$lineid = \GETPOSTINT('lineid');
// Initialize a technical objects
$object = new \Evaluation($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->hrm->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
// Permissions
$permissiontoread = $user->hasRight('hrm', 'evaluation', 'read');
$permissiontoadd = $user->hasRight('hrm', 'evaluation', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontovalidate = \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('hrm', 'evaluation_advance', 'validate') || !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $permissiontoadd;
$permissiontoclose = $user->hasRight('hrm', 'evaluation', 'write');
$permissiontodelete = $user->hasRight('hrm', 'evaluation', 'delete');
$permissiondellink = $user->hasRight('hrm', 'evaluation', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->hrm->multidir_output[isset($object->entity) ? $object->entity : 1] . '/evaluation';
// Security check (enable the most restrictive one)
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == \Evaluation::STATUS_DRAFT ? 1 : 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/hrm/evaluation_list.php', 1);
$triggermodname = 'HRM_EVALUATION_MODIFY';
// Actions to send emails
$triggersendname = 'HRM_EVALUATION_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_EVALUATION_TO';
$trackid = 'evaluation' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans("Evaluation");
$help_url = '';
$css = array();
$res = $object->fetch_optionals();
$head = \evaluationPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/hrm/evaluation_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$u_position = new \User($db);
$job = new \Job($db);
//Select mail models is same action as presend
/*if (GETPOST('modelselected')) {
		// $action = 'presend';
	}*/
// To delete.
// Presend form
$modelmail = 'evaluation';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->hrm->dir_output;
$trackid = 'evaluation' . $object->id;