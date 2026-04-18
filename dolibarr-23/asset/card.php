<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'assetcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// Initialize a technical objects
$object = new \Asset($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->asset->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
$permissiontoread = $user->hasRight('asset', 'read');
$permissiontoadd = $user->hasRight('asset', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = $user->hasRight('asset', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissionnote = $user->hasRight('asset', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $user->hasRight('asset', 'write');
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->asset->multidir_output[isset($object->entity) ? $object->entity : 1];
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/asset/list.php';
// @phan-suppress-current-line PhanTypeMismatchProperty
$triggermodname = 'ASSET_MODIFY';
// Actions to send emails
$triggersendname = 'ASSET_SENTBYMAIL';
$autocopy = 'MAIN_MAIL_AUTOCOPY_ASSET_TO';
$trackid = 'asset' . $object->id;
/*
 * View
 *
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans("Asset") . ' - ' . $langs->trans("Card");
$help_url = '';
$res = $object->fetch_optionals();
$head = \assetPrepareHead($object);
$formconfirm = '';
// Clone confirmation
/*  elseif ($action == 'clone') {
		// Create an array for form
		$formquestion = array();
		$formconfirm = $form->formconfirm($_SERVER["PHP_SELF"].'?id='.$object->id, $langs->trans('ToClone'), $langs->trans('ConfirmCloneAsk', $object->ref), 'confirm_clone', $formquestion, 'yes', 1);
	}*/
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/asset/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';
// Common attributes
$keyforbreak = 'date_acquisition';
// Presend form
$modelmail = 'asset';
$defaulttopic = 'InformationMessage';
$diroutput = $conf->asset->dir_output;
$trackid = 'asset' . $object->id;