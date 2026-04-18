<?php

$action = \GETPOST('action', 'aZ09');
$massaction = \GETPOST('massaction', 'alpha');
//$show_files = GETPOSTINT('show_files');
$confirm = \GETPOST('confirm', 'alpha');
$toselect = \GETPOST('toselect', 'array:int');
$optioncss = \GETPOST('optioncss', 'aZ09');
$mode = \GETPOST('mode', 'aZ');
$id = \GETPOSTINT('id');
$search_all = \trim(\GETPOST('search_all', 'alphanohtml'));
$search_categ = \GETPOST("search_categ", 'intcomma');
$search_projectstatus = \GETPOST('search_projectstatus', 'intcomma');
$search_project_ref = \GETPOST('search_project_ref');
$search_project_title = \GETPOST('search_project_title');
$search_task_ref = \GETPOST('search_task_ref');
$search_task_label = \GETPOST('search_task_label');
$search_task_description = \GETPOST('search_task_description');
$search_task_ref_parent = \GETPOST('search_task_ref_parent');
$search_project_user = \GETPOST('search_project_user', 'intcomma');
$search_task_user = \GETPOST('search_task_user', 'intcomma');
$search_task_progress = \GETPOST('search_task_progress');
$search_task_budget_amount = \GETPOST('search_task_budget_amount');
$search_task_status = \GETPOSTISSET('search_task_status') ? \GETPOSTINT('search_task_status') : -1;
$search_societe = \GETPOST('search_societe');
$search_societe_alias = \GETPOST('search_societe_alias');
$search_opp_status = \GETPOST("search_opp_status", 'alpha');
$searchCategoryCustomerOperator = 0;
$searchCategoryCustomerList = \GETPOST('search_category_customer_list', 'array:int');
$mine = \GETPOST('mode', 'alpha') == 'mine' ? 1 : 0;
$type = \GETPOST('type');
$search_date_startday = \GETPOSTINT('search_date_startday');
$search_date_startmonth = \GETPOSTINT('search_date_startmonth');
$search_date_startyear = \GETPOSTINT('search_date_startyear');
$search_date_endday = \GETPOSTINT('search_date_endday');
$search_date_endmonth = \GETPOSTINT('search_date_endmonth');
$search_date_endyear = \GETPOSTINT('search_date_endyear');
$search_date_start = \dol_mktime(0, 0, 0, $search_date_startmonth, $search_date_startday, $search_date_startyear);
// Use tzserver
$search_date_end = \dol_mktime(23, 59, 59, $search_date_endmonth, $search_date_endday, $search_date_endyear);
$search_datelimit_startday = \GETPOSTINT('search_datelimit_startday');
$search_datelimit_startmonth = \GETPOSTINT('search_datelimit_startmonth');
$search_datelimit_startyear = \GETPOSTINT('search_datelimit_startyear');
$search_datelimit_endday = \GETPOSTINT('search_datelimit_endday');
$search_datelimit_endmonth = \GETPOSTINT('search_datelimit_endmonth');
$search_datelimit_endyear = \GETPOSTINT('search_datelimit_endyear');
$search_datelimit_start = \dol_mktime(0, 0, 0, $search_datelimit_startmonth, $search_datelimit_startday, $search_datelimit_startyear);
$search_datelimit_end = \dol_mktime(23, 59, 59, $search_datelimit_endmonth, $search_datelimit_endday, $search_datelimit_endyear);
// Initialize context for list
$contextpage = \GETPOST('contextpage', 'aZ') ? \GETPOST('contextpage', 'aZ') : 'tasklist';
// Initialize a technical object to manage hooks of page. Note that conf->hooks_modules contains an array of hook context
$object = new \Task($db);
$extrafields = new \ExtraFields($db);
$search_array_options = $extrafields->getOptionalsFromPost($object->table_element, '', 'search_');
// Security check
$socid = 0;
$diroutputmassaction = $conf->project->dir_output . '/tasks/temp/massgeneration/' . $user->id;
$limit = \GETPOSTINT('limit') ? \GETPOSTINT('limit') : $conf->liste_limit;
$sortfield = \GETPOST('sortfield', 'aZ09comma');
$sortorder = \GETPOST('sortorder', 'aZ09comma');
$page = \GETPOSTISSET('pageplusone') ? \GETPOSTINT('pageplusone') - 1 : \GETPOSTINT("page");
$offset = $limit * $page;
$pageprev = $page - 1;
$pagenext = $page + 1;
// List of fields to search into when doing a "search in all"
$fieldstosearchall = array('t.ref' => "Ref", 't.label' => "Label", 't.description' => "Description", 't.note_public' => "NotePublic");
$arrayfields = array('t.ref' => array('label' => "RefTask", 'checked' => '1', 'position' => 50), 't.fk_task_parent' => array('label' => "RefTaskParent", 'checked' => '0', 'position' => 70), 't.label' => array('label' => "LabelTask", 'checked' => '1', 'position' => 75), 't.description' => array('label' => "Description", 'checked' => '0', 'position' => 80), 't.dateo' => array('label' => "DateStart", 'checked' => '1', 'position' => 100), 't.datee' => array('label' => "Deadline", 'checked' => '1', 'position' => 101), 'p.ref' => array('label' => "ProjectRef", 'checked' => '1', 'position' => 151), 'p.title' => array('label' => "ProjectLabel", 'checked' => '0', 'position' => 152), 's.nom' => array('label' => "ThirdParty", 'checked' => '-1', 'csslist' => 'tdoverflowmax125', 'position' => 200), 's.name_alias' => array('label' => "AliasNameShort", 'checked' => '0', 'csslist' => 'tdoverflowmax125', 'position' => 201), 'p.fk_statut' => array('label' => "ProjectStatus", 'checked' => '1', 'position' => 205), 't.planned_workload' => array('label' => "PlannedWorkload", 'checked' => '1', 'position' => 302), 't.duration_effective' => array('label' => "TimeSpent", 'checked' => '1', 'position' => 303), 't.progress_calculated' => array('label' => "ProgressCalculated", 'checked' => '-1', 'position' => 304), 't.progress' => array('label' => "ProgressDeclared", 'checked' => '1', 'position' => 305), 't.progress_summary' => array('label' => "TaskProgressSummary", 'checked' => '1', 'position' => 306), 't.budget_amount' => array('label' => "Budget", 'checked' => '0', 'position' => 307), 't.fk_statut' => array('label' => "TaskStatus", 'checked' => '0', 'position' => 308), 't.tobill' => array('label' => "TimeToBill", 'checked' => '0', 'position' => 310), 't.billed' => array('label' => "TimeBilled", 'checked' => '0', 'position' => 311), 't.datec' => array('label' => "DateCreation", 'checked' => '0', 'position' => 500), 't.tms' => array('label' => "DateModificationShort", 'checked' => '0', 'position' => 501));
$arrayfields = \dol_sort_array($arrayfields, 'position');
$permissiontoread = $user->hasRight('projet', 'lire');
$permissiontocreate = $user->hasRight('projet', 'creer');
$permissiontodelete = $user->hasRight('projet', 'supprimer');
$parameters = array('socid' => $socid);
$reshook = $hookmanager->executeHooks('doActions', $parameters, $object, $action);
// Mass actions
$objectclass = 'Task';
$objectlabel = 'Tasks';
$uploaddir = $conf->project->dir_output . '/tasks';
// already done at line 85
// if (empty($search_projectstatus) && $search_projectstatus == '') {
// 	$search_projectstatus = 1;
// }
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$socstatic = new \Societe($db);
$projectstatic = new \Project($db);
$puser = new \User($db);
$tuser = new \User($db);
$now = \dol_now();
$title = $langs->trans("Activities");
$help_url = "EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos";
$morejs = array();
$morecss = array();
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$selectedfields = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
$projectsListId = '0';
//var_dump($projectsListId);
// Get id of types of contacts for projects (This list never contains a lot of elements)
$listofprojectcontacttype = array();
$sql = "SELECT ctc.rowid, ctc.code FROM " . \MAIN_DB_PREFIX . "c_type_contact as ctc";
$resql = $db->query($sql);
// Get id of types of contacts for tasks (This list never contains a lot of elements)
$listoftaskcontacttype = array();
$sql = "SELECT ctc.rowid, ctc.code FROM " . \MAIN_DB_PREFIX . "c_type_contact as ctc";
$resql = $db->query($sql);
// Build and execute select
// --------------------------------------------------------------------
$distinct = 'DISTINCT';
// We add distinct until we have rewritten the filter on contact of a project and task (into element_contact) to use a AND EXISTS instead of a join.
$sql = "SELECT " . $distinct . " p.rowid as projectid, p.ref as projectref, p.title as projecttitle, p.fk_statut as projectstatus, p.datee as projectdatee, p.fk_opp_status, p.public, p.fk_user_creat as projectusercreate, p.usage_bill_time,";
// Add fields from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListSelect', $parameters, $object, $action);
$sql = \preg_replace('/,\\s*$/', '', $sql);
$sqlfields = $sql;
// Search for tag/category ($searchCategoryProjectList is an array of ID)
$searchCategoryProjectList = array($search_categ);
$searchCategoryProjectOperator = 0;
$searchCategoryProjectSqlList = array();
$listofcategoryid = '';
$searchCategoryCustomerSqlList = array();
$existsCategoryCustomerList = array();
// Add where from hooks
$parameters = array();
$reshook = $hookmanager->executeHooks('printFieldListWhere', $parameters, $object, $action);
// Count total nb of records
$nbtotalofrecords = '';
/* The fast and low memory method to get and count full list converts the sql into a sql count */
$sqlforcount = \preg_replace('/^' . \preg_quote($sqlfields, '/') . '/', 'SELECT COUNT(*) as nbtotalofrecords', $sql);
$sqlforcount = \preg_replace('/GROUP BY .*$/', '', $sqlforcount);
$resql = $db->query($sqlforcount);
$resql = $db->query($sql);
$num = $db->num_rows($resql);
// Can use also classforhorizontalscrolloftabs instead of bodyforlist for no horizontal scroll
$arrayofselected = \is_array($toselect) ? $toselect : array();
$param = '';
// Add $param from hooks
$parameters = array('param' => &$param);
$reshook = $hookmanager->executeHooks('printFieldListSearchParam', $parameters, $object, $action);
// List of mass actions available
$arrayofmassactions = array();
$massactionbutton = $form->selectMassAction('', $arrayofmassactions);
$newcardbutton = '';
// Show description of content
$htmltooltip = '';
$topicmail = "Information";
$modelmail = "task";
$objecttmp = new \Task($db);
$trackid = 'tas' . $object->id;
$moreforfilter = '';
$tmptitle = $langs->trans('ProjectsWithThisUserAsContact');
$includeonly = '';
$tmptitle = $langs->trans('TasksWithThisUserAsContact');
$includeonly = '';
$varpage = empty($contextpage) ? $_SERVER["PHP_SELF"] : $contextpage;
$htmlofselectarray = $form->multiSelectArrayWithCheckbox('selectedfields', $arrayfields, $varpage, \getDolGlobalString('MAIN_CHECKBOX_LEFT_COLUMN'));
// This also change content of $arrayfields with user setup
$selectedfields = $mode != 'kanban' ? $htmlofselectarray : '';
// Fields from hook
$parameters = array('arrayfields' => $arrayfields);
$reshook = $hookmanager->executeHooks('printFieldListOption', $parameters, $object, $action);
$totalarray = array('nbfield' => 0, 'type' => [], 'val' => array('t.planned_workload' => 0, 't.duration_effective' => 0, 't.progress' => 0, 't.budget_amount' => 0), 'totalplannedworkload' => 0, 'totaldurationeffective' => 0, 'totaldurationdeclared' => 0, 'totaltobillfield' => 0, 'totalbilledfield' => 0, 'totalbudget_amountfield' => 0, 'totalbudgetamount' => 0, 'totalbudget' => 0, 'totaltobill' => 0, 'totalbilled' => 0, 'totalizable' => []);
// Hook fields
$parameters = array('arrayfields' => $arrayfields, 'param' => $param, 'sortfield' => $sortfield, 'sortorder' => $sortorder, 'totalarray' => &$totalarray);
$reshook = $hookmanager->executeHooks('printFieldListTitle', $parameters, $object, $action);
$plannedworkloadoutputformat = 'allhourmin';
$timespentoutputformat = 'allhourmin';
// Loop on record
// --------------------------------------------------------------------
$i = 0;
$savnbfield = $totalarray['nbfield'];
$imaxinloop = $limit ? \min($num, $limit) : $num;
$parameters = array('arrayfields' => $arrayfields, 'sql' => $sql);
$reshook = $hookmanager->executeHooks('printFieldListFooter', $parameters, $object, $action);