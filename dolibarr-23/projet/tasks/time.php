<?php

// Load translation files required by the page
$langsLoad = array('projects', 'bills', 'orders', 'companies');
$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
// The bulk action (combo box choice into lists)
$confirm = \GETPOST('confirm', 'alpha');
$cancel = \GETPOST('cancel', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
// Array of ids of elements selected into a list
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'timespentlist';
// To manage different context of search
$backtopage = \GETPOST('backtopage', 'alpha');
// Go back to a dedicated page
$optioncss = \GETPOST('optioncss', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$id = \GETPOSTINT('id');
// Id of task
$ref = \GETPOST('ref', 'alpha');
// Ref of task
$projectid = \GETPOSTINT('projectid');
// Id of project
$lineid = \GETPOSTINT('lineid');
// Id of time spent line
$withproject = \GETPOSTINT('withproject');
$project_ref = \GETPOST('project_ref', 'alpha');
$tab = \GETPOST('tab', 'aZ09');
$search_day = \GETPOSTINT('search_day');
$search_month = \GETPOSTINT('search_month');
$search_year = \GETPOSTINT('search_year');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_note = \GETPOST('search_note', 'alpha');
$search_duration = \GETPOST('search_duration', 'alpha');
$search_task_ref = \GETPOST('search_task_ref', 'alpha');
$search_task_label = \GETPOST('search_task_label', 'alpha');
$search_user = \GETPOST('search_user', 'intcomma');
$search_valuebilled = \GETPOST('search_valuebilled', 'intcomma');
$search_product_ref = \GETPOST('search_product_ref', 'alpha');
$search_company = \GETPOST('$search_company', 'alpha');
$search_company_alias = \GETPOST('$search_company_alias', 'alpha');
$search_project_ref = \GETPOST('$search_project_ref', 'alpha');
$search_project_label = \GETPOST('$search_project_label', 'alpha');
$search_timespent_starthour = \GETPOSTINT("search_timespent_duration_starthour");
$search_timespent_startmin = \GETPOSTINT("search_timespent_duration_startmin");
$search_timespent_endhour = \GETPOSTINT("search_timespent_duration_endhour");
$search_timespent_endmin = \GETPOSTINT("search_timespent_duration_endmin");
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
// If $page is not defined, or '' or -1
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
$childids = $user->getAllChildIds(1);
$object = new \Task($db);
$extrafields = new \ExtraFields($db);
$projectstatic = new \Project($db);
// Security check
$socid = 0;
/*
 * Actions
 */
$error = 0;
$parameters = array('socid' => $socid, 'projectid' => $projectid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
$timespent_durationhour = \GETPOSTINT('timespent_durationhour');
$timespent_durationmin = \GETPOSTINT('timespent_durationmin');
//If timespent date is not provided in POST (for eg, because in list the column date is hidden) we keep the actual date
$timespent_date = \dol_mktime(12, 0, 0, \GETPOSTINT("timelinemonth"), \GETPOSTINT("timelineday"), \GETPOSTINT("timelineyear"));
// To show all time lines for project
$projectidforalltimes = 0;
$projectidforalltimes = \GETPOSTINT('projectid');
$result = $projectstatic->fetch($projectidforalltimes);
$res = $projectstatic->fetch_optionals();
// If not task selected and no project selected
$allprojectforuser = 0;
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$formproject = new \FormProjets($db);
$userstatic = new \User($db);
//$result = $projectstatic->fetch($object->fk_project);
$arrayofselected = \is_array($toselect) ? $toselect : array();
$title = $object->ref . ' - ' . $langs->trans("TimeSpent");
$help_url = '';
$param = !empty($mode) && $mode == 'mine' ? '&mode=mine' : '';
$userRead = $projectstatic->restrictedProjectArea($user, 'read');
$linktocreatetime = '';
$massactionbutton = '';
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$formconfirm = '';
// Call Hook formConfirm
$parameters = array('formConfirm' => $formconfirm, "projectstatic" => $projectstatic, "withproject" => $withproject);
$reshook = $hookmanager->executeHooks('formConfirm', $parameters, $object, $action);