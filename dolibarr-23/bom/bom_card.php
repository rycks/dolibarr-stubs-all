<?php

// Get parameters
$id = \GETPOSTINT('id');
$lineid = \GETPOSTINT('lineid');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'bomcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// PDF
$hidedetails = \GETPOSTINT('hidedetails') ? \GETPOSTINT('hidedetails') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DETAILS') ? 1 : 0);
$hidedesc = \GETPOSTINT('hidedesc') ? \GETPOSTINT('hidedesc') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_DESC') ? 1 : 0);
$hideref = \GETPOSTINT('hideref') ? \GETPOSTINT('hideref') : (\getDolGlobalString('MAIN_GENERATE_DOCUMENTS_HIDE_REF') ? 1 : 0);
// Initialize a technical objects
$object = new \BOM($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = \getMultidirOutput($object) . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = \restrictedArea($user, 'bom', $object->id, $object->table_element, '', '', 'rowid', $isdraft);
// Permissions
$permissionnote = $user->hasRight('bom', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('bom', 'write');
// Used by the include of actions_dellink.inc.php
$permissiontoadd = $user->hasRight('bom', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('bom', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$upload_dir = $conf->bom->multidir_output[isset($object->entity) ? $object->entity : 1];
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/bom/bom_list.php';
$triggermodname = $object->TRIGGER_PREFIX . '_MODIFY';
// Actions to send emails
$triggersendname = 'BOM_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_BOM_TO';
$trackid = 'bom' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$help_url = 'EN:Module_BOM';
$head = \bomPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/bom/bom_list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Common attributes
$keyforbreak = 'duration';
$manufacturedvalued = '';
$res = $object->fetchLines();
// Presend form
$modelmail = 'bom';
$defaulttopic = 'InformationMessage';
$diroutput = \getMultidirOutput($object);
$trackid = 'bom' . $object->id;