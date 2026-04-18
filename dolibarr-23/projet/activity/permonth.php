<?php

$action = \GETPOST('action', 'aZ09');
$mode = \GETPOST("mode", 'alpha');
$id = \GETPOSTINT('id');
$taskid = \GETPOSTINT('taskid');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'timespent';
$mine = 0;
$projectid = \GETPOSTISSET("id") ? \GETPOSTINT("id", 1) : \GETPOSTINT("projectid");
// Security check
$socid = 0;
// For external user, no check is done on company because readability is managed by public status of project and assignment.
// if ($user->socid > 0) $socid=$user->socid;
$result = \restrictedArea($user, 'projet', $projectid);
$now = \dol_now();
$year = \GETPOSTINT('reyear') ? \GETPOSTINT('reyear') : (\GETPOSTINT("year") ? \GETPOSTINT("year") : \date("Y"));
$month = \GETPOSTINT('remonth') ? \GETPOSTINT('remonth') : (\GETPOSTINT("month") ? \GETPOSTINT("month") : \date("m"));
$day = \GETPOSTINT('reday') ? \GETPOSTINT('reday') : (\GETPOSTINT("day") ? \GETPOSTINT("day") : \date("d"));
$week = \GETPOSTINT("week") ? \GETPOSTINT("week") : \date("W");
$day = (int) $day;
//$search_categ = GETPOST("search_categ", 'alpha');
$search_usertoprocessid = \GETPOSTINT('search_usertoprocessid');
$search_task_ref = \GETPOST('search_task_ref', 'alpha');
$search_task_label = \GETPOST('search_task_label', 'alpha');
$search_project_ref = \GETPOST('search_project_ref', 'alpha');
$search_thirdparty = \GETPOST('search_thirdparty', 'alpha');
$search_declared_progress = \GETPOST('search_declared_progress', 'alpha');
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$startdayarray = \dol_get_prev_month($month, $year);
$prev = $startdayarray;
$prev_year = $prev['year'];
$prev_month = $prev['month'];
$prev_day = 1;
$next = \dol_get_next_month($month, $year);
$next_year = $next['year'];
$next_month = $next['month'];
$next_day = 1;
$TWeek = \getWeekNumbersOfMonth($month, $year);
$firstdaytoshow = \dol_mktime(0, 0, 0, $month, 1, $year);
$TFirstDays = \getFirstDayOfEachWeek($TWeek, $year);
//first day of month
$TLastDays = \getLastDayOfEachWeek($TWeek, $year);
$object = new \Task($db);
// Extra fields
$extrafields = new \ExtraFields($db);
// Definition of fields for list
$arrayfields = array();
/*foreach($object->fields as $key => $val)
 {
 // If $val['visible']==0, then we never show the field
 if (!empty($val['visible'])) $arrayfields['t.'.$key]=array('label'=>$val['label'], 'checked'=>(($val['visible']<0)?0:1), 'enabled'=>$val['enabled'], 'position'=>$val['position']);
 }*/
// Extra fields
$extrafieldsobjectkey = 'projet_task';
$extrafieldsobjectprefix = 'efpt.';
$arrayfields = \dol_sort_array($arrayfields, 'position');
$search_array_options = array();
$search_array_options_project = $extrafields->getOptionalsFromPost('projet', '', 'search_');
$search_array_options_task = $extrafields->getOptionalsFromPost('projet_task', '', 'search_task_');
$error = 0;
/*
 * Actions
 */
$parameters = array('id' => $id, 'taskid' => $taskid, 'projectid' => $projectid, 'TWeek' => $TWeek, 'TFirstDays' => $TFirstDays, 'TLastDays' => $TLastDays);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$action = '';
$action = 'assigntask';
$action = '';
$timetoadd = \GETPOST('task');
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formcompany = new \FormCompany($db);
$formproject = new \FormProjets($db);
$projectstatic = new \Project($db);
$project = new \Project($db);
$taskstatic = new \Task($db);
$thirdpartystatic = new \Societe($db);
$holiday = new \Holiday($db);
$title = $langs->trans("TimeSpent");
$projectsListId = $projectstatic->getProjectsAuthorizedForUser($usertoprocess, empty($usertoprocess->id) ? 2 : 0, 1);
$onlyopenedproject = 1;
// or -1
$morewherefilter = '';
/*$search_array_options = $search_array_options_project;
 $extrafieldsobjectprefix='efp.';
 $search_options_pattern='search_options_';
 $extrafieldsobjectkey='projet';
 include DOL_DOCUMENT_ROOT.'/core/tpl/extrafields_list_search_sql.tpl.php';
 */
