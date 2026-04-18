<?php

$action = \GETPOST('action', 'alpha');
$confirm = \GETPOST('confirm', 'alpha');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$mine = \GETPOST('mode', 'alpha') == 'mine' ? 1 : 0;
$object = new \Project($db);
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// Security check
$socid = 0;
//if ($user->socid > 0) $socid = $user->socid;    // For external user, no check is done on company because readability is managed by public status of project and assignment.
$result = \restrictedArea($user, 'projet', $id, 'projet&project');
$permissiontoadd = $user->hasRight('projet', 'creer');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$title = $langs->trans('Documents') . ' - ' . $object->ref . ' ' . $object->name;
$help_url = 'EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos|DE:Modul_Projekte';
$form = new \Form($db);
$upload_dir = $conf->project->multidir_output[$object->entity ?? $conf->entity] . '/' . \dol_sanitizeFileName($object->ref);
// To verify role of users
//$userAccess = $object->restrictedProjectArea($user,'read');
$userWrite = $object->restrictedProjectArea($user, 'write');
//$userDelete = $object->restrictedProjectArea($user,'delete');
//print "userAccess=".$userAccess." userWrite=".$userWrite." userDelete=".$userDelete;
$head = \project_prepare_head($object);
// Files list constructor
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$morehtmlref = '<div class="refidno">';
$modulepart = 'projet';
$permissiontoadd = $userWrite > 0;
$permtoedit = $userWrite > 0;