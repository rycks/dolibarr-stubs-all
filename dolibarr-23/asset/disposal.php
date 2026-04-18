<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \Asset($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->asset->dir_output . '/temp/massgeneration/' . $user->id;
$permissionnote = $user->hasRight('asset', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontoadd = $user->hasRight('asset', 'write');
$isdraft = $object->status == $object::STATUS_DRAFT ? 1 : 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
if (empty($reshook)) {
}
*/
/*
 * View
 */
$form = new \Form($db);
$help_url = '';