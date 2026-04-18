<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$mine = \GETPOST('mode') == 'mine' ? 1 : 0;
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$withproject = \GETPOSTINT('withproject');
$project_ref = \GETPOST('project_ref', 'alpha');
// Security check
$socid = 0;
$object = new \Task($db);
$projectstatic = new \Project($db);
$permissionnote = $user->hasRight('projet', 'creer') || $user->hasRight('projet', 'all', 'creer');
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$userstatic = new \User($db);
$now = \dol_now();
$title = $object->ref . ' - ' . $langs->trans("Notes");
$help_url = '';
$userWrite = $projectstatic->restrictedProjectArea($user, 'write');
$head = \task_prepare_head($object);
$param = \GETPOST('withproject') ? '&withproject=1' : '';
$linkback = \GETPOST('withproject') ? '<a href="' . \DOL_URL_ROOT . '/projet/tasks.php?id=' . $projectstatic->id . '">' . $langs->trans("BackToList") . '</a>' : '';
$morehtmlref = '';
$cssclass = 'titlefield';
$moreparam = $param;