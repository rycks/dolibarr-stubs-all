<?php

// Get Parameters
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'conferenceorboothcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$optioncss = \GETPOST('optioncss', 'aZ');
// Option for the css output (always '' except when 'print')
$mode = \GETPOST('mode', 'aZ');
// The output mode ('list', 'kanban', 'hierarchy', 'calendar', ...)
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$withproject = \GETPOSTINT('withproject');
$project_ref = \GETPOST('project_ref', 'alpha');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
//if (! $sortfield) $sortfield="position_name";
// Initialize a technical objects
$object = new \ConferenceOrBooth($db);
$extrafields = new \ExtraFields($db);
$projectstatic = new \Project($db);
$diroutputmassaction = $conf->eventorganization->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Must be 'include', not 'include_once'.
$upload_dir = $conf->eventorganization->multidir_output[isset($object->entity) ? $object->entity : 1];
// Permissions
$permissiontoread = $user->hasRight('project', 'read');
$permissiontoadd = $user->hasRight('project', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('project', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissionnote = $user->hasRight('project', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('project', 'write');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans("ConferenceOrBooth") . ' - ' . $langs->trans("Files");
$help_url = 'EN:Module_Event_Organization';
$result = $projectstatic->fetch($object->fk_project);
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
$encodedsecurekey = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'conferenceorbooth' . (int) $projectstatic->id, 'md5');
$link_subscription = $dolibarr_main_url_root . '/public/eventorganization/attendee_new.php?id=' . (int) $projectstatic->id . '&type=global';
$encodedsecurekey = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'conferenceorbooth' . (int) $projectstatic->id, 'md5');
/*
 * Show tabs
 */
$head = \conferenceorboothPrepareHead($object, $withproject);
// Build file list
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
// Object card
//-----------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/eventorganization/conferenceorbooth_list.php', 1) . '?projectid=' . $object->fk_project . $withProjectUrl . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
$modulepart = 'eventorganization';
$param = '&id=' . $object->id;
//$relativepathwithnofile='conferenceorbooth/' . dol_sanitizeFileName($object->id).'/';
$relativepathwithnofile = 'conferenceorbooth/' . \dol_sanitizeFileName($object->ref) . '/';