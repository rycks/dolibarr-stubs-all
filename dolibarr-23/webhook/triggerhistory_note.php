<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel', 'alpha');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \TriggerHistory($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->webhook->dir_output . '/temp/massgeneration/' . $user->id;
// There is several ways to check permission.
// Set $enablepermissioncheck to 1 to enable a minimum low level of checks
$permissiontoread = $permissiontoadd = $permissiontodelete = !empty($user->admin) ? 1 : 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('') . ' - ' . $langs->trans("Notes");
//$title = $object->ref." - ".$langs->trans("Notes");
$help_url = '';