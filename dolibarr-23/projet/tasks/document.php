<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$mine = \GETPOST('mode') == 'mine' ? 1 : 0;
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$withproject = \GETPOSTINT('withproject');
$project_ref = \GETPOST('project_ref', 'alpha');
// Get parameters
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$object = new \Task($db);
$projectstatic = new \Project($db);
$upload_dir = \null;
// Security check
$socid = 0;
$permissiontoadd = $user->hasRight('projet', 'creer');
// Used by the include of actions_addupdatedelete.inc.php and actions_linkedfiles.inc.php
/*
 * Actions
 */
$parameters = array('projectid' => $object->fk_project);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$title = $object->ref . ' - ' . $langs->trans("Documents");
$help_url = '';
$userWrite = $projectstatic->restrictedProjectArea($user, 'write');
$head = \task_prepare_head($object);
// Files list constructor
$filearray = \dol_dir_list($upload_dir, "files", 0, '', '(\\.meta|_preview.*\\.png)$', $sortfield, \strtolower($sortorder) == 'desc' ? \SORT_DESC : \SORT_ASC, 1);
$totalsize = 0;
$param = \GETPOST('withproject') ? '&withproject=1' : '';
$linkback = \GETPOST('withproject') ? '<a href="' . \DOL_URL_ROOT . '/projet/tasks.php?id=' . $projectstatic->id . '">' . $langs->trans("BackToList") . '</a>' : '';
$morehtmlref = '';
$param = '';
$modulepart = 'project_task';
$permissiontoadd = $user->hasRight('projet', 'creer');
$permtoedit = $user->hasRight('projet', 'creer');
$relativepathwithnofile = \dol_sanitizeFileName($projectstatic->ref) . '/' . \dol_sanitizeFileName($object->ref) . '/';