$search_array_options = $search_array_options_task;
$extrafieldsobjectprefix = 'efpt.';
$search_options_pattern = 'search_task_options_';
$extrafieldsobjectkey = 'projet_task';
$tasksarraywithoutfilter = array();
// Default
$tasksarray = $taskstatic->getTasksArray(\null, \null, $project->id ? $project->id : 0, $socid, 0, $search_project_ref, (string) $onlyopenedproject, $morewherefilter, $search_usertoprocessid ? $search_usertoprocessid : 0, 0, $extrafields);
$projectsrole = $taskstatic->getUserRolesForProjectsOrTasks($usertoprocess, \null, $project->id ? (string) $project->id : '0', 0, $onlyopenedproject);
$tasksrole = $taskstatic->getUserRolesForProjectsOrTasks(\null, $usertoprocess, $project->id ? (string) $project->id : '0', 0, $onlyopenedproject);
//print_barre_liste($title, $page, $_SERVER["PHP_SELF"], "", $sortfield, $sortorder, "", $num, '', 'project');
$param = '';
$search_array_options = $search_array_options_project;
$search_options_pattern = 'search_options_';
$search_array_options = $search_array_options_task;
$search_options_pattern = 'search_task_options_';
// Show navigation bar
$nav = '<a class="inline-block valignmiddle" href="?year=' . $prev_year . "&month=" . $prev_month . "&day=" . $prev_day . $param . '">' . \img_previous($langs->trans("Previous")) . "</a>\n";
$picto = 'clock';
$head = \project_timesheet_prepare_head($mode, $usertoprocess);
// Show description of content
$s = '';
$titleassigntask = $langs->transnoentities("AssignTaskToMe");
$moreforfilter = '';
// Filter on categories
/*
if (isModEnabled("categorie")) {
	require_once DOL_DOCUMENT_ROOT . '/categories/class/categorie.class.php';
	$moreforfilter.='<div class="divsearchfield">';
	$moreforfilter.=$langs->trans('ProjectCategories'). ': ';
	$moreforfilter.=$formother->select_categories('project', $search_categ, 'search_categ', 1, 1, 'maxwidth300');
	$moreforfilter.='</div>';
}*/
// If the user can view user other than himself
$includeonly = 'hierarchyme';
$selecteduser = $search_usertoprocessid ? $search_usertoprocessid : $usertoprocess->id;
$moreforfiltertmp = $form->select_dolusers($selecteduser, 'search_usertoprocessid', 0, \null, 0, $includeonly, array(), '0', 0, 0, '', 0, '', 'maxwidth200');
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage);
// This also change content of $arrayfields
// This must be after the $selectedfields
$addcolspan = 0;
// TASK fields
$search_options_pattern = 'search_task_options_';
$extrafieldsobjectkey = 'projet_task';
$extrafieldsobjectprefix = 'efpt.';
$searchpicto = $form->showFilterAndCheckAddButtons(0);
// TASK fields
$extrafieldsobjectkey = 'projet_task';
$extrafieldsobjectprefix = 'efpt.';
$colspan = 1;
// Get if user is available or not for each day
$isavailable = array();
// TODO See code into perweek.php to initialize isavailable array
// By default, we can edit only tasks we are assigned to
$restrictviewformytask = \getDolGlobalInt('PROJECT_TIME_SHOW_TASK_NOT_ASSIGNED', 2);
//var_dump($tasksarray);				// contains only selected tasks
//var_dump($tasksarraywithoutfilter);	// contains all tasks (if there is a filter, not defined if no filter)
//var_dump($tasksrole);
$j = 0;
$level = 0;
$totalforvisibletasks = \projectLinesPerMonth($j, $firstdaytoshow, $usertoprocess, 0, $tasksarray, $level, $projectsrole, $tasksrole, $mine, $restrictviewformytask, $isavailable, 0, $TWeek, $arrayfields);
//var_dump($totalforvisibletasks);
// Show total for all other tasks
// Calculate total for all tasks
$listofdistinctprojectid = array();
//var_dump($listofdistinctprojectid);
$totalforeachweek = array();
//var_dump($totalforeachday);
//var_dump($totalforvisibletasks);
// Is there a diff between selected/filtered tasks and all tasks ?
$isdiff = 0;
$THolidays = array();
$totaldayholiday = 0;
$j = 0;
$modeinput = 'hours';