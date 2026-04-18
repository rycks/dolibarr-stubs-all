<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
$backtopageforcancel = \GETPOST('backtopageforcancel', 'alpha');
// if not set, $backtopage will be used
// Initialize a technical objects
$object = new \Asset($db);
$assetdepreciationoptions = new \AssetDepreciationOptions($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->asset->dir_output . '/temp/massgeneration/' . $user->id;
$permissiontoadd = $user->hasRight('asset', 'write');
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
$result = $assetdepreciationoptions->fetchDeprecationOptions($object->id);
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$backurlforlist = \DOL_URL_ROOT . '/asset/list.php';
/*
 * View
 */
$form = new \Form($db);
$help_url = '';
$head = \assetPrepareHead($object);
// Object card
// ------------------------------------------------------------
$linkback = '<a href="' . \DOL_URL_ROOT . '/asset/list.php?restore_lastsearch_values=1">' . $langs->trans("BackToList") . '</a>';
$morehtmlref = '<div class="refidno">';