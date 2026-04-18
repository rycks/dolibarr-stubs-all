<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'targetcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$lineid = \GETPOSTINT('lineid');
// Initialize a technical objects
$object = new \Target($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->webhook->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
// Permissions
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$permissiontoread = $permissiontoadd = $permissiontodelete = $permissionnote = $permissiondellink = !empty($user->admin) ? 1 : 0;
$upload_dir = $conf->webhook->multidir_output[isset($object->entity) ? $object->entity : 1] . '/target';
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/webhook/target_list.php?mode=modulesetup', 1);
$triggermodname = 'WEBHOOK_TARGET_MODIFY';
// Actions to send emails
$triggersendname = 'WEBHOOK_TARGET_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_TARGET_TO';
$trackid = 'target' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$arrayofjs = array('/includes/ace/src/ace.js', '/includes/ace/src/ext-statusbar.js', '/includes/ace/src/ext-language_tools.js');
$arrayofcss = array();
$title = $langs->trans("Target");
$help_url = '';
$res = $object->fetch_optionals();
$head = \targetPrepareHead($object);
$formconfirm = '';
// Confirmation of action xxxx (You can use it for xxx = 'close', xxx = 'reopen', ...)
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/webhook/target_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$arraytriggercodes = \explode(",", $object->trigger_codes);
$idtriggercode = '';
$json = new \stdClass();
$datatosend = \json_encode($json);