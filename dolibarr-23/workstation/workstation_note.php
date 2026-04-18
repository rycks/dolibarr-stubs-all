<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \Workstation($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->workstation->dir_output . '/temp/massgeneration/' . $user->id;
$permissionnote = $user->hasRight('workstation', 'workstation', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontoadd = $user->hasRight('workstation', 'workstation', 'write');
// Used by the include of actions_addupdatedelete.inc.php
// Security check
$isdraft = 0;
/*
 * Actions
 */
$parameters = array();
// \PHPStan\dumpType($object);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$help_url = 'EN:Module_Workstation';