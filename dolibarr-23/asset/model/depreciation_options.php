<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// Initialize a technical objects
$object = new \AssetModel($db);
$assetdepreciationoptions = new \AssetDepreciationOptions($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->asset->dir_output . '/temp/massgeneration/' . $user->id;
$permissiontoread = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'read') || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'model_advance', 'read');
$permissiontoadd = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'write') || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'model_advance', 'write');
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = $assetdepreciationoptions->fetchDeprecationOptions(0, $object->id);
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/asset/list.php';
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$head = \assetModelPrepareHead($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/asset/model/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';