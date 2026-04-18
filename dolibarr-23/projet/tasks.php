<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
// Load translation files required by the page
$langsLoad = array('projects', 'users', 'companies');
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
//$show_files = GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel');
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'projecttasklist';
$backtopage = \GETPOST('backtopage', 'alpha');
// if not set, a default page will be used
//$backtopageforcancel = GETPOST('backtopageforcancel', 'alpha');	// if not set, $backtopage will be used
$optioncss = \GETPOST('optioncss', 'aZ');
$backtopage = \GETPOST('backtopage', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$id = \GETPOSTINT('id');
$ref = \GETPOST('ref', 'alpha');
$taskref = \GETPOST('taskref', 'alpha');
// Load variable for pagination
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1 or if we click on clear filters
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$search_user_id = \GETPOSTINT('search_user_id');
$search_taskref = \GETPOST('search_taskref');
$search_tasklabel = \GETPOST('search_tasklabel');
$search_taskdescription = \GETPOST('search_taskdescription');
$search_dtstartday = \GETPOST('search_dtstartday');
$search_dtstartmonth = \GETPOST('search_dtstartmonth');
$search_dtstartyear = \GETPOST('search_dtstartyear');
$search_dtendday = \GETPOST('search_dtendday');
$search_dtendmonth = \GETPOST('search_dtendmonth');
$search_dtendyear = \GETPOST('search_dtendyear');
$search_planedworkload = \GETPOST('search_planedworkload');
$search_timespend = \GETPOST('search_timespend');
$search_progresscalc = \GETPOST('search_progresscalc');
$search_progressdeclare = \GETPOST('search_progressdeclare');
$search_task_budget_amount = \GETPOST('search_task_budget_amount');
$search_task_billable = \GETPOST('search_task_billable');
$search_status = \GETPOST('search_status');
$search_date_start_startmonth = \GETPOSTINT('search_date_start_startmonth');
$search_date_start_startyear = \GETPOSTINT('search_date_start_startyear');
$search_date_start_startday = \GETPOSTINT('search_date_start_startday');
$search_date_start_start = \dol_mktime(0, 0, 0, $search_date_start_startmonth, $search_date_start_startday, $search_date_start_startyear);
// Use tzserver
$search_date_start_endmonth = \GETPOSTINT('search_date_start_endmonth');
$search_date_start_endyear = \GETPOSTINT('search_date_start_endyear');
$search_date_start_endday = \GETPOSTINT('search_date_start_endday');
$search_date_start_end = \dol_mktime(23, 59, 59, $search_date_start_endmonth, $search_date_start_endday, $search_date_start_endyear);
// Use tzserver
$search_date_end_startmonth = \GETPOSTINT('search_date_end_startmonth');
$search_date_end_startyear = \GETPOSTINT('search_date_end_startyear');
$search_date_end_startday = \GETPOSTINT('search_date_end_startday');
$search_date_end_start = \dol_mktime(0, 0, 0, $search_date_end_startmonth, $search_date_end_startday, $search_date_end_startyear);
// Use tzserver
$search_date_end_endmonth = \GETPOSTINT('search_date_end_endmonth');
$search_date_end_endyear = \GETPOSTINT('search_date_end_endyear');
$search_date_end_endday = \GETPOSTINT('search_date_end_endday');
$search_date_end_end = \dol_mktime(23, 59, 59, $search_date_end_endmonth, $search_date_end_endday, $search_date_end_endyear);
// Use tzserver
$object = new \Project($db);
$taskstatic = new \Task($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($taskstatic->table_element, '', 'search_');
// Default sort order (if not yet defined by previous GETPOST)
/* if (!$sortfield) {
	reset($object->fields); $sortfield="t.".key($object->fields);
}   // Set here default search field. By default 1st field in definition. Reset is required to avoid key() to return null.
if (!$sortorder) {
	$sortorder = "ASC";
} */
// Security check
$socid = 0;
//if ($user->socid > 0) $socid = $user->socid;    // For external user, no check is done on company because readability is managed by public status of project and assignment.
$result = \restrictedArea($user, 'projet', $id, 'projet&project');
$diroutputmassaction = $conf->project->dir_output . '/tasks/temp/massgeneration/' . $user->id;
$progress = \GETPOSTINT('progress');
$budget_amount = \GETPOSTFLOAT('budget_amount');
$billable = \GETPOST('billable', 'aZ') == 'yes' ? 1 : 0;
$label = \GETPOST('label', 'alpha');
$description = \GETPOST('description', 'restricthtml');
$planned_workloadhour = \GETPOSTISSET('planned_workloadhour') ? \GETPOSTINT('planned_workloadhour') : '';
$planned_workloadmin = \GETPOSTISSET('planned_workloadmin') ? \GETPOSTINT('planned_workloadmin') : '';
// Definition of fields for list
$arrayfields = array('t.ref' => array('label' => "RefTask", 'checked' => '1', 'position' => 1), 't.label' => array('label' => "LabelTask", 'checked' => '1', 'position' => 2), 't.description' => array('label' => "Description", 'checked' => '0', 'position' => 3), 't.dateo' => array('label' => "DateStart", 'checked' => '1', 'position' => 4), 't.datee' => array('label' => "Deadline", 'checked' => '1', 'position' => 5), 't.planned_workload' => array('label' => "PlannedWorkload", 'checked' => '1', 'position' => 6), 't.duration_effective' => array('label' => "TimeSpent", 'checked' => '1', 'position' => 7), 't.progress_calculated' => array('label' => "ProgressCalculated", 'checked' => '-1', 'position' => 8), 't.progress' => array('label' => "ProgressDeclared", 'checked' => '1', 'position' => 9), 't.progress_summary' => array('label' => "TaskProgressSummary", 'checked' => '1', 'position' => 10), 't.fk_statut' => array('label' => "Status", 'checked' => '1', 'position' => 11), 't.budget_amount' => array('label' => "Budget", 'checked' => '0', 'position' => 12), 'c.assigned' => array('label' => "TaskRessourceLinks", 'checked' => '1', 'position' => 13));
// Extra fields
$extrafieldsobjectkey = $taskstatic->table_element;
$extrafieldsobjectprefix = 'efpt.';
$arrayfields = \dol_sort_array($arrayfields, 'position');
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
/*
 * Actions
 */
$error = 0;
$action = 'list';
$massaction = '';
$parameters = array('id' => $id);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Task';
$objectlabel = 'Tasks';
$permissiontoread = $user->hasRight('projet', 'lire');
$permissiontodelete = $user->hasRight('projet', 'supprimer');
$uploaddir = $conf->project->dir_output . '/tasks';
$morewherefilterarray = array();
$moresql = \dolSqlDateFilter('t.dateo', $search_dtstartday, $search_dtstartmonth, $search_dtstartyear, 1);
$moresql = \dolSqlDateFilter('t.datee', $search_dtendday, $search_dtendmonth, $search_dtendyear, 1);
//var_dump($morewherefilterarray);
$morewherefilter = '';
// If we use user timezone, we must change also view/list to use user timezone everywhere
$date_start = \dol_mktime(\GETPOSTINT('date_starthour'), \GETPOSTINT('date_startmin'), 0, \GETPOSTINT('date_startmonth'), \GETPOSTINT('date_startday'), \GETPOSTINT('date_startyear'));
$date_end = \dol_mktime(\GETPOSTINT('date_endhour'), \GETPOSTINT('date_endmin'), 0, \GETPOSTINT('date_endmonth'), \GETPOSTINT('date_endday'), \GETPOSTINT('date_endyear'));
/*
 * View
 */
$now = \dol_now();
$form = new \Form($db);
$formother = new \FormOther($db);
$socstatic = new \Societe($db);
$projectstatic = new \Project($db);
$taskstatic = new \Task($db);
$userstatic = new \User($db);
$title = $langs->trans("Tasks") . ' - ' . $object->ref . ' ' . $object->name;
$help_url = "EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos";
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
$userWrite = 0;
$result = $object->fetch($id, $ref);
$result = $object->fetch_thirdparty();
$result = $object->fetch_optionals();
// To verify role of users
//$userAccess = $object->restrictedProjectArea($user,'read');
$userWrite = $object->restrictedProjectArea($user, 'write');
//$userDelete = $object->restrictedProjectArea($user,'delete');
//print "userAccess=".$userAccess." userWrite=".$userWrite." userDelete=".$userDelete;
$tab = \GETPOSTISSET('tab') ? \GETPOST('tab') : 'tasks';
$head = \project_prepare_head($object);
$param = '&id=' . $object->id;
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$morehtmlref = '<div class="refidno">';
$start = \dol_print_date($object->date_start, 'day');
$end = \dol_print_date($object->date_end, 'day');
// Other attributes
$cols = 2;
$projectoktoentertime = 1;
$defaultref = '';
$classnamemodtask = \getDolGlobalString('PROJECT_TASK_ADDON', 'mod_task_simple');
$contactsofproject = empty($object->id) ? '' : $object->getListContactId('internal');
$nbrows = 0;
$doleditor = new \DolEditor('description', $object->description, '', 80, 'dolibarr_details', '', \false, \true, \getDolGlobalInt('FCKEDITOR_ENABLE_SOCIETE'), $nbrows, '90%');
// Other options
$parameters = array('arrayfields' => &$arrayfields);
$reshook = $hookmanager->executeHooks('formObjectOptions', $parameters, $taskstatic, $action);