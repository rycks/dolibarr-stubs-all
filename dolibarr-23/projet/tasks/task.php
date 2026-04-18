<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
//$cancel = GETPOST('cancel');
//$contextpage = GETPOST('contextpage', 'aZ') ? GETPOST('contextpage', 'aZ') : str_replace('_', '', basename(dirname(__FILE__)).basename(__FILE__, '.php')); // To manage different context of search
//$backtopage = GETPOST('backtopage', 'alpha');					// if not set, a default page will be used
//$backtopageforcancel = GETPOST('backtopageforcancel', 'alpha');	// if not set, $backtopage will be used
$id = \GETPOSTINT('id');
$ref = \GETPOST("ref", 'alpha', 1);
// task ref
$taskref = \GETPOST("taskref", 'alpha');
// task ref
$withproject = \GETPOSTINT('withproject');
$project_ref = \GETPOST('project_ref', 'alpha');
$planned_workload = \GETPOST('planned_workloadhour') != '' || \GETPOST('planned_workloadmin') != '' ? (\GETPOSTINT('planned_workloadhour') > 0 ? \GETPOSTINT('planned_workloadhour') * 3600 : 0) + (\GETPOSTINT('planned_workloadmin') > 0 ? \GETPOSTINT('planned_workloadmin') * 60 : 0) : '';
$mode = \GETPOST('mode', 'alpha');
$object = new \Task($db);
$extrafields = new \ExtraFields($db);
$projectstatic = new \Project($db);
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$ret = $object->fetch($id, $ref);
// Security check
$socid = 0;
/*
 * Actions
 */
$error = 0;
$task_origin_id = \GETPOSTINT('task_origin');
$task_origin = new \Task($db);
//$clone_contacts = GETPOST('clone_contacts') ? 1 : 0;
$clone_prog = \GETPOST('clone_prog') ? 1 : 0;
$clone_time = \GETPOST('clone_time') ? 1 : 0;
$clone_affectation = \GETPOST('clone_affectation') ? 1 : 0;
$clone_change_dt = \GETPOST('clone_change_dt') ? 1 : 0;
$clone_notes = \GETPOST('clone_notes') ? 1 : 0;
$clone_file = \GETPOST('clone_file') ? 1 : 0;
$result = $object->createFromClone($user, $object->id, $object->fk_project, $object->fk_task_parent, $clone_change_dt, $clone_affectation, $clone_time, $clone_file, $clone_notes, $clone_prog);
$result = $projectstatic->fetch($object->fk_project);
$result = $projectstatic->fetch($object->fk_project);
$action = '';
$outputlangs = $langs;
$result = $object->generateDocument($object->model_pdf, $outputlangs);
$upload_dir = $conf->project->dir_output . "/" . \dol_sanitizeFileName($projectstatic->ref) . "/" . \dol_sanitizeFileName($object->ref);
$file = $upload_dir . '/' . \dol_sanitizeFileName(\GETPOST('file'));
$ret = \dol_delete_file($file, 1);
$result = $object->setStatusCommon($user, \Task::STATUS_DRAFT);
$result = $object->setStatusCommon($user, \Task::STATUS_VALIDATED);
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formfile = new \FormFile($db);
$formproject = new \FormProjets($db);
$title = (string) $object->ref;
$help_url = '';
$res = $object->fetch_optionals();
// To verify role of users
//$userAccess = $projectstatic->restrictedProjectArea($user); // We allow task affected to user even if a not allowed project
//$arrayofuseridoftask=$object->getListContactId('internal');
$head = \task_prepare_head($object);