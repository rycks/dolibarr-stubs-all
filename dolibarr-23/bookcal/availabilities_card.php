<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
// Initialize a technical objects
$object = new \Availabilities($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->bookcal->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$enablepermissioncheck = 0;
$upload_dir = $conf->bookcal->multidir_output[isset($object->entity) ? $object->entity : 1] . '/availabilities';
$error = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \dol_buildpath('/bookcal/availabilities_list.php', 1);
$triggermodname = 'BOOKCAL_AVAILABILITIES_MODIFY';
// Name of trigger action code to execute when we modify record
$startday = \GETPOSTINT('startday');
$startmonth = \GETPOSTINT('startmonth');
$startyear = \GETPOSTINT('startyear');
$starthour = \GETPOSTINT('startHour');
$dateStartTimestamp = \dol_mktime($starthour, 0, 0, $startmonth, $startday, $startyear);
$endday = \GETPOSTINT('endday');
$endmonth = \GETPOSTINT('endmonth');
$endyear = \GETPOSTINT('endyear');
$endhour = \GETPOSTINT('endHour');
$dateEndTimestamp = \dol_mktime($endhour, 0, 0, $endmonth, $endday, $endyear);
// Actions to send emails
$triggersendname = 'BOOKCAL_AVAILABILITIES_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_AVAILABILITIES_TO';
$trackid = 'availabilities' . $object->id;
/*
 * View
 *
 * Put here all code to build page
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("Availabilities");
$help_url = '';
$res = $object->fetch_optionals();
$head = \availabilitiesPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/bookcal/availabilities_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Presend form
$modelmail = 'availabilities';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->bookcal->dir_output;
$trackid = 'availabilities' . $object->id;