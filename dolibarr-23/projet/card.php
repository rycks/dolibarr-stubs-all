<?php

// Load translation files required by the page
$langsLoad = array('projects', 'companies');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$confirm = \GETPOST('confirm', 'aZ09');
$dol_openinpopup = '';
$status = \GETPOSTINT('status');
$opp_status = \GETPOSTINT('opp_status');
$opp_percent = \price2num(\GETPOST('opp_percent', 'alphanohtml'));
$objcanvas = \GETPOST("objcanvas", "alphanohtml");
$comefromclone = \GETPOST("comefromclone", "alphanohtml");
$date_start = \dol_mktime(0, 0, 0, \GETPOSTINT('projectstartmonth'), \GETPOSTINT('projectstartday'), \GETPOSTINT('projectstartyear'));
$date_end = \dol_mktime(0, 0, 0, \GETPOSTINT('projectendmonth'), \GETPOSTINT('projectendday'), \GETPOSTINT('projectendyear'));
$date_start_event = \dol_mktime(\GETPOSTINT('date_start_eventhour'), \GETPOSTINT('date_start_eventmin'), \GETPOSTINT('date_start_eventsec'), \GETPOSTINT('date_start_eventmonth'), \GETPOSTINT('date_start_eventday'), \GETPOSTINT('date_start_eventyear'), 'tzuserrel');
$date_end_event = \dol_mktime(\GETPOSTINT('date_end_eventhour'), \GETPOSTINT('date_end_eventmin'), \GETPOSTINT('date_end_eventsec'), \GETPOSTINT('date_end_eventmonth'), \GETPOSTINT('date_end_eventday'), \GETPOSTINT('date_end_eventyear'), 'tzuserrel');
$location = \GETPOST('location', 'alphanohtml');
$mine = \GETPOST('mode') == 'mine' ? 1 : 0;
$object = new \Project($db);
$extrafields = new \ExtraFields($db);
$ret = $object->fetch($id, $ref);
// Security check
$socid = \GETPOSTINT('socid');
$permissiontoadd = $user->hasRight('projet', 'creer');
$permissiontodelete = $user->hasRight('projet', 'supprimer');
$permissiondellink = $user->hasRight('projet', 'creer');
// Used by the include of actions_dellink.inc.php
$permissiontoeditextra = $permissiontoadd;
/*
 * Actions
 */
$error = 0;
$parameters = array('id' => $socid, 'objcanvas' => $objcanvas);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/projet/list.php';
// Actions to send emails
$triggersendname = 'PROJECT_SENTBYMAIL';
$paramname = 'id';
$autocopy = 'MAIN_MAIL_AUTOCOPY_PROJECT_TO';
// used to know the automatic BCC to add
$trackid = 'proj' . $object->id;
/*
 *	View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$userstatic = new \User($db);
$title = $langs->trans("Project") . ' - ' . $object->ref . (!empty($object->thirdparty->name) ? ' - ' . $object->thirdparty->name : '') . (!empty($object->title) ? ' - ' . $object->title : '');
$help_url = "EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos|DE:Modul_Projekte";
$titleboth = $langs->trans("LeadsOrProjects");
$titlenew = $langs->trans("NewLeadOrProject");
/*
 * Create
 */
$thirdparty = new \Societe($db);
$defaultref = '';
$modele = \getDolGlobalString('PROJECT_ADDON', 'mod_project_simple');
// Search template files
$file = '';
$classname = '';
$reldir = '';
$filefound = 0;
$dirmodels = \array_merge(array('/'), (array) $conf->modules_parts['models']);
// Ref
$suggestedref = \GETPOST("ref") ? \GETPOST("ref") : $defaultref;
$doleditor = new \DolEditor('description', \GETPOST("description", 'restricthtml'), '', 90, 'dolibarr_notes', '', \false, \true, \isModEnabled('fckeditor') && \getDolGlobalString('FCKEDITOR_ENABLE_SOCIETE'), \ROWS_3, '90%');
$array = array();
$contactList = $object->liste_type_contact('internal', 'position', 1);
$typeofcontact = \GETPOST('typeofcontact') ? \GETPOST('typeofcontact') : 'PROJECTLEADER';
// Other options
$parameters = array();
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $object, $action);