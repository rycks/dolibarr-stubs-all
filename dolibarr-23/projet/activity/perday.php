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
//if ($user->socid > 0) $socid=$user->socid;
$result = \restrictedArea($user, 'projet', $projectid);
$now = \dol_now();
$year = \GETPOSTINT('reyear') ? \GETPOSTINT('reyear') : (\GETPOSTINT("year") ? \GETPOSTINT("year") : (\GETPOSTINT("addtimeyear") ? \GETPOSTINT("addtimeyear") : \date("Y")));
$month = \GETPOSTINT('remonth') ? \GETPOSTINT('remonth') : (\GETPOSTINT("month") ? \GETPOSTINT("month") : (\GETPOSTINT("addtimemonth") ? \GETPOSTINT("addtimemonth") : \date("m")));
$day = \GETPOSTINT('reday') ? \GETPOSTINT('reday') : (\GETPOSTINT("day") ? \GETPOSTINT("day") : (\GETPOSTINT("addtimeday") ? \GETPOSTINT("addtimeday") : \date("d")));
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
$monthofday = \GETPOSTINT('addtimemonth');
$dayofday = \GETPOSTINT('addtimeday');
$yearofday = \GETPOSTINT('addtimeyear');
//var_dump(GETPOST('remonth'));
//var_dump(GETPOST('button_search_x'));
//var_dump(GETPOST('button_addtime'));
$daytoparse = $now;
$daytoparsegmt = \dol_now('gmt');
$object = new \Task($db);
$project = new \Project($db);
// Extra fields
$extrafields = new \ExtraFields($db);
// Definition of fields for list
$arrayfields = array();
/*$arrayfields=array(
 // Project
 'p.opp_amount'=>array('label'=>$langs->trans("OpportunityAmountShort"), 'checked'=>0, 'enabled'=>($conf->global->PROJECT_USE_OPPORTUNITIES?1:0), 'position'=>103),
 'p.fk_opp_status'=>array('label'=>$langs->trans("OpportunityStatusShort"), 'checked'=>0, 'enabled'=>($conf->global->PROJECT_USE_OPPORTUNITIES?1:0), 'position'=>104),
 'p.opp_percent'=>array('label'=>$langs->trans("OpportunityProbabilityShort"), 'checked'=>0, 'enabled'=>($conf->global->PROJECT_USE_OPPORTUNITIES?1:0), 'position'=>105),
 'p.budget_amount'=>array('label'=>$langs->trans("Budget"), 'checked'=>0, 'position'=>110),
 'p.usage_bill_time'=>array('label'=>$langs->trans("BillTimeShort"), 'checked'=>0, 'position'=>115),
 );
 */
// Extra fields
$extrafieldsobjectkey = $object->table_element;
$extrafieldsobjectprefix = 'efpt.';
$arrayfields = \dol_sort_array($arrayfields, 'position');
$search_array_options_project = $extrafields->getOptionalsFromPost($project->table_element, '', 'search_');
$search_array_options_task = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_task_');
/*
 * Actions
 */
