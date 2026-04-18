<?php

// Variables GET
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'conferenceorboothcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$withproject = \GETPOSTINT('withproject');
// Initialize a technical objects
$object = new \ConferenceOrBooth($db);
$extrafields = new \ExtraFields($db);
$projectstatic = new \Project($db);
$diroutputmassaction = $conf->eventorganization->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'eventorganization', $object->id, '', '', 'fk_soc', 'rowid', $isdraft);
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
// Add a new contact
$contactid = \GETPOST('userid') ? \GETPOSTINT('userid') : \GETPOSTINT('contactid');
$typeid = \GETPOST('typecontact') ? \GETPOST('typecontact') : \GETPOST('type');
$result = $object->add_contact($contactid, $typeid, \GETPOST("source", 'aZ09'));
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$title = $langs->trans('ConferenceOrBooth') . " - " . $langs->trans('ContactsAddresses');
$help_url = 'EN:Module_Event_Organization';
/* *************************************************************************** */
/*                                                                             */
/* View and edit mode                                                          */
/*                                                                             */
/* *************************************************************************** */
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
$linksuggest = $dolibarr_main_url_root . '/public/project/index.php?id=' . (int) $projectstatic->id;
$encodedsecurekey = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'conferenceorbooth' . (int) $projectstatic->id, 'md5');
$link_subscription = $dolibarr_main_url_root . '/public/eventorganization/attendee_new.php?id=' . (int) $projectstatic->id . '&type=global';
$encodedsecurekey = \dol_hash(\getDolGlobalString('EVENTORGANIZATION_SECUREKEY') . 'conferenceorbooth' . (int) $projectstatic->id, 'md5');