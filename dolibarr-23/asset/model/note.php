<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \AssetModel($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->asset->dir_output . '/temp/massgeneration/' . $user->id;
$permissiontoread = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'read') || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'model_advance', 'read');
$permissiontoadd = !\getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'write') || \getDolGlobalString('MAIN_USE_ADVANCED_PERMS') && $user->hasRight('asset', 'model_advance', 'write');
// Used by the include of actions_addupdatedelete.inc.php
$permissionnote = $permissiontoadd;
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$help_url = '';