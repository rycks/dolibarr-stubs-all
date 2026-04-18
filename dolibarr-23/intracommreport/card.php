<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
// Initialize a technical objects
$object = new \IntracommReport($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->intracommreport->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \trim(\GETPOST("search_all", 'alpha'));
$search = array();
// Must be 'include', not 'include_once'.
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$enablepermissioncheck = 1;
$upload_dir = $conf->intracommreport->multidir_output[isset($object->entity) ? $object->entity : 1] . '/intracommreport';
$error = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \dol_buildpath('/intracommreport/list.php', 1);
$triggermodname = 'INTRACOMMREPORT_MODIFY';
// Actions to send emails
$triggersendname = 'INTRACOMMREPORT_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_INTRACOMMREPORT_TO';
$trackid = 'intracommreport' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("IntraCommReport") . " - " . $langs->trans('Card');
$help_url = '';
$head = \intracommreportPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/intracommreport/list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Presend form
$modelmail = 'intracommreport';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->intracommreport->dir_output;
$trackid = 'intracommreport' . $object->id;