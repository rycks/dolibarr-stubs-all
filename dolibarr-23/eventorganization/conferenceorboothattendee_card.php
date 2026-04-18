<?php

// Get parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'conferenceorboothattendeecard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$mode = \GETPOST('mode', 'aZ');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$conf_or_booth_id = \GETPOSTINT('conforboothid');
$fk_project = \GETPOSTINT('fk_project');
$withproject = 1;
// Initialize a technical objects
$object = new \ConferenceOrBoothAttendee($db);
$extrafields = new \ExtraFields($db);
$projectstatic = new \Project($db);
$diroutputmassaction = $conf->eventorganization->dir_output . '/temp/massgeneration/' . $user->id;
// Note that conf->hooks_modules contains array
$confOrBooth = \null;
$confOrBooth = new \ConferenceOrBooth($db);
// Actioncomm
$result = $confOrBooth->fetch($conf_or_booth_id);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST('search_all', 'alphanohtml');
$search = array();
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array();
// Permissions
$permissiontoread = $user->hasRight('project', 'read');
$permissiontoadd = $user->hasRight('project', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('project', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissionnote = $user->hasRight('project', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('project', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->eventorganization->multidir_output[isset($object->entity) ? $object->entity : 1];
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
//if (!empty($withproject)) {
$backurlforlist = \DOL_URL_ROOT . '/eventorganization/conferenceorboothattendee_list.php?withproject=1&fk_project=' . (int) $fk_project;
$triggermodname = 'EVENTORGANIZATION_CONFERENCEORBOOTHATTENDEE_MODIFY';
// Actions to send emails
$triggersendname = 'EVENTORGANIZATION_CONFERENCEORBOOTHATTENDEE_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_CONFERENCEORBOOTHATTENDEE_TO';
$trackid = 'conferenceorboothattendee' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("ConferenceOrBoothAttendee");
$help_url = 'EN:Module_Event_Organization';
$withProjectUrl = '';
// Tabs for project
$tab = 'eventorganisation';
$withProjectUrl = "&withproject=1";
$head = \project_prepare_head($projectstatic);
$param = $mode == 'mine' ? '&mode=mine' : '';
// Project card
$linkback = '<a href="' . \DOL_URL_ROOT . '/projet/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$start = \dol_print_date($projectstatic->date_start, 'day');
$end = \dol_print_date($projectstatic->date_end, 'day');
$start = \dol_print_date($projectstatic->date_start_event, 'day');
$end = \dol_print_date($projectstatic->date_end_event, 'day');
// Other attributes
$cols = 2;
$objectconf = $object;
$object = $projectstatic;
$object = $objectconf;
$typeofdata = 'checkbox:' . ($projectstatic->accept_conference_suggestions ? ' checked="checked"' : '');
$htmltext = $langs->trans("AllowUnknownPeopleSuggestConfHelp");
$typeofdata = 'checkbox:' . ($projectstatic->accept_booth_suggestions ? ' checked="checked"' : '');
$htmltext = $langs->trans("AllowUnknownPeopleSuggestBoothHelp");
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// Show message
$message = '<a target="_blank" rel="noopener noreferrer" href="' . $urlwithroot . '/public/agenda/agendaexport.php?format=ical' . ($conf->entity > 1 ? "&entity=" . $conf->entity : "");
// Define $urlwithroot
$urlwithouturlroot = \preg_replace('/' . \preg_quote(\DOL_URL_ROOT, '/') . '$/i', '', \trim($dolibarr_main_url_root));
$urlwithroot = $urlwithouturlroot . \DOL_URL_ROOT;
// Show message
$message = '<a target="_blank" rel="noopener noreferrer" href="' . $urlwithroot . '/public/agenda/agendaexport.php?format=ical' . ($conf->entity > 1 ? "&entity=" . $conf->entity : "");
$linksuggest = $dolibarr_main_url_root . '/public/project/index.php?id=' . (int) $projectstatic->id;
$encodedsecurekey = \dol_hash(\getDolGlobalString("EVENTORGANIZATION_SECUREKEY") . 'conferenceorbooth' . (int) $projectstatic->id, 'md5');
$link_subscription = $dolibarr_main_url_root . '/public/eventorganization/attendee_new.php?id=' . (int) $projectstatic->id . '&type=global';
$encodedsecurekey = \dol_hash(\getDolGlobalString("EVENTORGANIZATION_SECUREKEY") . 'conferenceorbooth' . (int) $projectstatic->id, 'md5');
$moreparam = '';
$head = \conferenceorboothAttendeePrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/eventorganization/conferenceorboothattendee_list.php', 1) . '?restore_lastsearch_values=1' . $moreparam . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Common attributes
//$keyforbreak='fieldkeytoswitchonsecondcolumn';	// We change column just before this field
//unset($object->fields['fk_project']);				// Hide field already shown in banner
//unset($object->fields['fk_soc']);					// Hide field already shown in banner
$keyforbreak = 'num_vote';
// Presend form
$modelmail = 'conferenceorboothattendee';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->eventorganization->dir_output;
$trackid = 'conferenceorboothattendee' . $object->id;