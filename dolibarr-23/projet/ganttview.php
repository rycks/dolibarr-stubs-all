<?php

/**
 * @var Conf $conf
 * @var DoliDB $db
 * @var HookManager $hookmanager
 * @var Translate $langs
 * @var User $user
 */
$id = \GETPOST('id', 'intcomma');
$ref = \GETPOST('ref', 'alpha');
$mode = \GETPOST('mode', 'alpha');
$mine = $mode == 'mine' ? 1 : 0;
$object = new \Project($db);
// Security check
$socid = 0;
//if ($user->socid > 0) $socid = $user->socid;    // For external user, no check is done on company because readability is managed by public status of project and assignment.
$result = \restrictedArea($user, 'projet', $id, 'projet&project');
/*
 * Actions
 */
// None
/*
 * View
 */
$form = new \Form($db);
$formother = new \FormOther($db);
$userstatic = new \User($db);
$companystatic = new \Societe($db);
$contactstatic = new \Contact($db);
$task = new \Task($db);
$arrayofcss = array('/includes/jsgantt/jsgantt.css');
$arrayofjs = [];
//$title=$langs->trans("Gantt").($object->ref?' - '.$object->ref.' '.$object->name:'');
$title = $langs->trans("Gantt");
$help_url = "EN:Module_Projects|FR:Module_Projets|ES:M&oacute;dulo_Proyectos";
$userWrite = 0;
// To verify role of users
//$userAccess = $object->restrictedProjectArea($user,'read');
$userWrite = $object->restrictedProjectArea($user, 'write');
//$userDelete = $object->restrictedProjectArea($user,'delete');
//print "userAccess=".$userAccess." userWrite=".$userWrite." userDelete=".$userDelete;
$tab = 'tasks';
$head = \project_prepare_head($object);
$param = $mode == 'mine' ? '&mode=mine' : '';
$morehtmlref = '<div class="refidno">';
$start = \dol_print_date($object->date_start, 'day');
$end = \dol_print_date($object->date_end, 'day');
// Other attributes
$cols = 2;
// Link to create task
$linktocreatetaskParam = array();
$linktocreatetaskUserRight = \false;
$linktocreatetask = \dolGetButtonTitle($langs->trans('AddTask'), '', 'fa fa-plus-circle', \DOL_URL_ROOT . '/projet/tasks.php?id=' . $object->id . '&action=create' . $param . '&backtopage=' . \urlencode($_SERVER['PHP_SELF'] . '?id=' . $object->id), '', (int) $linktocreatetaskUserRight, $linktocreatetaskParam);
$linktotasks = \dolGetButtonTitle($langs->trans('ViewList'), '', 'fa fa-bars paddingleft imgforviewmode', \DOL_URL_ROOT . '/projet/tasks.php?id=' . $object->id, '', 1, array('morecss' => 'reposition'));
// Get list of tasks in tasksarray and taskarrayfiltered
// We need all tasks (even not limited to a user because a task to user
// can have a parent that is not affected to him).
$tasksarray = $task->getTasksArray(\null, \null, $object->id ? $object->id : $id, $socid, 0);
// Show Gant diagram from $taskarray using JSGantt
$dateformat = $langs->trans("FormatDateShortJQuery");
// Used by include ganttchart.inc.php later
$datehourformat = $langs->trans("FormatDateShortJQuery") . ' ' . $langs->trans("FormatHourShortJQuery");
// Used by include ganttchart.inc.php later
$array_contacts = array();
$tasks = array();
$task_dependencies = array();
$taskcursor = 0;