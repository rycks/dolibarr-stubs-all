<?php

$action = \GETPOST('action', 'aZ09');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$mine = \GETPOST('mode', 'alpha') == 'mine' ? 1 : 0;
$object = new \Project($db);
$result = \restrictedArea($user, 'projet', $object->id, 'projet&project');
$permissionnote = $user->hasRight('project', 'creer');
// Used by the include of actions_setnotes.inc.php
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $langs->trans("Notes") . ' - ' . $object->ref . ' ' . $object->name;
$help_url = "EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos";
$form = new \Form($db);
$userstatic = new \User($db);
$now = \dol_now();
// To verify role of users
//$userAccess = $object->restrictedProjectArea($user,'read');
$userWrite = $object->restrictedProjectArea($user, 'write');
//$userDelete = $object->restrictedProjectArea($user,'delete');
//print "userAccess=".$userAccess." userWrite=".$userWrite." userDelete=".$userDelete;
$head = \project_prepare_head($object);
$morehtmlref = '<div class="refidno">';
$cssclass = "titlefield";