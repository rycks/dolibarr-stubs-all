<?php

// Get parameters
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$action = \GETPOST('action', 'aZ09');
$cancel = \GETPOST('cancel');
$backtopage = \GETPOST('backtopage', 'alpha');
// Initialize a technical objects
$object = new \ConferenceOrBoothAttendee($db);
$extrafields = new \ExtraFields($db);
$diroutputmassaction = $conf->eventorganization->dir_output . '/temp/massgeneration/' . $user->id;
// Permissions
$permissionnote = $user->hasRight('project', 'conferenceorboothattendee', 'write');
// Used by the include of actions_setnotes.inc.php
$permissiontoadd = $user->hasRight('project', 'conferenceorboothattendee', 'write');
/*
 * Actions
 */
$reshook = $hookmanager->executeHooks('doActions', array(), $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $langs->trans('ConferenceOrBoothAttendee');
$help_url = "EN:Module_Event_Organization";