<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'assetmodelcard';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// Initialize a technical objects
$object = new \AssetModel($db);
$assetdepreciationoptions = new \AssetDepreciationOptions($db);
$assetaccountancycodes = new \AssetAccountancyCodes($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->asset->dir_output . '/temp/massgeneration/' . $user->id;
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Initialize array of search criteria
$search_all = \GETPOST("search_all", 'alpha');
$search = array();
// Must be 'include', not 'include_once'.
$permissiontoread = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'read') || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'model_advance', 'read');
$permissiontoadd = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'write') || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'model_advance', 'write');
// Used by the include of actions_addupdatedelete.inc.php and actions_lineupdown.inc.php
$permissiontodelete = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'delete') || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'model_advance', 'delete') || $permissiontoadd && isset($object->status) && $object->status == $object::STATUS_DRAFT;
$permissionnote = $permissiontoadd;
// Used by the include of actions_setnotes.inc.php
$permissiondellink = $permissiontoadd;
// Used by the include of actions_dellink.inc.php
$upload_dir = $conf->asset->multidir_output[isset($object->entity) ? $object->entity : 1];
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$depreciationoptionserrors = $assetdepreciationoptions->fetchDeprecationOptions(0, $object->id);
$accountancycodeserrors = $assetaccountancycodes->fetchAccountancyCodes(0, $object->id);
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$error = 0;
$backurlforlist = \DOL_URL_ROOT . '/asset/model/list.php';
$triggermodname = 'ASSETMODEL_MODIFY';
/*
 * View
 *
 * Put here all code to build page
 */
$form = new \Form($db);
$formfile = new \FormFile($db);
$title = $langs->trans("AssetModel") . ' - ' . $langs->trans("Card");
$help_url = '';
$res = $object->fetch_optionals();
$head = \assetModelPrepareHead($object);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/asset/model/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';