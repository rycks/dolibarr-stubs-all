<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$track_id = \GETPOST('track_id', 'alpha', 3);
$socid = \GETPOSTINT('socid');
$contactid = \GETPOSTINT('contactid');
$projectid = \GETPOSTINT('projectid');
$notifyTiers = \GETPOST("notify_tiers_at_create", 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ');
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma') ? \GETPOST('sortfield', 'aZ09comma') : "a.datep";
$sortorder = \GETPOST('sortorder', 'aZ09comma') ? \GETPOST('sortorder', 'aZ09comma') : "desc";
$search_rowid = \GETPOST('search_rowid');
$search_agenda_label = \GETPOST('search_agenda_label');
$actioncode = \GETPOST('actioncode', 'array', 3);
$object = new \Ticket($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
$res = $object->fetch($id, $ref, $track_id);
$now = \dol_now();
$actionobject = new \ActionsTicket($db);
// Store current page url
$url_page_current = \DOL_URL_ROOT . '/ticket/card.php';
$result = \restrictedArea($user, 'ticket', $object->id);
$triggermodname = 'TICKET_MODIFY';
// Permissions
$permissiontoread = $user->hasRight('ticket', 'read');
$permissiontoadd = $user->hasRight('ticket', 'write');
$permissiontodelete = $user->hasRight('ticket', 'delete');
$permissiontoeditextra = $permissiontoadd;
$upload_dir = $conf->ticket->dir_output;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/ticket/list.php';
$permissiondellink = $user->hasRight('ticket', 'write');
// Actions to send emails
$triggersendname = 'TICKET_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_TICKET_TO';
// used to know the automatic BCC to add
$trackid = 'tic' . $object->id;
/*
 * View
 */
$userstat = new \User($db);
$form = new \Form($db);
$formfile = new \FormFile($db);
$formticket = new \FormTicket($db);
$help_url = 'EN:Module_Ticket|FR:DocumentationModuleTicket';
$title = $actionobject->getTitle($action, $object);
$formticket = new \FormTicket($db);