<?php

$action = \GETPOST('action', 'aZ09');
$search_project_user = \GETPOST('search_project_user');
$mine = \GETPOST('mode', 'aZ09') == 'mine' || $search_project_user == $user->id ? 1 : 0;
// Security check
$socid = 0;
/*
 * Actions
 */
$parameters = array();
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
/*
 * View
 */
$now = \dol_now();
$tmp = \dol_getdate($now);
$day = $tmp['mday'];
$month = $tmp['mon'];
$year = $tmp['year'];
$form = new \Form($db);
$projectstatic = new \Project($db);
$projectsListId = $projectstatic->getProjectsAuthorizedForUser($user, 0, 1);
// Return all projects I have permission on because I want my tasks and some of my task may be on a public projet that is not my project
$taskstatic = new \Task($db);
$tasktmp = new \Task($db);
$title = $langs->trans("Activities");
// Title for combo list see all projects
$titleall = $langs->trans("AllAllowedProjects");
$morehtml = '';
$sql = "SELECT p.rowid, p.ref, p.title, p.public, SUM(tt.element_duration) as nb";
$resql = $db->query($sql);
$total = 0;
$sql = "SELECT p.rowid, p.ref, p.title, p.public, SUM(tt.element_duration) as nb";
$resql = $db->query($sql);
$total = 0;
$sql = "SELECT p.rowid, p.ref, p.title, p.public, SUM(tt.element_duration) as nb";
$resql = $db->query($sql);
$total = 0;
$sql = "SELECT p.rowid, p.ref, p.title, p.public, SUM(tt.element_duration) as nb";
$resql = $db->query($sql);
$total = 0;
// Get id of types of contacts for projects (This list never contains a lot of elements)
$listofprojectcontacttype = array();
$sql = "SELECT ctc.rowid, ctc.code FROM " . \MAIN_DB_PREFIX . "c_type_contact as ctc";
$resql = $db->query($sql);
// Get id of types of contacts for tasks (This list never contains a lot of elements)
$listoftaskcontacttype = array();
$sql = "SELECT ctc.rowid, ctc.code FROM " . \MAIN_DB_PREFIX . "c_type_contact as ctc";
$resql = $db->query($sql);
// Tasks for all resources of all opened projects and time spent for each task/resource
// This list can be very long, so we don't show it by default on task area. We prefer to use the list page.
// Add constant PROJECT_SHOW_TASK_LIST_ON_PROJECT_AREA to show this list
$max = \getDolGlobalInt('PROJECT_LIMIT_TASK_PROJECT_AREA', 1000);
$sql = "SELECT p.ref, p.title, p.rowid as projectid, p.fk_statut as status, p.fk_opp_status as opp_status, p.public, p.dateo as projdate_start, p.datee as projdate_end,";
$resql = $db->query($sql);
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardActivities', $parameters, $object);