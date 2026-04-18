<?php

$action = \GETPOST('action', 'aZ09');
$confirm = \GETPOST('confirm', 'alpha');
$id = \GETPOSTINT('id');
// Id of task
$ref = \GETPOST('ref', 'alpha');
// Ref of task
$withproject = \GETPOSTINT('withproject');
$project_ref = \GETPOST('project_ref', 'alpha');
$object = new \Task($db);
$projectstatic = new \Project($db);
// Security check
$socid = 0;
/*
 * Actions
 */
$parameters = array('projectid' => $object->fk_project);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$form = new \Form($db);
$formcompany = new \FormCompany($db);
$contactstatic = new \Contact($db);
$userstatic = new \User($db);
$result = $projectstatic->fetch($object->fk_project);
$title = $object->ref . ' - ' . $langs->trans("Contacts");
$help_url = '';