<?php

$hookmanager = new \HookManager($db);
$action = \GETPOST('action', 'aZ09');
$search_project_user = \GETPOST('search_project_user');
$mine = \GETPOST('mode', 'aZ09') == 'mine' || $search_project_user == $user->id ? 1 : 0;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$max = \getDolGlobalInt('MAIN_SIZE_SHORTLIST_LIMIT', 5);
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
$companystatic = new \Societe($db);
$projectstatic = new \Project($db);
$form = new \Form($db);
$formfile = new \FormFile($db);
$projectset = $mine ? $mine : (!$user->hasRight('projet', 'all', 'lire') ? 0 : 2);
$projectsListId = $projectstatic->getProjectsAuthorizedForUser($user, $projectset, 1);
//var_dump($projectsListId);
$title = $langs->trans('ProjectsArea');
$help_url = 'EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos|DE:Modul_Projekte';
//if ($mine) $title=$langs->trans("MyProjectsArea");
// Title for combo list see all projects
$titleall = $langs->trans("AllAllowedProjects");
$morehtml = '<form name="projectform" method="POST" action="' . \dolBuildUrl($_SERVER["PHP_SELF"]) . '">';
$listofoppstatus = array();
$listofopplabel = array();
$listofoppcode = array();
$colorseries = array();
$sql = "SELECT cls.rowid, cls.code, cls.percent, cls.label";
$resql = $db->query($sql);
// Latest modified projects
$sql = "SELECT p.rowid, p.ref, p.title, p.dateo as date_start, p.datee as date_end, p.fk_statut as status, p.tms as datem";
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$companystatic = new \Societe($db);
// List of open projects per thirdparty
$sql = "SELECT COUNT(p.rowid) as nb, SUM(p.opp_amount)";
//$sql .= $db->plimit($max + 1, 0);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
$i = 0;
$othernb = 0;
$parameters = array('user' => $user);
$reshook = $hookmanager->executeHooks('dashboardProjects', $parameters, $projectstatic);