<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : \str_replace('_', '', \basename(\dirname(__FILE__)) . \basename(__FILE__, '.php'));
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
$groups = \GETPOST('groups', 'array:int');
$resources = \GETPOST('resources', 'array:int');
//$lineid   = GETPOST('lineid', 'int');
// Initialize a technical objects
$object = new \Workstation($db);
//$extrafields = new ExtraFields($db);
$diroutputmassaction = $conf->workstation->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \trim(\GETPOST("search_all", 'alpha'));
$search = array();
// Must be 'include', not 'include_once'.
// Permissions
$permissiontoread = $user->hasRight('workstation', 'workstation', 'read');
$permissiontoadd = $user->hasRight('workstation', 'workstation', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('workstation', 'workstation', 'delete') || $permissiontoadd && isset($object->status) && $object->status == \Workstation::STATUS_DISABLED;
$permissionnote = $user->hasRight('workstation', 'workstation', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('workstation', 'workstation', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = \rtrim(\getMultidirOutput($object, '', 1), '/');
// Security check
$isdraft = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/workstation/workstation_list.php', 1);
$triggermodname = 'WORKSTATION_WORKSTATION_MODIFY';
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formresource = new \FormResource($db);
$title = $langs->trans("Workstation") . " - " . $langs->trans('Card');
$help_url = 'EN:Module_Workstation';
$head = \workstationPrepareHead($object);
$formconfirm = '';
$formquestion = array();
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/workstation/workstation_list.php', 1) . '?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';