$error = 0;
$parameters = array('id' => $id, 'taskid' => $taskid, 'projectid' => $projectid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$action = '';
$action = 'assigntask';
$action = '';
$timespent_duration = array();
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
$prev = \dol_getdate($daytoparse - 24 * 3600);
$prev_year = $prev['year'];
$prev_month = $prev['mon'];
$prev_day = $prev['mday'];
$next = \dol_getdate($daytoparse + 24 * 3600);
$next_year = $next['year'];
$next_month = $next['mon'];
$next_day = $next['mday'];
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
$tasksarray = $taskstatic->getTasksArray(\null, \null, $project->id ? $project->id : 0, $socid, 0, $search_project_ref, (string) $onlyopenedproject, $morewherefilter, $search_usertoprocessid ? $search_usertoprocessid : 0, 0, $extrafields);
// We want to see all task of opened project i am allowed to see and that match filter, not only my tasks. Later only mine will be editable later.
$tasksarraywithoutfilter = array();
$projectsrole = $taskstatic->getUserRolesForProjectsOrTasks($usertoprocess, \null, $project->id ? (string) $project->id : '0', 0, $onlyopenedproject);
$tasksrole = $taskstatic->getUserRolesForProjectsOrTasks(\null, $usertoprocess, $project->id ? (string) $project->id : '0', 0, $onlyopenedproject);
//print_barre_liste($title, $page, $_SERVER["PHP_SELF"], "", $sortfield, $sortorder, "", $num, '', 'project');
$param = '';
/*
$search_array_options = $search_array_options_project;
$search_options_pattern='search_options_';
include DOL_DOCUMENT_ROOT.'/core/tpl/extrafields_list_search_param.tpl.php';
*/
$search_array_options = $search_array_options_task;
$search_options_pattern = 'search_task_options_';
// Show navigation bar
$nav = '<a class="inline-block valignmiddle" href="?year=' . $prev_year . "&month=" . $prev_month . "&day=" . $prev_day . $param . '">' . \img_previous($langs->trans("Previous")) . "</a>\n";
$picto = 'clock';
$tmp = \dol_getdate($daytoparse);
$head = \project_timesheet_prepare_head($mode, $usertoprocess);
// Show description of content
$s = '';
$titleassigntask = $langs->transnoentities("AssignTaskToMe");
$moreforfilter = '';
// Filter on categories
/*if (isModEnabled("categorie")) {
	require_once DOL_DOCUMENT_ROOT . '/categories/class/categorie.class.php';
	$moreforfilter.='<div class="divsearchfield">';
	$moreforfilter.=$langs->trans('ProjectCategories'). ': ';
	$moreforfilter.=$formother->select_categories('project', $search_categ, 'search_categ', 1, 1, 'maxwidth300');
	$moreforfilter.='</div>';
}*/
// If the user can view user other than himself
$includeonly = 'hierarchyme';
$selecteduser = $search_usertoprocessid ? $search_usertoprocessid : $usertoprocess->id;
$moreforfiltertmp = $form->select_dolusers($selecteduser, 'search_usertoprocessid', 0, \null, 0, $includeonly, '', '0', 0, 0, '', 0, '', 'maxwidth200');
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
// By default, we can edit only tasks we are assigned to
$restrictviewformytask = \getDolGlobalInt('PROJECT_TIME_SHOW_TASK_NOT_ASSIGNED', 2);
$numendworkingday = 0;
$numstartworkingday = 0;
// Get if user is available or not for each day
$isavailable = array();
// Assume from Monday to Friday if conf empty or badly formed
$numstartworkingday = 1;
$numendworkingday = 5;
$tmparray = \explode('-', \getDolGlobalString('MAIN_DEFAULT_WORKING_DAYS'));
$statusofholidaytocheck = \Holiday::STATUS_APPROVED;
$isavailablefordayanduser = $holiday->verifDateHolidayForTimestamp($usertoprocess->id, $daytoparse, (string) $statusofholidaytocheck);
// in projectLinesPerWeek later, we are using $firstdaytoshow and dol_time_plus_duree to loop on each day
$test = \num_public_holiday($daytoparsegmt, $daytoparsegmt + 86400, $mysoc->country_code);
$tmparray = \dol_getdate($daytoparse, \true);
// detail of current day
// For monday, must be 0 for monday if MAIN_START_WEEK = 1, must be 1 for monday if MAIN_START_WEEK = 0
$idw = $tmparray['wday'] - (!\getDolGlobalString('MAIN_START_WEEK') ? 0 : 1);
// numstartworkingday and numendworkingday are default start and end date of working days (1 means sunday if MAIN_START_WEEK is 0, 1 means monday if MAIN_START_WEEK is 1)
$cssweekend = '';
$tmpday = \dol_time_plus_duree($daytoparse, $idw, 'd');
$cssonholiday = '';
$colspan = 2 + (!\getDolGlobalString('PROJECT_TIMESHEET_DISABLEBREAK_ON_PROJECT') ? 0 : 2);
//var_dump($tasksarray);				// contains only selected tasks
//var_dump($tasksarraywithoutfilter);	// contains all tasks (if there is a filter, not defined if no filter)
//var_dump($tasksrole);
$j = 0;
$level = 0;
$totalforvisibletasks = \projectLinesPerDay($j, 0, $usertoprocess, $tasksarray, $level, $projectsrole, $tasksrole, $mine, $restrictviewformytask, $daytoparse, $isavailable, 0, $arrayfields, $extrafields);
//var_dump($totalforvisibletasks);
// Show total for all other tasks
// Calculate total for all tasks
$listofdistinctprojectid = array();
//var_dump($listofdistinctprojectid);
$totalforeachday = array();
//var_dump($totalforeachday);
// Is there a diff between selected/filtered tasks and all tasks ?
$isdiff = 0;