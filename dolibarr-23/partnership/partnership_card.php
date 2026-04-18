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
$lineid = \GETPOSTINT('lineid');
$dol_openinpopup = \GETPOST('dol_openinpopup', 'aZ09');
// Initialize a technical objects
$object = new \Partnership($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->partnership->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
$permissiontoread = $user->hasRight('partnership', 'read');
$permissiontoadd = $user->hasRight('partnership', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('partnership', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissionnote = $user->hasRight('partnership', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('partnership', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->partnership->multidir_output[isset($object->entity) ? $object->entity : 1];
$managedfor = \getDolGlobalString('PARTNERSHIP_IS_MANAGED_FOR', 'thirdparty');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \dol_buildpath('/partnership/partnership_list.php', 1);
$fk_partner = $managedfor == 'member' ? \GETPOSTINT('fk_member') : \GETPOSTINT('fk_soc');
$obj_partner = $managedfor == 'member' ? $object->fk_member : $object->fk_soc;
$triggermodname = 'PARTNERSHIP_MODIFY';
// Actions to send emails
$triggersendname = 'PARTNERSHIP_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_PARTNERSHIP_TO';
$trackid = 'pship' . $object->id;
/*
 * View
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = $langs->trans("Partnership");
$help_url = '';
$head = \partnershipPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, 'lineid' => $lineid);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \dol_buildpath('/partnership/partnership_list.php', 1) . '?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Presend form
$modelmail = 'partnership_send';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->partnership->dir_output;
$trackid = 'pship' . $object->id;