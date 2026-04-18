<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'knowledgerecordcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
$lineid = \GETPOSTINT('lineid');
// Initialize a technical objects
$object = new \KnowledgeRecord($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->knowledgemanagement->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
$permissiontoread = $user->hasRight('knowledgemanagement', 'knowledgerecord', 'read');
$permissiontoadd = $user->hasRight('knowledgemanagement', 'knowledgerecord', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('knowledgemanagement', 'knowledgerecord', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissiontovalidate = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $permissiontoadd || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('knowledgemanagement', 'knowledgerecord_advance', 'validate');
$permissionnote = $user->hasRight('knowledgemanagement', 'knowledgerecord', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('knowledgemanagement', 'knowledgerecord', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->knowledgemanagement->multidir_output[isset($object->entity) ? $object->entity : 1];
// Security check - Protection if external user
//if ($user->socid > 0) accessforbidden();
//if ($user->socid > 0) $socid = $user->socid;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
//if (empty($conf->knowledgemanagement->enabled)) accessforbidden();
//if (empty($permissiontoread)) accessforbidden();
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/knowledgemanagement/knowledgerecord_list.php';
$triggermodname = 'KNOWLEDGERECORD_MODIFY';
// Actions to send emails
$triggersendname = 'KNOWLEDGEMANAGEMENT_KNOWLEDGERECORD_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_KNOWLEDGERECORD_TO';
$trackid = 'knowledgerecord' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$formadmin = new \FormAdmin($db);
$title = $langs->trans("KnowledgeRecord");
$help_url = '';
$doleditor = new \DolEditor('answer', $object->answer, '', 200, 'dolibarr_notes', 'In', \true, \true, \true, \ROWS_9, '100%');
$out = $doleditor->Create(1);
$doleditor = new \DolEditor('answer', $object->answer, '', 200, 'dolibarr_notes', 'In', \true, \true, \true, \ROWS_9, '100%');
$out = $doleditor->Create(1);
$res = $object->fetch_optionals();
$head = \knowledgerecordPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/knowledgemanagement/knowledgerecord_list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Common attributes
$keyforbreak = 'fk_c_ticket_category';
$doleditor = new \DolEditor('answer', $object->answer, '', 200, 'dolibarr_notes', 'In', \true, \true, \true, \ROWS_9, '100%', 1);
$out = $doleditor->Create(1);
// Presend form
$modelmail = 'knowledgerecord';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->knowledgemanagement->dir_output;
$trackid = 'knowledgerecord' . $object->id;