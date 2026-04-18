<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'recruitmentjobpositioncard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
//$lineid   = GETPOST('lineid', 'int');
// Initialize a technical objects
$object = new \RecruitmentJobPosition($db);
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
$result = \restrictedArea($user, 'recruitment', $object->id, 'recruitment_recruitmentjobposition', 'recruitmentjobposition', '', 'rowid', $isdraft);
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/recruitment/recruitmentjobposition_list.php';
$triggermodname = 'RECRUITMENT_RECRUITMENTJOBPOSITION_MODIFY';
// Actions to send emails
$triggersendname = 'RECRUITMENTJOBPOSITION_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_RECRUITMENTJOBPOSITION_TO';
$trackid = 'recruitmentjobposition' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("JobPositionApplications");
$help_url = '';
$res = $object->fetch_optionals();
$head = \recruitmentjobpositionPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/recruitment/recruitmentjobposition_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Common attributes
$keyforbreak = 'description';