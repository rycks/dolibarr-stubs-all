<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
// Load translation files required by the page
$langsLoad = array('projects', 'companies');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$lineid = \GETPOSTINT('lineid');
$socid = \GETPOSTINT('socid');
$action = \GETPOST('action', 'aZ09');
$mine = \GETPOST('mode') == 'mine' ? 1 : 0;
$object = new \Project($db);
// Security check
$socid = 0;
//if ($user->socid > 0) $socid = $user->socid;    // For external user, no check is done on company because readability is managed by public status of project and assignment.
$result = \restrictedArea($user, 'projet', $id, 'projet&project');
$permissiontoadd = $user->hasRight('projet', 'creer');
/*
 * Actions
 */
$error = 0;
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$formconfirmtoaddtasks = '';
/*
 * View
 */
$form = new \Form($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$title = $langs->trans('ProjectContact') . ' - ' . $object->ref . ' ' . $object->name;
$help_url = 'EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos|DE:Modul_Projekte';
// To verify role of users
//$userAccess = $object->restrictedProjectArea($user,'read');
$userWrite = $object->restrictedProjectArea($user, 'write');
//$userDelete = $object->restrictedProjectArea($user,'delete');
//print "userAccess=".$userAccess." userWrite=".$userWrite." userDelete=".$userDelete;
$head = \project_prepare_head($object);
$formconfirm = $formconfirmtoaddtasks;
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);
$morehtmlref = '<div class="refidno">';
$start = \dol_print_date($object->date_start, 'day');
$end = \dol_print_date($object->date_end, 'day');
// Other attributes
$cols = 2;
// Contacts lines (modules that overwrite templates must declare this into descriptor)
$dirtpls = \array_merge($conf->modules_parts['tpl'], array('/core/tpl'));